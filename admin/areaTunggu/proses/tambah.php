<?php
include "../../../config/koneksi.php";

$id_user = $_POST['id_user'];
$nama_area = $_POST['nama_area'];
$kapasitas = $_POST['kapasitas'];
$keterangan = $_POST['keterangan'];

mysqli_query($koneksi,"
INSERT INTO area_tunggu
(id_user,nama_area,kapasitas,keterangan)
VALUES
('$id_user','$nama_area','$kapasitas','$keterangan')
");

header("Location: ../index.php");