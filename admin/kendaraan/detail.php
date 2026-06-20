<?php

include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query(
$koneksi,
"
SELECT kendaraan.*, area_tunggu.nama_area
FROM kendaraan
JOIN area_tunggu
ON kendaraan.id_area = area_tunggu.id_area
WHERE kendaraan.id_kendaraan='$id'
"
);

$row = mysqli_fetch_assoc($data);

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Kendaraan</title>

<style>

body{
    font-family:Arial, sans-serif;
    background:#f4f6f9;
    margin:0;
    padding:20px;
}

.container{
    width:700px;
    margin:auto;
}

.card{
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 2px 8px rgba(0,0,0,0.1);
}

h2{
    color:#0d6efd;
    text-align:center;
    margin-bottom:25px;
}

table{
    width:100%;
    border-collapse:collapse;
}

td{
    padding:12px;
    border-bottom:1px solid #ddd;
}

.label{
    font-weight:bold;
    width:200px;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:10px 20px;
    background:#0d6efd;
    color:white;
    text-decoration:none;
    border-radius:5px;
}

.btn:hover{
    background:#0b5ed7;
}

</style>

</head>
<body>

<div class="container">

    <div class="card">

        <h2>Detail Kendaraan</h2>

        <table>

            <tr>
                <td class="label">No Tiket</td>
                <td><?= $row['no_tiket']; ?></td>
            </tr>

            <tr>
                <td class="label">No Polisi</td>
                <td><?= $row['no_polisi']; ?></td>
            </tr>

            <tr>
                <td class="label">Jenis Kendaraan</td>
                <td><?= $row['jenis_kendaraan']; ?></td>
            </tr>

            <tr>
                <td class="label">Nama Pengemudi</td>
                <td><?= $row['nama_pengemudi']; ?></td>
            </tr>

            <tr>
                <td class="label">Area Tunggu</td>
                <td><?= $row['nama_area']; ?></td>
            </tr>

            <tr>
                <td class="label">Nomor Antrian</td>
                <td><?= $row['nomor_antrian']; ?></td>
            </tr>

            <tr>
                <td class="label">Status Kendaraan</td>
                <td><?= $row['status']; ?></td>
            </tr>

        </table>

        <a href="index.php" class="btn">
            Kembali
        </a>

    </div>

</div>

</body>
</html>