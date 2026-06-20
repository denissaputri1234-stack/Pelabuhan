<?php
include "../../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan</title>
</head>
<body>

<h2>Tambah Kendaraan</h2>

<form action="proses/tambahK.php" method="POST">

    <label>No Polisi</label><br>
    <input type="text" name="no_polisi" required>

    <br><br>

    <label>Jenis Kendaraan</label><br>

    <select name="jenis_kendaraan" required>
        <option value="">-- Pilih Jenis Kendaraan --</option>
        <option value="Motor">Motor</option>
        <option value="Mobil">Mobil</option>
        <option value="Pickup">Pickup</option>
        <option value="Minibus">Minibus</option>
        <option value="Bus">Bus</option>
        <option value="Truk">Truk</option>
    </select>

    <br><br>

    <label>Nama Pengemudi</label><br>
    <input type="text" name="nama_pengemudi" required>

    <br><br>

    <button type="submit">
        Simpan
    </button>

</form>

</body>
</html>