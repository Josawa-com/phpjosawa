<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Daftar Transaksi</h2>
        <a href="transaksi-input.php" class="btn">+ Input Data Transaksi</a>
        <table>
            <tr>
                <th>ID Transaksi</th>
                <th>ID Barang</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Harga Total</th>
                <th>NIP</th>
                <th>Aksi</th>
            </tr>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM transaksi");
            while ($row = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
                <td><?php echo $row['id_transaksi']; ?></td>
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['harga']; ?></td>
                <td><?php echo $row['qty']; ?></td>
                <td><?php echo $row['harga_total']; ?></td>
                <td><?php echo $row['nip']; ?></td>

0                <a href="transaksi-hapus.php?id=<?php echo $row['id_transaksi']; ?>"
                       class="hapus"
                       onclick="return confirm('Yakin mau hapus transaksi ini?')">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>