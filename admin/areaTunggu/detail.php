<?php
include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
SELECT area_tunggu.*, users.nama
FROM area_tunggu
JOIN users
ON area_tunggu.id_user = users.id_user
WHERE id_area='$id'
");

$row = mysqli_fetch_assoc($data);
?>

<h2>Detail Area Tunggu</h2>

<p>Nama Area :
    <?= $row['nama_area'] ?>
</p>

<p>Kapasitas :
    <?= $row['kapasitas'] ?>
</p>

<p>Petugas :
    <?= $row['nama'] ?>
</p>

<p>Keterangan :
    <?= $row['keterangan'] ?>
</p>

<a href="index.php">Kembali</a>