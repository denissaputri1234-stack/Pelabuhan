<?php
include "../../config/koneksi.php";

$user = mysqli_query($koneksi,"SELECT * FROM users");
?>

<h2>Tambah Area Tunggu</h2>

<form action="proses/tambah.php" method="POST">

    <label>Petugas</label><br>
    <select name="id_user" required>

        <?php while($u=mysqli_fetch_assoc($user)){ ?>

        <option value="<?= $u['id_user'] ?>">
            <?= $u['nama'] ?>
        </option>

        <?php } ?>

    </select>

    <br><br>

    <label>Nama Area</label><br>
    <input type="text" name="nama_area" required>

    <br><br>

    <label>Kapasitas</label><br>
    <input type="number" name="kapasitas" required>

    <br><br>

    <label>Keterangan</label><br>
    <textarea name="keterangan"></textarea>

    <br><br>

    <button type="submit">Simpan</button>

</form>