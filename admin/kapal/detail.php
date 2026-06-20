<?php

include '../../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID kapal tidak ditemukan!";
    exit();
}

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT * FROM kapal WHERE id_kapal='$id'"
);

$row = mysqli_fetch_assoc($data);

if (!$row) {
    echo "Data kapal tidak ditemukan!";
    exit();
}

$status_berlabuh = ($row['status'] == 'Aktif')
    ? 'Berlabuh'
    : 'Belum Berlabuh';

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Kapal</title>

    <link rel="stylesheet" href="../../assets/css/table.css">
</head>
<body>

<div class="container">

<h2>DETAIL DATA KAPAL</h2>

<table>

    <tr>
        <th width="30%">Keterangan</th>
        <th>Data</th>
    </tr>

    <tr>
        <td>ID Kapal</td>
        <td><?= $row['id_kapal']; ?></td>
    </tr>

    <tr>
        <td>Nama Kapal</td>
        <td><?= $row['nama_kapal']; ?></td>
    </tr>

    <tr>
        <td>Kapasitas</td>
        <td><?= $row['kapasitas']; ?> Kendaraan</td>
    </tr>

    <tr>
        <td>Status Kapal</td>
        <td><?= $status_berlabuh; ?></td>
    </tr>

</table>

<br>

<a href="index.php" class="btn-add">
    Kembali
</a>

</div>

</body>
</html>