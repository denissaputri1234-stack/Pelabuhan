<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "
    SELECT *
    FROM laporan
    WHERE id_laporan='$id'
    "
);

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Detail Laporan</title>
</head>
<body>

<h2><?= $row['judul']; ?></h2>

<hr>

<p>

<b>Tanggal :</b>

<?= $row['tanggal']; ?>

</p>

<p>

<b>Isi Laporan :</b>

</p>

<p>

<?= nl2br($row['isi_laporan']); ?>

</p>

<hr>

<a href="index.php">
    Kembali
</a>

</body>
</html>