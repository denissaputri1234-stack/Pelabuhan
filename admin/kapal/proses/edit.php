<?php

include '../../../config/koneksi.php';

$id_kapal = $_POST['id_kapal'];
$nama_kapal = $_POST['nama_kapal'];
$kapasitas = $_POST['kapasitas'];
$status = $_POST['status'];

$query = mysqli_query(
    $koneksi,
    "UPDATE kapal SET
    nama_kapal = '$nama_kapal',
    kapasitas = '$kapasitas',
    status = '$status'
    WHERE id_kapal = '$id_kapal'"
);

if($query){

    header("Location: ../index.php");

}else{

    echo "Gagal mengupdate data";
}