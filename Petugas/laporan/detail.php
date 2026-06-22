<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$query = mysqli_query(
    $koneksi,
    "SELECT
    laporan.*,
    users.nama

    FROM laporan

    JOIN users
    ON laporan.id_user = users.id_user

    WHERE id_laporan='$id'"
);

$data = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>

<title>Detail Laporan</title>

<link rel="stylesheet"
href="../../assets/css/form.css">

</head>
<body>

<div class="container">

<div class="form-box">

<h2>Detail Laporan</h2>

<table class="detail-table">

<tr>
    <td>Petugas</td>
    <td>: <?= $data['nama']; ?></td>
</tr>

<tr>
    <td>Tanggal</td>
    <td>: <?= $data['tanggal']; ?></td>
</tr>

<tr>
    <td>Judul</td>
    <td>: <?= $data['judul']; ?></td>
</tr>

<tr>
    <td>Isi Laporan</td>
    <td>: <?= nl2br($data['isi_laporan']); ?></td>
</tr>

</table>

<br>

<a
href="index.php"
class="btn-kembali">

Kembali

</a>

</div>

</div>

</body>
</html>