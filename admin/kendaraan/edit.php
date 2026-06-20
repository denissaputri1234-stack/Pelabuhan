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
<html>
<head>
    <title>Edit Kendaraan</title>

    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>

<h2>Edit Kendaraan</h2>

<form action="proses/editK.php" method="POST">

    <input
        type="hidden"
        name="id_kendaraan"
        value="<?= $row['id_kendaraan']; ?>"
    >

    <label>No Polisi</label><br>

    <input
        type="text"
        name="no_polisi"
        value="<?= $row['no_polisi']; ?>"
        required
    >

    <br><br>

    <label>Jenis Kendaraan</label><br>

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

    <br><br>

    <label>Nama Pengemudi</label><br>

    <input
        type="text"
        name="nama_pengemudi"
        value="<?= $row['nama_pengemudi']; ?>"
        required
    >

    <br><br>

    <label>Area Saat Ini</label><br>

    <input
        type="text"
        value="<?= $row['nama_area']; ?> (<?= $row['id_area']; ?>)"
        readonly
    >

    <br><br>

    <label>Nomor Antrian</label><br>

    <input
        type="text"
        value="<?= $row['nomor_antrian']; ?>"
        readonly
    >

    <br><br>

    <label>Status</label><br>

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

    <br><br>

    <button type="submit">
        Update
    </button>

    <a href="index.php">
        Kembali
    </a>

</form>

</body>
</html>