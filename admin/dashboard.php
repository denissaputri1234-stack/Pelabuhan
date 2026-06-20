<?php
include '../config/koneksi.php';

/* =========================
   STATISTIK
========================= */

$q1 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total FROM kendaraan");
$total_kendaraan = mysqli_fetch_assoc($q1)['total'];

$q2 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total
 FROM kendaraan
 WHERE status='Menunggu'");
$menunggu = mysqli_fetch_assoc($q2)['total'];

$q3 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total
 FROM kendaraan
 WHERE status='Ditempatkan'");
$ditempatkan = mysqli_fetch_assoc($q3)['total'];

$q4 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total
 FROM kendaraan
 WHERE status='Naik Kapal'");
$naik_kapal = mysqli_fetch_assoc($q4)['total'];

$q5 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total
 FROM area_tunggu");
$total_area = mysqli_fetch_assoc($q5)['total'];

$q6 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total
 FROM kapal");
$total_kapal = mysqli_fetch_assoc($q6)['total'];

$q7 = mysqli_query($koneksi,
"SELECT COUNT(*) AS total
 FROM users
 WHERE role='petugas'");
$total_petugas = mysqli_fetch_assoc($q7)['total'];

/* =========================
   MONITORING KENDARAAN
========================= */

$kendaraan = mysqli_query(
    $koneksi,
    "SELECT kendaraan.*,
            area_tunggu.nama_area
     FROM kendaraan
     JOIN area_tunggu
     ON kendaraan.id_area = area_tunggu.id_area
     ORDER BY kendaraan.id_kendaraan DESC"
);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>

    <style>

        body{
            font-family:Arial, sans-serif;
            background:#f4f6f9;
            margin:0;
            padding:20px;
        }

        h1{
            text-align:center;
        }

        .container{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
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
            text-align:center;
            margin-top:30px;
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

        table{
            width:100%;
            border-collapse:collapse;
            margin-top:30px;
            background:white;
        }

        table th,
        table td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
        }

        table th{
            background:#007bff;
            color:white;
        }

        .menunggu{
            color:orange;
            font-weight:bold;
        }

        .ditempatkan{
            color:blue;
            font-weight:bold;
        }

        .naik{
            color:green;
            font-weight:bold;
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
    <a href="kapal/index.php">Data Kapal</a>
    <a href="areaTunggu/index.php">Area Tunggu</a>
</div>

<h2>Monitoring Kendaraan</h2>

<table>

<tr>
    <th>No</th>
    <th>No Polisi</th>
    <th>Jenis</th>
    <th>Area</th>
    <th>Nomor Antrian</th>
    <th>Status</th>
</tr>

<?php
$no = 1;

while($row = mysqli_fetch_assoc($kendaraan)){
?>

<tr>

    <td><?= $no++ ?></td>

    <td><?= $row['no_polisi'] ?></td>

    <td><?= $row['jenis_kendaraan'] ?></td>

    <td><?= $row['nama_area'] ?></td>

    <td><?= $row['nomor_antrian'] ?></td>

    <td>

        <?php
        if($row['status']=="Menunggu"){
            echo "<span class='menunggu'>Menunggu</span>";
        }
        elseif($row['status']=="Ditempatkan"){
            echo "<span class='ditempatkan'>Ditempatkan</span>";
        }
        else{
            echo "<span class='naik'>Naik Kapal</span>";
        }
        ?>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>