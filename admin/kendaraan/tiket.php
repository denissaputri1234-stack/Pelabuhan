<?php

include '../../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
SELECT
    kendaraan.*,
    users.nama,
    area_tunggu.nama_area
FROM kendaraan
JOIN users
    ON kendaraan.id_user = users.id_user
JOIN area_tunggu
    ON kendaraan.id_area = area_tunggu.id_area
WHERE kendaraan.id_kendaraan='$id'
");

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Tiket Kendaraan</title>

    <style>
        .ticket{
            width:500px;
            margin:auto;
            border:2px solid black;
            padding:20px;
            font-family:Arial;
        }

        h2{
            text-align:center;
        }

        .cetak{
            margin-top:20px;
        }

        @media print{
            .cetak{
                display:none;
            }
        }
    </style>
</head>

<body>

<div class="ticket">

<h2>TIKET AREA TUNGGU PELABUHAN GILIMANUK</h2>

<hr>

<p>
    <b>Area Tunggu :</b>
    <?= $row['nama_area']; ?>
</p>

<p>
    <b>Diinput Oleh :</b>
    <?= $row['nama']; ?>
</p>

<hr>

<p><b>No Tiket :</b> <?= $row['no_tiket']; ?></p>

<p><b>No Polisi :</b> <?= $row['no_polisi']; ?></p>

<p><b>Jenis Kendaraan :</b> <?= $row['jenis_kendaraan']; ?></p>

<p><b>Nama Pengemudi :</b> <?= $row['nama_pengemudi']; ?></p>

<p><b>Nomor Antrian :</b> <?= $row['nomor_antrian']; ?></p>

<p><b>Tanggal :</b> <?= date('d-m-Y H:i'); ?></p>

<hr>

<p align="center">
    Simpan tiket ini untuk proses penempatan kendaraan
</p>

<button class="cetak" onclick="window.print()">
    Cetak Tiket
</button>

</div>
<div style="text-align:center; margin-top:20px;">

    

    <br><br>

    <a href="index.php"
       style="
            display:inline-block;
            padding:10px 18px;
            background:#6c757d;
            color:white;
            text-decoration:none;
            border-radius:6px;
            font-family:Arial;
       ">
        ← Kembali
    </a>

</div>
</body>
</html>