<?php
include '../../config/koneksi.php';

$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';

if ($keyword != '') {

    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM kapal
        WHERE nama_kapal LIKE '%$keyword%'"
    );

} else {

    $data = mysqli_query(
        $koneksi,
        "SELECT * FROM kapal"
    );

}

$total_kapal = mysqli_num_rows($data);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kapal</title>

    <link rel="stylesheet" href="../../assets/css/table.css">
</head>
<body>

<div class="container">

    <div class="header">

        <div>
            <h2>DATA KAPAL</h2>

            <a href="../dashboard.php">
                Kembali ke Dashboard
            </a>
        </div>

        <form method="GET">

            <input
                type="text"
                name="keyword"
                placeholder="Cari Kapal..."
                value="<?= $keyword; ?>"
            >

            <button type="submit">
                Cari
            </button>

            <a href="index.php">
                Reset
            </a>

        </form>

    </div>

    <p>
        <b>Total Data Kapal : <?= $total_kapal; ?></b>
    </p>

    <table>

        <tr>
            <th>No</th>
            <th>Nama Kapal</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        if ($total_kapal > 0) {

            while ($row = mysqli_fetch_assoc($data)) {
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $row['nama_kapal']; ?></td>

            <td><?= $row['kapasitas']; ?> Kendaraan</td>

            <td>
                <?= ($row['status'] == 'Aktif')
                    ? 'Berlabuh'
                    : 'Belum Berlabuh'; ?>
            </td>

            <td>
                <a href="detail.php?id=<?= $row['id_kapal']; ?>">
                    Detail
                </a>
            </td>

        </tr>

        <?php
            }
        } else {
        ?>

        <tr>

            <td colspan="5" align="center">
                Data kapal tidak ditemukan.
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>