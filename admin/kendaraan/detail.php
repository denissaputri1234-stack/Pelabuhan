<?php

include '../../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM kendaraan
WHERE id_kendaraan='$id'");

$row = mysqli_fetch_assoc($data);

?>

<h2>Detail Kendaraan</h2>

<p>No Polisi : <?= $row['no_polisi']; ?></p>
<p>Jenis Kendaraan : <?= $row['jenis_kendaraan']; ?></p>
<p>Nama Pengemudi : <?= $row['nama_pengemudi']; ?></p>
<p>Nomor Antrian : <?= $row['nomor_antrian']; ?></p>
<p>Status : <?= $row['status']; ?></p>

<a href="index.php">Kembali</a>