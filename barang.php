<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Daftar Barang</h2>
        <a href="barang-input.php" class="btn">+ Input Data Barang</a>
        <table>
            <tr>
                <th>Id_Barang</th>
                <th>Nama_Barang</th>
                <th>Harga</th>
                <th>Stock</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM barang");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td>
                    <a href="barang-hapus.php?id=<?php echo $row['id_barang']; ?>"
                       class="hapus"
                       onclick="return confirm('Yakin mau hapus barang ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>