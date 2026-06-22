<?php

include "../../../config/koneksi.php";

$id = $_POST['id_kendaraan'];
$no_polisi = $_POST['no_polisi'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$nama_pengemudi = $_POST['nama_pengemudi'];
$status = $_POST['status'];

$query = mysqli_query(
    $koneksi,
    "
    UPDATE kendaraan SET
    no_polisi='$no_polisi',
    jenis_kendaraan='$jenis_kendaraan',
    nama_pengemudi='$nama_pengemudi',
    status='$status'
    WHERE id_kendaraan='$id'
    "
);

if($query){

    header("Location: ../index.php");
    exit();

}else{

    echo "Gagal mengupdate data kendaraan";

}
?>