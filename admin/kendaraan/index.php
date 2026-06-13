<?php
include '../../config/koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM kendaraan");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan</title>
</head>
<body>

<h2>Data Kendaraan</h2>

<a href="tambah.php">+ Tambah Kendaraan</a>

<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>No</th>
        <th>No Polisi</th>
        <th>Jenis Kendaraan</th>
        <th>Nama Pengemudi</th>
        <th>Nomor Antrian</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($data)){
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['no_polisi']; ?></td>
        <td><?= $row['jenis_kendaraan']; ?></td>
        <td><?= $row['nama_pengemudi']; ?></td>
        <td><?= $row['nomor_antrian']; ?></td>
        <td><?= $row['status']; ?></td>

        <td>
            <a href="detail.php?id=<?= $row['id_kendaraan']; ?>">Detail</a>
            <a href="edit.php?id=<?= $row['id_kendaraan']; ?>">Edit</a>
            <a href="../proses_kendaraan/hapus.php?id=<?= $row['id_kendaraan']; ?>"
               onclick="return confirm('Yakin hapus?')">
               Hapus
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>