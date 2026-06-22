<?php

session_start();

include "../config/koneksi.php";

/* kendaraan menunggu */
$q1 = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) as total
    FROM kendaraan
    WHERE status='Menunggu'"
);

$menunggu = mysqli_fetch_assoc($q1)['total'];

/* naik kapal */
$q2 = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) as total
    FROM kendaraan
    WHERE status='Naik Kapal'"
);

$naik_kapal = mysqli_fetch_assoc($q2)['total'];

/* penempatan */
$q3 = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) as total
    FROM penempatan"
);

$total_penempatan = mysqli_fetch_assoc($q3)['total'];

/* laporan */
$q4 = mysqli_query(
    $koneksi,
    "SELECT COUNT(*) as total
    FROM laporan"
);

$total_laporan = mysqli_fetch_assoc($q4)['total'];

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Petugas</title>

<link rel="stylesheet" href="../assets/css/dashboard.css">

<style>

.menu{
    margin-top:30px;
    text-align:center;
}

.menu a{
    text-decoration:none;
    padding:10px 15px;
    background:#0d6efd;
    color:white;
    border-radius:5px;
    margin:5px;
    display:inline-block;
}

.monitoring{
    margin-top:40px;
}

.monitoring h3{
    margin-bottom:15px;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table th{
    background:#0d6efd;
    color:white;
    padding:12px;
}

table td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}

</style>

</head>

<body>
<div style="margin-bottom:20px;">

    <a href="../auth/logout.php"
       style="
       background:#dc3545;
       color:white;
       padding:10px 20px;
       text-decoration:none;
       border-radius:5px;
       font-weight:bold;
       ">
       Logout
    </a>

</div>
<h1 class="judul">
    Dashboard Petugas
</h1>

    <div class="card-area">

        <div class="card">
            <h2><?= $menunggu; ?></h2>
            <p>Kendaraan Menunggu</p>
        </div>

        <div class="card">
            <h2><?= $naik_kapal; ?></h2>
            <p>Kendaraan Naik Kapal</p>
        </div>

        <div class="card">
            <h2><?= $total_penempatan; ?></h2>
            <p>Total Penempatan</p>
        </div>

        <div class="card">
            <h2><?= $total_laporan; ?></h2>
            <p>Total Laporan</p>
        </div>

    </div>

    <div class="menu">

        <a href="penempatan/index.php">
            Penempatan
        </a>

        <a href="laporan/index.php">
            Laporan
        </a>


    </div>

    <div class="monitoring">

        <h3>Monitoring Kendaraan</h3>

        <table>

            <tr>
                <th>No</th>
                <th>No Polisi</th>
                <th>Jenis</th>
                <th>Area</th>
                <th>Nomor Antrian</th>
                <th>Status</th>
            </tr>

            <tr>
                <td colspan="6">
                    Belum Ada Data Kendaraan
                </td>
            </tr>

        </table>

    </div>

</div>

</body>
</html>