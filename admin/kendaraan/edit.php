<?php

include '../../config/koneksi.php';

$id = $_GET['id'];

$query = "
SELECT kendaraan.*,
       area_tunggu.nama_area
FROM kendaraan
JOIN area_tunggu
ON kendaraan.id_area = area_tunggu.id_area
WHERE kendaraan.id_kendaraan='$id'
";

$data = mysqli_query($koneksi, $query);

$row = mysqli_fetch_assoc($data);

if(!$row){
    die("Data kendaraan tidak ditemukan");
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Kendaraan</title>

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
    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;
}

label{
    font-weight:bold;
    display:block;
    margin-bottom:5px;
}

input,
select{
    width:100%;
    padding:10px;
    border:1px solid #ddd;
    border-radius:5px;
    box-sizing:border-box;
}

.readonly{
    background:#f1f1f1;
}

.button-group{
    margin-top:20px;
}

.btn{
    display:inline-block;
    padding:10px 20px;
    border:none;
    border-radius:5px;
    text-decoration:none;
    cursor:pointer;
}

.btn-update{
    background:#0d6efd;
    color:white;
}

.btn-update:hover{
    background:#0b5ed7;
}

.btn-kembali{
    background:#6c757d;
    color:white;
    margin-left:10px;
}

.btn-kembali:hover{
    background:#5c636a;
}

</style>

</head>
<body>

<div class="container">

    <div class="card">

        <h2>Edit Kendaraan</h2>

        <form action="proses/editK.php" method="POST">

            <input
                type="hidden"
                name="id_kendaraan"
                value="<?= $row['id_kendaraan']; ?>"
            >

            <label>No Polisi</label>

            <input
                type="text"
                name="no_polisi"
                value="<?= $row['no_polisi']; ?>"
                required
            >

            <br>

            <label>Jenis Kendaraan</label>

            <select name="jenis_kendaraan" required>

                <option value="Mobil"
                <?= ($row['jenis_kendaraan']=="Mobil") ? "selected" : "" ?>>
                    Mobil
                </option>

                <option value="Motor"
                <?= ($row['jenis_kendaraan']=="Motor") ? "selected" : "" ?>>
                    Motor
                </option>

                <option value="Bus"
                <?= ($row['jenis_kendaraan']=="Bus") ? "selected" : "" ?>>
                    Bus
                </option>

                <option value="Truk"
                <?= ($row['jenis_kendaraan']=="Truk") ? "selected" : "" ?>>
                    Truk
                </option>

            </select>

            <br>

            <label>Nama Pengemudi</label>

            <input
                type="text"
                name="nama_pengemudi"
                value="<?= $row['nama_pengemudi']; ?>"
                required
            >

            <br>

            <label>Area Saat Ini</label>

            <input
                type="text"
                class="readonly"
                value="<?= $row['nama_area']; ?> (<?= $row['id_area']; ?>)"
                readonly
            >

            <br>

            <label>Nomor Antrian</label>

            <input
                type="text"
                class="readonly"
                value="<?= $row['nomor_antrian']; ?>"
                readonly
            >

            <br>

            <label>Status Kendaraan</label>

            <select name="status">

                <option value="Menunggu"
                <?= ($row['status']=="Menunggu") ? "selected" : "" ?>>
                    Menunggu
                </option>

                <option value="Ditempatkan"
                <?= ($row['status']=="Ditempatkan") ? "selected" : "" ?>>
                    Ditempatkan
                </option>

                <option value="Naik Kapal"
                <?= ($row['status']=="Naik Kapal") ? "selected" : "" ?>>
                    Naik Kapal
                </option>

            </select>

            <div class="button-group">

                <button
                    type="submit"
                    class="btn btn-update">
                    Update Data
                </button>

                <a
                    href="index.php"
                    class="btn btn-kembali">
                    Kembali
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>