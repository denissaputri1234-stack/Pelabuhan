<?php
include "../../config/koneksi.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $query = "SELECT * FROM area_tunggu
              WHERE id_area = '$id'";

    $data = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($data);

    if (!$row) {
        echo "Data area tunggu tidak ditemukan!";
        exit();
    }

} else {
    echo "ID area tidak ditemukan!";
    exit();
}

$user = mysqli_query($koneksi,"
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
    <title>Edit Area Tunggu</title>

    <link rel="stylesheet" href="../../assets/css/form.css">
</head>
<body>

<div class="form-box">

    <h2>Edit Area Tunggu</h2>

    <form action="proses/edit.php" method="POST">

        <input
            type="hidden"
            name="id_area"
            value="<?= $row['id_area']; ?>"
        >

        <label>Admin</label>

        <select name="id_user" required>

            <?php while ($u = mysqli_fetch_assoc($user)) { ?>

                <option
                    value="<?= $u['id_user']; ?>"
                    <?= ($u['id_user'] == $row['id_user']) ? 'selected' : ''; ?>
                >
                    <?= $u['nama']; ?>
                </option>

            <?php } ?>

        </select>

        <br><br>

        <label>Nama Area</label>

        <input
            type="text"
            name="nama_area"
            value="<?= $row['nama_area']; ?>"
            required
        >

        <br><br>

        <label>Kapasitas</label>

        <input
            type="number"
            name="kapasitas"
            value="<?= $row['kapasitas']; ?>"
            min="1"
            required
        >

        <br><br>

        <label>Status</label>

        <select name="status" required>

            <option
                value="Aktif"
                <?= ($row['status'] == 'Aktif') ? 'selected' : ''; ?>
            >
                Aktif
            </option>

            <option
                value="Tidak Aktif"
                <?= ($row['status'] == 'Tidak Aktif') ? 'selected' : ''; ?>
            >
                Tidak Aktif
            </option>

        </select>

        <br><br>

        <label>Keterangan</label>

        <textarea
            name="keterangan"
            rows="4"
            placeholder="Masukkan keterangan area"
        ><?= $row['keterangan']; ?></textarea>

        <br><br>

        <button type="submit">Update</button>
        <a href="index.php" class="btn-batal">Batal</a>

    </form>

</div>

</body>
</html>