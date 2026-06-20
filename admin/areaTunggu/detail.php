<?php
include "../../config/koneksi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "SELECT area_tunggu.*, users.nama
              FROM area_tunggu
              JOIN users
              ON area_tunggu.id_user = users.id_user
              WHERE area_tunggu.id_area = '$id'";

    $data = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($data);

    if (!$row) {
        echo "Data area tunggu tidak ditemukan!";
        exit();
    }

} else {
    echo "ID area tidak ditemukan!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Area Tunggu</title>

    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>

<div class="form-box">

    <h2>Detail Area Tunggu</h2>

    <table class="detail-table">

        <tr>
            <td><strong>ID Area</strong></td>
            <td>: <?= $row['id_area']; ?></td>
        </tr>

        <tr>
            <td><strong>Nama Area</strong></td>
            <td>: <?= $row['nama_area']; ?></td>
        </tr>

        <tr>
            <td><strong>Kapasitas</strong></td>
            <td>: <?= $row['kapasitas']; ?></td>
        </tr>

        <tr>
            <td><strong>Status</strong></td>
            <td>: <?= $row['status']; ?></td>
        </tr>

        <tr>
            <td><strong>Admin</strong></td>
            <td>: <?= $row['nama']; ?></td>
        </tr>

        <tr>
            <td><strong>Keterangan</strong></td>
            <td>: <?= $row['keterangan']; ?></td>
        </tr>

    </table>

    <br>

    <button type="button" onclick="window.location='index.php'">
        Kembali
    </button>

</div>