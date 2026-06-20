<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
$koneksi,
"
SELECT kendaraan.*, area_tunggu.nama_area
FROM kendaraan
JOIN area_tunggu
ON kendaraan.id_area = area_tunggu.id_area
WHERE kendaraan.id_kendaraan='$id'
"
);

$row = mysqli_fetch_assoc($data);

?>

<h2>Detail Kendaraan</h2>

<p>No Tiket : <?= $row['no_tiket']; ?></p>

<p>No Polisi : <?= $row['no_polisi']; ?></p>

<p>Jenis Kendaraan : <?= $row['jenis_kendaraan']; ?></p>

<p>Nama Pengemudi : <?= $row['nama_pengemudi']; ?></p>

<p>Area Tunggu : <?= $row['nama_area']; ?></p>

<p>Nomor Antrian : <?= $row['nomor_antrian']; ?></p>

<p>Status : <?= $row['status']; ?></p>

<a href="index.php">Kembali</a>