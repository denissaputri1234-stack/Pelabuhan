<?php
include "../../../config/koneksi.php";

$id_area     = $_POST['id_area'];
$id_user     = $_POST['id_user'];
$nama_area   = $_POST['nama_area'];
$kapasitas   = $_POST['kapasitas'];
$keterangan  = $_POST['keterangan'];

$query = "UPDATE area_tunggu SET
            id_user = '$id_user',
            nama_area = '$nama_area',
            kapasitas = '$kapasitas',
            keterangan = '$keterangan'
          WHERE id_area = '$id_area'";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../index.php");
    exit();
} else {
    echo "Data area tunggu gagal diubah!";
}
?>