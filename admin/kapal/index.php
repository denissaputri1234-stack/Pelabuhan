<?php
include '../../config/koneksi.php';

if(isset($_GET['keyword']) && $_GET['keyword'] != ''){

    $keyword = $_GET['keyword'];

    $data = mysqli_query($koneksi,
    "SELECT * FROM kapal
    WHERE nama_kapal LIKE '%$keyword%'");

}else{

    $data = mysqli_query($koneksi,
    "SELECT * FROM kapal");

}

$total_kapal = mysqli_num_rows($data);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Kapal</title>
</head>
<body>

    <h2>DATA KAPAL</h2>

    <p>Kelola data kapal Pelabuhan Gilimanuk</p>

    <hr>

    <table width="100%">
        <tr>

            <td>
                <a href="tambah.php">
                    + Tambah Kapal
                </a>
            </td>

            <td align="right">

                <form method="GET">

                    <input
                        type="text"
                        name="keyword"
                        placeholder="Cari Kapal..."
                        value="<?= isset($_GET['keyword']) ? $_GET['keyword'] : '' ?>"
                    >

                    <button type="submit">
                        Cari
                    </button>

                    <a href="index.php">
                        Reset
                    </a>

                </form>

            </td>

        </tr>
    </table>

    <br>

    <p>
        <b>Total Data Kapal : <?= $total_kapal; ?></b>
    </p>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">

        <tr>
            <th>No</th>
            <th>Nama Kapal</th>
            <th>Kapasitas</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = 1;

        while($row = mysqli_fetch_assoc($data)){
        ?>

        <tr>

            <td align="center">
                <?= $no++; ?>
            </td>

            <td>
                <?= $row['nama_kapal']; ?>
            </td>

            <td align="center">
                <?= $row['kapasitas']; ?>
            </td>

            <td align="center">
                <?= $row['status']; ?>
            </td>

            <td align="center">

                <a href="detail.php?id=<?= $row['id_kapal']; ?>">
                    Detail
                </a>

                |

                <a href="edit.php?id=<?= $row['id_kapal']; ?>">
                    Edit
                </a>

                |

                <a
                    href="proses/hapus.php?id=<?= $row['id_kapal']; ?>"
                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                >
                    Hapus
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</body>
</html>