<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM laporan_petugas");
?>
<!DOCTYPE html>
<html>
<head><title>Laporan Petugas</title></head>
<body>
    <h2>Laporan Petugas</h2>
    <a href="tambah.php">Tambah Laporan</a>
    <table border="1">
        <tr><th>ID</th><th>Judul</th><th>Aksi</th></tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['judul'] ?></td>
            <td><a href="detail.php?id=<?= $row['id'] ?>">Detail</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
