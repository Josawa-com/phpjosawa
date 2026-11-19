<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Daftar Barang</h2>
        <p class="page-sub">Kelola data barang dan stok.</p>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'hapus'): ?>
            <div class="alert alert-success">Barang berhasil dihapus.</div>
        <?php endif; ?>

        <div class="card">
            <div class="table-toolbar">
                <h3>Semua Barang</h3>
                <a href="barang-input.php" class="btn">+ Input Data Barang</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY id_barang");
                    $ada = false;
                    while ($row = mysqli_fetch_assoc($query)) {
                        $ada = true;
                    ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($row['id_barang']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['nama_barang']); ?></td>
                        <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td>
                            <a href="barang-hapus.php?id=<?php echo urlencode($row['id_barang']); ?>"
                               class="hapus"
                               onclick="return confirm('Yakin mau hapus barang ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if (!$ada): ?>
                    <tr>
                        <td colspan="5" class="empty-row">Belum ada barang.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
