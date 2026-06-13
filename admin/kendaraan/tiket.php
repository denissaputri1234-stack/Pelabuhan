<?php

include '../../config/koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM kendaraan
WHERE id_kendaraan='$id'");

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

<p><b>No Tiket :</b> <?= $row['no_tiket']; ?></p>

<p><b>No Polisi :</b> <?= $row['no_polisi']; ?></p>

<p><b>Jenis Kendaraan :</b> <?= $row['jenis_kendaraan']; ?></p>

<p><b>Nama Pengemudi :</b> <?= $row['nama_pengemudi']; ?></p>

<p><b>Nomor Antrian :</b> <?= $row['nomor_antrian']; ?></p>

<p><b>Status :</b> <?= $row['status']; ?></p>

<p><b>Tanggal :</b> <?= date('d-m-Y H:i'); ?></p>

<hr>

<p align="center">
    Simpan tiket ini untuk proses penempatan kendaraan
</p>

<button class="cetak" onclick="window.print()">
    Cetak Tiket
</button>

</div>

</body>
</html>