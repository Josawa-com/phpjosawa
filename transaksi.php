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
        <p class="page-sub">Riwayat transaksi penjualan.</p>

        <?php if (isset($_GET['pesan'])): ?>
            <?php if ($_GET['pesan'] === 'input'): ?>
                <div class="alert alert-success">Transaksi berhasil disimpan.</div>
            <?php elseif ($_GET['pesan'] === 'hapus'): ?>
                <div class="alert alert-success">Transaksi berhasil dihapus dan stok barang dikembalikan.</div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="card">
            <div class="table-toolbar">
                <h3>Semua Transaksi</h3>
                <a href="transaksi-input.php" class="btn">+ Input Data Transaksi</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Qty</th>
                        <th>Harga Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT t.*, b.nama_barang FROM transaksi t LEFT JOIN barang b ON t.id_barang = b.id_barang ORDER BY t.id_transaksi");
                    $ada = false;
                    while ($row = mysqli_fetch_assoc($query)) {
                        $ada = true;
                    ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($row['id_transaksi']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['nama_barang'] ?? $row['id_barang']); ?> <span style="color:#64748b">(<?php echo htmlspecialchars($row['id_barang']); ?>)</span></td>
                        <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['qty']; ?></td>
                        <td><strong>Rp <?php echo number_format($row['harga_total'], 0, ',', '.'); ?></strong></td>
                        <td>
                            <a href="transaksi-hapus.php?id=<?php echo urlencode($row['id_transaksi']); ?>"
                               class="hapus"
                               onclick="return confirm('Yakin mau hapus transaksi ini? Stok barang akan dikembalikan.')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if (!$ada): ?>
                    <tr>
                        <td colspan="6" class="empty-row">Belum ada transaksi.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
