<?php

include '../../../config/koneksi.php';

$nama_kapal = $_POST['nama_kapal'];
$kapasitas = $_POST['kapasitas'];
$status = $_POST['status'];

$query = mysqli_query($koneksi,
"INSERT INTO kapal
(id_user, nama_kapal, kapasitas, status)
VALUES
(1, '$nama_kapal', '$kapasitas', '$status')");

if($query){
    header("Location: ../index.php");
}else{
    echo mysqli_error($koneksi);
}
?>