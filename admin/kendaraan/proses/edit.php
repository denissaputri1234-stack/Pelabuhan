<?php

include '../../config/koneksi.php';

$id = $_POST['id_kendaraan'];
$no_polisi = $_POST['no_polisi'];
$jenis_kendaraan = $_POST['jenis_kendaraan'];
$nama_pengemudi = $_POST['nama_pengemudi'];
$nomor_antrian = $_POST['nomor_antrian'];
$status = $_POST['status'];

mysqli_query($conn,"
UPDATE kendaraan SET
no_polisi='$no_polisi',
jenis_kendaraan='$jenis_kendaraan',
nama_pengemudi='$nama_pengemudi',
nomor_antrian='$nomor_antrian',
status='$status'
WHERE id_kendaraan='$id'
");

header("Location: ../kendaraan/index.php");