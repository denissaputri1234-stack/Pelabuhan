<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM penempatan");
?>
<!DOCTYPE html>
<html>
<head><title>Penempatan Kendaraan</title></head>
<body>
    <h2>Data Penempatan Kendaraan</h2>
    <a href="cari_tiket.php">Cari Tiket</a>
    <table border="1">
        <tr><th>ID</th><th>No Tiket</th><th>Area</th><th>Aksi</th></tr>
        <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['no_tiket'] ?></td>
            <td><?= $row['area'] ?></td>
            <td><a href="detail.php?id=<?= $row['id'] ?>">Detail</a></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
