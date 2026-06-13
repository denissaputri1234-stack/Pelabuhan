<?php
include "../../config/koneksi.php";

$id = $_GET['id'];

$data = mysqli_query($koneksi,"
SELECT * FROM area_tunggu
WHERE id_area='$id'
");

$row = mysqli_fetch_assoc($data);

$user = mysqli_query($koneksi,"SELECT * FROM users");
?>

<h2>Edit Area Tunggu</h2>

<form action="proses/edit.php" method="POST">

    <input type="hidden"
           name="id_area"
           value="<?= $row['id_area'] ?>">

    <label>Petugas</label><br>

    <select name="id_user">

        <?php while($u=mysqli_fetch_assoc($user)){ ?>

        <option
        value="<?= $u['id_user'] ?>"

        <?= ($u['id_user']==$row['id_user'])
            ? 'selected'
            : '' ?>>

            <?= $u['nama'] ?>

        </option>

        <?php } ?>

    </select>

    <br><br>

    <label>Nama Area</label><br>

    <input type="text"
           name="nama_area"
           value="<?= $row['nama_area'] ?>">

    <br><br>

    <label>Kapasitas</label><br>

    <input type="number"
           name="kapasitas"
           value="<?= $row['kapasitas'] ?>">

    <br><br>

    <label>Keterangan</label><br>

    <textarea name="keterangan"><?= $row['keterangan'] ?></textarea>

    <br><br>

    <button type="submit">Update</button>

</form>