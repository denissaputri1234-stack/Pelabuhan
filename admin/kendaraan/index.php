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

    <link rel="stylesheet" href="../../assets/css/table.css">
</head>
<body>

<h2>Data Kendaraan</h2>

<p>

    <a href="../dashboard.php">
        ← Kembali ke Dashboard
    </a>

    |

    <a href="tambah.php">
        + Tambah Kendaraan
    </a>

</p>

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

        <?php
        $no = 1;

        while($row = mysqli_fetch_assoc($data)){
        ?>

        <tr>

            <td><?= $no++; ?></td>

            <td><?= $row['no_polisi']; ?></td>

            <td><?= $row['jenis_kendaraan']; ?></td>


            <td>
                <?= $row['nama_area']; ?>
                (<?= $row['id_area']; ?>)
            </td>

            <td><?= $row['nomor_antrian']; ?></td>

            <td><?= $row['status']; ?></td>

            <td>

                <a href="detail.php?id=<?= $row['id_kendaraan']; ?>">
                    Detail
                </a>

                |

                <a href="edit.php?id=<?= $row['id_kendaraan']; ?>">
                    Edit
                </a>

                |

                <a href="tiket.php?id=<?= $row['id_kendaraan']; ?>">
                    Tiket
                </a>

                |

                <a href="proses/hapusK.php?id=<?= $row['id_kendaraan']; ?>"
                   onclick="return confirm('Yakin ingin menghapus data ini?')">
                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    <?php } else { ?>

        <tr>
            <td colspan="8" style="text-align:center;">
                Belum ada data kendaraan.
            </td>
        </tr>

    <?php } ?>

</table>

</body>
</html>