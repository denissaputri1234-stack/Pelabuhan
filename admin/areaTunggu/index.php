<?php
include "../../config/koneksi.php";

$data = mysqli_query($koneksi,"
SELECT area_tunggu.*, users.nama
FROM area_tunggu
JOIN users ON area_tunggu.id_user = users.id_user
");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Area Tunggu</title>
</head>
<body>

<h2>Data Area Tunggu</h2>

<a href="tambah.php">Tambah Area</a>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Nama Area</th>
        <th>Kapasitas</th>
        <th>Petugas</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no=1;
    while($row=mysqli_fetch_assoc($data)){
    ?>

    <tr>
        <td><?= $no++ ?></td>
        <td><?= $row['nama_area'] ?></td>
        <td><?= $row['kapasitas'] ?></td>
        <td><?= $row['nama'] ?></td>

        <td>
            <a href="detail.php?id=<?= $row['id_area'] ?>">Detail</a>
            <a href="edit.php?id=<?= $row['id_area'] ?>">Edit</a>
            <a href="proses/hapus.php?id=<?= $row['id_area'] ?>"
               onclick="return confirm('Apakah anda yakin ingin menghapusnya?')">
               Hapus
            </a>
        </td>
    </tr>

    <?php } ?>

</table>

</body>
</html>