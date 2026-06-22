<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT *
    FROM penempatan
    WHERE id_penempatan='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Detail Penempatan</title>

<link rel="stylesheet"
href="../../assets/css/form.css">

</head>
<body>

<div class="form-box">

<h2>Detail Penempatan Kendaraan</h2>

<table class="detail-table">

<tr>
<td>No Polisi</td>
<td>: <?= $data['no_polisi']; ?></td>
</tr>

<tr>
<td>Jenis Kendaraan</td>
<td>: <?= $data['jenis']; ?></td>
</tr>

<tr>
<td>Area Tunggu</td>
<td>: <?= $data['area']; ?></td>
</tr>

<tr>
<td>Nomor Antrian</td>
<td>: <?= $data['nomor_antrian']; ?></td>
</tr>

<tr>
<td>Status</td>
<td>: <?= $data['status']; ?></td>
</tr>

</table>

<br>

<a
href="index.php"
class="btn-kembali">

Kembali

</a>

</div>

</body>
</html>