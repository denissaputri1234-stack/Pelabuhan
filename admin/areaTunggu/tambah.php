<?php
include "../../config/koneksi.php";

$user = mysqli_query($koneksi, "
SELECT *
FROM users
WHERE role='admin'
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Area Tunggu</title>

    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>

<h2>Tambah Area Tunggu</h2>

<form action="proses/tambah.php" method="POST">

    <label>ID Area</label><br>
    <input
        type="text"
        name="id_area"
        placeholder="Contoh: D1"
        maxlength="10"
        required
    >

    <br><br>

    <label>Admin</label><br>

    <select name="id_user" required>

        <option value="" selected disabled>
            -- Pilih Admin --
        </option>

        <?php while($u = mysqli_fetch_assoc($user)){ ?>

            <option value="<?= $u['id_user']; ?>">
                <?= $u['nama']; ?>
            </option>

        <?php } ?>

    </select>

    <br><br>

    <label>Nama Area</label><br>

    <input
        type="text"
        name="nama_area"
        placeholder="Masukkan nama area"
        required
    >

    <br><br>

    <label>Kapasitas</label><br>

    <input
        type="number"
        name="kapasitas"
        min="1"
        required
    >

    <br><br>

    <label>Status</label><br>

    <select name="status" required>
        <option value="Aktif">Aktif</option>
        <option value="Tidak Aktif">Tidak Aktif</option>
    </select>

    <br><br>

    <label>Keterangan</label><br>

    <textarea
        name="keterangan"
        rows="4"
    ></textarea>

    <br><br>

    <button type="submit">Simpan</button>
    <a href="index.php">Batal</a>

</form>

</body>
</html>