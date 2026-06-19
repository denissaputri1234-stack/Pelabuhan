<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM laporan_admin WHERE id='$id'");
$data = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head><title>Detail Laporan Admin</title></head>
<body>
    <h2><?= $data['judul'] ?></h2>
    <p><?= $data['isi'] ?></p>
    <a href="cetak.php?id=<?= $data['id'] ?>">Cetak</a>
</body>
</html>
