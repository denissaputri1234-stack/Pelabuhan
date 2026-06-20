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

<h2>Detail Area Tunggu</h2>

<p>
    <strong>Nama Area :</strong>
    <?= $row['nama_area']; ?>
</p>

<p>
    <strong>Kapasitas :</strong>
    <?= $row['kapasitas']; ?>
</p>

<p>
    <strong>Status :</strong>
    <?= $row['status']; ?>
</p>

<p>
    <strong>Admin :</strong>
    <?= $row['nama']; ?>
</p>

<p>
    <strong>Keterangan :</strong>
    <?= $row['keterangan']; ?>
</p>

<br>

<a href="index.php">Kembali</a>

</body>
</html>