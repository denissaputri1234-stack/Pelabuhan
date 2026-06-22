<?php
include "../../config/koneksi.php";

$query = "SELECT area_tunggu.*, users.nama
          FROM area_tunggu
          JOIN users
          ON area_tunggu.id_user = users.id_user";

$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Area Tunggu</title>

    <link rel="stylesheet" href="../../assets/css/table.css">
</head>
<body>



<h2>Data Area Tunggu</h2>

<a href="../dashboard.php" class="btn-kembali">
    ← 
</a>

<table>

    <tr>
        <th>No</th>
        <th>Nama Area</th>
        <th>Kapasitas</th>
        <th>Status</th>
        <th>Admin</th>
        <th>Aksi</th>
    </tr>

    <?php if (mysqli_num_rows($data) > 0) { ?>

        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($data)) {
        ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_area']; ?></td>
            <td><?= $row['kapasitas']; ?></td>
            <td><?= $row['status']; ?></td>
            <td><?= $row['nama']; ?></td>

            <td>
                <a class="detail" href="detail.php?id=<?= $row['id_area']; ?>">Detail</a>

                <a class="edit" href="edit.php?id=<?= $row['id_area']; ?>">Edit</a>

                <a class="hapus"
                   href="proses/hapus.php?id=<?= $row['id_area']; ?>"
                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                    Hapus
                </a>
            </td>
        </tr>

        <?php } ?>

    <?php } else { ?>

        <tr>
            <td colspan="6" style="text-align:center;">
                Data area tunggu belum tersedia.
            </td>
        </tr>

    <?php } ?>

</table>

<div class="tambah-area">
    <a href="tambah.php" class="btn-tambah">
        + Tambah Area
    </a>
</div>

</body>
</html>