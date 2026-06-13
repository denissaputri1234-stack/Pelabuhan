<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kendaraan</title>
</head>
<body>

<h2>Tambah Kendaraan</h2>

<form action="../proses/tambah.php" method="POST">


    ID User <br>
    <input type="number" name="id_user" required><br><br>

    ID Area <br>
    <input type="number" name="id_area" required><br><br>

    No Polisi <br>
    <input type="text" name="no_polisi" required><br><br>

    Jenis Kendaraan <br>
    <input type="text" name="jenis_kendaraan" required><br><br>

    Nama Pengemudi <br>
    <input type="text" name="nama_pengemudi" required><br><br>

    Nomor Antrian <br>
    <input type="text" name="nomor_antrian"><br><br>

    <button type="submit">Simpan</button>

</form>

</body>
</html>