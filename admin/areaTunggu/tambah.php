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

<div class="form-box">

    <h2>Tambah Area Tunggu</h2>

    <form action="proses/tambah.php" method="POST">

        <label>ID Area</label>

        <input
            type="text"
            name="id_area"
            placeholder="Contoh : D1"
            maxlength="10"
            required
        >

        <br><br>

        <label>Admin</label>

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

        <label>Nama Area</label>

        <input
            type="text"
            name="nama_area"
            placeholder="Masukkan nama area"
            required
        >

        <br><br>

        <label>Kapasitas</label>

        <input
            type="number"
            name="kapasitas"
            min="1"
            placeholder="Masukkan kapasitas"
            required
        >

        <br><br>

        <label>Keterangan</label>

        <textarea
            name="keterangan"
            rows="4"
            placeholder="Masukkan keterangan area"
        ></textarea>

        <br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>

    </form>

</div>

</body>
</html>