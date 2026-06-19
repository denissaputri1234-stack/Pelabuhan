<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM laporan_admin");
?>
<!DOCTYPE html>
<html>
<head><title>Laporan Admin</title></head>
<body>
    <h2>Laporan Admin</h2>
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
