<?php
include "../../../config/koneksi.php";

$id_area = $_POST['id_area'];
$id_user = $_POST['id_user'];
$nama_area = $_POST['nama_area'];
$kapasitas = $_POST['kapasitas'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"
UPDATE area_tunggu
SET
id_user='$id_user',
nama_area='$nama_area',
kapasitas='$kapasitas',
keterangan='$keterangan'
WHERE id_area='$id_area'
");

header("Location: ../index.php");