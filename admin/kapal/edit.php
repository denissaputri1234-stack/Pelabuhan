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
    <title>Edit Data Kapal</title>
</head>
<body>

<center>

<h2>EDIT DATA KAPAL</h2>

<form action="proses/edit.php" method="POST">

<input
    type="hidden"
    name="id_kapal"
    value="<?= $row['id_kapal']; ?>"
>

<p>
    ID Kapal :
    <?= $row['id_kapal']; ?>
</p>

<p>
    Nama Kapal<br>
    <input
        type="text"
        name="nama_kapal"
        value="<?= $row['nama_kapal']; ?>"
        size="40"
        required
    >
</p>

<p>
    Kapasitas<br>
    <input
        type="number"
        name="kapasitas"
        value="<?= $row['kapasitas']; ?>"
        required
    >
</p>

<p>
    Status<br>
    <select name="status">

        <option
        value="Aktif"
        <?= ($row['status']=="Aktif") ? "selected" : ""; ?>>
            Aktif
        </option>

        <option
        value="Tidak Aktif"
        <?= ($row['status']=="Tidak Aktif") ? "selected" : ""; ?>>
            Tidak Aktif
        </option>

    </select>
</p>

<hr width="40%">

<button type="submit">
    Update Data
</button>

<a href="index.php">
    Kembali
</a>

</form>

</center>