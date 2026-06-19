<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM penempatan WHERE id='$id'");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Detail Penempatan</title></head>
<body>
    <h2>Detail Penempatan</h2>
    <p>No Tiket: <?= $data['no_tiket'] ?></p>
    <p>Area: <?= $data['area'] ?></p>
    <a href="konfirmasi.php?id=<?= $data['id'] ?>">Konfirmasi</a>
</body>
</html>
