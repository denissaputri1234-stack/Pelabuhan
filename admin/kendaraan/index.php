<?php
include "../../config/koneksi.php";

$query = "
SELECT kendaraan.*,
       area_tunggu.nama_area
FROM kendaraan
JOIN area_tunggu
ON kendaraan.id_area = area_tunggu.id_area
ORDER BY kendaraan.id_kendaraan DESC
";

$data = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kendaraan</title>

    <style>

        body{
            font-family:Arial;
        }

        /* HEADER */
        .header{
            position:relative;
            text-align:center;
            margin-bottom:20px;
        }

        .header h2{
            margin:0;
        }

        /* tombol dashboard kiri atas */
        .btn-back{
            position:absolute;
            left:0;
            top:0;
            background:#0d6efd;
            color:white;
            text-decoration:none;
            padding:10px 16px;
            border-radius:8px;
            font-size:16px;
        }

        .btn-back:hover{
            opacity:0.85;
        }

        /* tombol tambah */
        .btn-add{
            display:inline-block;
            margin-bottom:15px;
            background:#198754;
            color:white;
            padding:10px 15px;
            border-radius:8px;
            text-decoration:none;
        }

        /* aksi */
        .action a{
            display:inline-block;
            padding:12px 15px;
            margin:2px;
            border-radius:10px;
            text-decoration:none;
            color:white;
            font-size:14px;
        }

        .detail{ background:#17a2b8; }
        .edit{ background:#ffc107; color:black; }
        .tiket{ background:#28a745; }
        .hapus{ background:#dc3545; }

        table{
            width:100%;
            border-collapse:collapse;
        }

        th,td{
            border:1px solid #ddd;
            padding:10px;
            text-align:center;
        }

        th{
            background:#0d6efd;
            color:white;
        }

    </style>
</head>

<body>

<!-- HEADER -->
<div class="header">

    <a href="../dashboard.php" class="btn-back">
        ← Dashboard
    </a>

    <h2>Data Kendaraan</h2>

</div>

<!-- tombol tambah -->
<a href="tambah.php" class="btn-add">
    + Tambah Kendaraan
</a>

<br><br>

<table>

    <tr>
        <th>No</th>
        <th>No Polisi</th>
        <th>Jenis Kendaraan</th>
        <th>Area Tunggu</th>
        <th>Nomor Antrian</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    <?php if(mysqli_num_rows($data) > 0){ ?>

        <?php $no = 1; ?>
        <?php while($row = mysqli_fetch_assoc($data)){ ?>

        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['no_polisi']; ?></td>
            <td><?= $row['jenis_kendaraan']; ?></td>

            <td>
                <?= $row['nama_area']; ?> (<?= $row['id_area']; ?>)
            </td>

            <td><?= $row['nomor_antrian']; ?></td>
            <td><?= $row['status']; ?></td>

            <td class="action">

                <a class="detail" href="detail.php?id=<?= $row['id_kendaraan']; ?>">Detail</a>
                <a class="edit" href="edit.php?id=<?= $row['id_kendaraan']; ?>">Edit</a>
                <a class="tiket" href="tiket.php?id=<?= $row['id_kendaraan']; ?>">Tiket</a>
                <a class="hapus"
                   href="proses/hapusK.php?id=<?= $row['id_kendaraan']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    <?php } else { ?>

        <tr>
            <td colspan="7">Belum ada data kendaraan</td>
        </tr>

    <?php } ?>

</table>

</body>
</html>