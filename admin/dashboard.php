<?php
include '../config/koneksi.php';

// Total kendaraan
$q1 = mysqli_query($conn, "SELECT COUNT(*) as total FROM kendaraan");
$total_kendaraan = mysqli_fetch_assoc($q1)['total'];

// Kendaraan menunggu
$q2 = mysqli_query($conn, "SELECT COUNT(*) as total FROM kendaraan WHERE status='Menunggu'");
$menunggu = mysqli_fetch_assoc($q2)['total'];

// Kendaraan ditempatkan
$q3 = mysqli_query($conn, "SELECT COUNT(*) as total FROM kendaraan WHERE status='Ditempatkan'");
$ditempatkan = mysqli_fetch_assoc($q3)['total'];

// Kendaraan naik kapal
$q4 = mysqli_query($conn, "SELECT COUNT(*) as total FROM kendaraan WHERE status='Naik Kapal'");
$naik_kapal = mysqli_fetch_assoc($q4)['total'];

// Total area tunggu
$q5 = mysqli_query($conn, "SELECT COUNT(*) as total FROM area_tunggu");
$total_area = mysqli_fetch_assoc($q5)['total'];

// Total kapal
$q6 = mysqli_query($conn, "SELECT COUNT(*) as total FROM kapal");
$total_kapal = mysqli_fetch_assoc($q6)['total'];

// Total petugas
$q7 = mysqli_query($conn, "SELECT COUNT(*) as total FROM users");
$total_petugas = mysqli_fetch_assoc($q7)['total'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
            padding:20px;
        }

        h1{
            text-align:center;
        }

        .container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:20px;
            margin-top:30px;
        }

        .card{
            background:white;
            padding:20px;
            border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
            text-align:center;
        }

        .card h2{
            margin:0;
            font-size:35px;
        }

        .card p{
            margin-top:10px;
            color:#666;
        }

        .menu{
            margin-top:30px;
            text-align:center;
        }

        .menu a{
            text-decoration:none;
            padding:10px 15px;
            background:#007bff;
            color:white;
            border-radius:5px;
            margin:5px;
            display:inline-block;
        }
    </style>
</head>

<body>

<h1>Dashboard Admin</h1>

<div class="container">

    <div class="card">
        <h2><?= $total_kendaraan ?></h2>
        <p>Total Kendaraan</p>
    </div>

    <div class="card">
        <h2><?= $menunggu ?></h2>
        <p>Kendaraan Menunggu</p>
    </div>

    <div class="card">
        <h2><?= $ditempatkan ?></h2>
        <p>Kendaraan Ditempatkan</p>
    </div>

    <div class="card">
        <h2><?= $naik_kapal ?></h2>
        <p>Kendaraan Naik Kapal</p>
    </div>

    <div class="card">
        <h2><?= $total_area ?></h2>
        <p>Area Tunggu</p>
    </div>

    <div class="card">
        <h2><?= $total_kapal ?></h2>
        <p>Kapal</p>
    </div>

    <div class="card">
        <h2><?= $total_petugas ?></h2>
        <p>Petugas</p>
    </div>

</div>

<div class="menu">
    <a href="kendaraan/index.php">Data Kendaraan</a>
</div>

</body>
</html>