<?php

include '../../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM kapal WHERE id_kapal='$id'"
);

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Kapal</title>
</head>
<body>

<center>

<h2>DETAIL DATA KAPAL</h2>

<hr width="60%">

<table cellpadding="10">

    <tr>
        <td><b>ID Kapal</b></td>
        <td>:</td>
        <td><?= $row['id_kapal']; ?></td>
    </tr>

    <tr>
        <td><b>Nama Kapal</b></td>
        <td>:</td>
        <td><?= $row['nama_kapal']; ?></td>
    </tr>

    <tr>
        <td><b>Kapasitas</b></td>
        <td>:</td>
        <td><?= $row['kapasitas']; ?></td>
    </tr>

    <tr>
        <td><b>Status</b></td>
        <td>:</td>
        <td><?= $row['status']; ?></td>
    </tr>

</table>

<hr width="60%">

<a href="index.php">
    Kembali ke Data Kapal
</a>

</center>

</body>
</html>