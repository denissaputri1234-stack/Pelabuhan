<?php

include "../../config/koneksi.php";

$query = mysqli_query(
    $koneksi,
    "SELECT *
    FROM laporan
    ORDER BY tanggal DESC"
);

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Laporan</title>

<link rel="stylesheet"
href="../../assets/css/table.css">

</head>
<body>

<h2>Data Laporan Petugas</h2>

<a href="../dashboard.php"
class="btn-kembali">

← Kembali

</a>

<table>

<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Judul Kendala</th>
    <th>Aksi</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($query)){
?>

<tr>

    <td><?= $no++; ?></td>

    <td><?= $row['tanggal']; ?></td>

    <td><?= $row['judul']; ?></td>

    <td>

        <a
        href="detail.php?id=<?= $row['id_laporan']; ?>"
        class="detail">

        Detail

        </a>

    </td>

</tr>

<?php } ?>

</table>

<div class="tambah-area">

    <a
    href="tambah.php"
    class="btn-tambah">

    + Tambah Laporan

    </a>

</div>

</body>
</html>
