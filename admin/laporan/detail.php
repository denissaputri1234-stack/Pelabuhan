<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
    $koneksi,
    "SELECT
    laporan.*,
    users.nama

    FROM laporan

    JOIN users
    ON laporan.id_user = users.id_user

    WHERE laporan.id_laporan='$id'"
);

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>

<title>Detail Laporan</title>

<link rel="stylesheet"
href="../../assets/css/form.css">

</head>
<body>

<div class="form-box">

<h2>Detail Laporan</h2>

<p>
<b>Petugas :</b><br>
<?= $row['nama']; ?>
</p>

<br>

<p>
<b>Judul Kendala :</b><br>
<?= $row['judul']; ?>
</p>

<br>

<p>
<b>Tanggal :</b><br>
<?= $row['tanggal']; ?>
</p>

<br>

<p>
<b>Isi Laporan :</b><br><br>

<?= nl2br($row['isi_laporan']); ?>

</p>

<br>

<a
href="index.php"
class="btn-kembali">

Kembali

</a>

</div>

</body>
</html>