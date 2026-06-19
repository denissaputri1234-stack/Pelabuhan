<?php
session_start();
include 'koneksi.php'; // file koneksi database

// cek login
if(!isset($_SESSION['petugas'])){
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Petugas</title>
</head>
<body>
    <h1>Selamat Datang, <?php echo $_SESSION['petugas']; ?></h1>
    <ul>
        <li><a href="index.php">Penempatan Kendaraan</a></li>
        <li><a href="index.php?laporan">Laporan Petugas</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
