<?php
include "../../config/koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan</title>

    <link rel="stylesheet"
          href="../../assets/css/form.css">
</head>

<body>

<div class="container">

    <div class="form-box">

        <h2>Tambah Kendaraan</h2>

        <form action="proses/tambahK.php" method="POST">

            <label>No Polisi</label>
            <input type="text"
                   name="no_polisi"
                   required>

            <label>Jenis Kendaraan</label>

            <select name="jenis_kendaraan" required>
                <option value="">-- Pilih Jenis Kendaraan --</option>
                <option value="Motor">Motor</option>
                <option value="Mobil">Mobil</option>
                <option value="Pickup">Pickup</option>
                <option value="Minibus">Minibus</option>
                <option value="Bus">Bus</option>
                <option value="Truk">Truk</option>
            </select>

            <label>Nama Pengemudi</label>

            <input type="text"
                   name="nama_pengemudi"
                   required>

            <button type="submit">
                Simpan
            </button>

            <a href="index.php"
               class="btn-kembali">

               Kembali

            </a>

        </form>

    </div>

</div>

</body>
</html>