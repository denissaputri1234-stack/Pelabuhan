<?php

include "../../../config/koneksi.php";

$no_polisi = $_POST['no_polisi'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$nama_pengemudi = $_POST['nama_pengemudi'];

$id_user = 1;

if(
    $jenis_kendaraan == "Motor" ||
    $jenis_kendaraan == "Mobil"
){
    $id_area = "A1";
}
elseif(
    $jenis_kendaraan == "Pickup" ||
    $jenis_kendaraan == "Minibus"
){
    $id_area = "B1";
}
else{
    $id_area = "C1";
}

$cek = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total
     FROM kendaraan
     WHERE id_area='$id_area'"
);

$data = mysqli_fetch_assoc($cek);

$urutan = $data['total'] + 1;

$nomor_antrian =
substr($id_area,0,1) .
str_pad($urutan,3,"0",STR_PAD_LEFT);

$cekTiket = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) AS total
     FROM kendaraan"
);

$tiket = mysqli_fetch_assoc($cekTiket);

$no_tiket =
"GLM" .
str_pad(
$tiket['total'] + 1,
4,
"0",
STR_PAD_LEFT
);

$query = "
INSERT INTO kendaraan
(
id_user,
id_area,
no_polisi,
jenis_kendaraan,
nama_pengemudi,
nomor_antrian,
status,
no_tiket
)
VALUES
(
'$id_user',
'$id_area',
'$no_polisi',
'$jenis_kendaraan',
'$nama_pengemudi',
'$nomor_antrian',
'Menunggu',
'$no_tiket'
)
";

if(mysqli_query($koneksi,$query)){

    $id = mysqli_insert_id($koneksi);

    header("Location: ../tiket.php?id=$id");
    exit();

}else{

    echo mysqli_error($koneksi);

}