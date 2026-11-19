<?php include 'koneksi.php';

$totalPegawai = 0;
$totalBarang = 0;
$totalStok = 0;
$totalPendapatan = 0;

$result = mysqli_query($koneksi, "SELECT COUNT(*) AS total FROM pegawai");
$totalPegawai = (int) mysqli_fetch_assoc($result)['total'];

$result = mysqli_query($koneksi, "SELECT COUNT(*) AS total, COALESCE(SUM(stock), 0) AS stok FROM barang");
$row = mysqli_fetch_assoc($result);
$totalBarang = (int) $row['total'];
$totalStok = (int) $row['stok'];

$result = mysqli_query($koneksi, "SELECT COALESCE(SUM(harga_total), 0) AS total FROM transaksi");
$totalPendapatan = (int) mysqli_fetch_assoc($result)['total'];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <div class="banner">
            <h2>Dashboard Toko</h2>
            <p>Selamat datang! Pantau data pegawai, barang, dan transaksi di sini.</p>
        </div>

        <div class="stats">
            <div class="stat-card">
                <span class="stat-icon">👥</span>
                <div class="stat-label">Pegawai</div>
                <div class="stat-value"><?php echo $totalPegawai; ?></div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">📦</span>
                <div class="stat-label">Jenis Barang</div>
                <div class="stat-value"><?php echo $totalBarang; ?></div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">🏷️</span>
                <div class="stat-label">Total Stok</div>
                <div class="stat-value"><?php echo number_format($totalStok, 0, ',', '.'); ?></div>
            </div>
            <div class="stat-card">
                <span class="stat-icon">💰</span>
                <div class="stat-label">Total Pendapatan</div>
                <div class="stat-value">Rp <?php echo number_format($totalPendapatan, 0, ',', '.'); ?></div>
            </div>
        </div>

        <div class="stats">
            <a href="pegawai.php" class="stat-card" style="text-decoration:none">
                <span class="stat-icon">👥</span>
                <div class="stat-label">Data Pegawai</div>
                <div class="stat-value" style="font-size:16px">Lihat Data →</div>
            </a>
            <a href="barang.php" class="stat-card" style="text-decoration:none">
                <span class="stat-icon">📦</span>
                <div class="stat-label">Data Barang</div>
                <div class="stat-value" style="font-size:16px">Lihat Data →</div>
            </a>
            <a href="transaksi.php" class="stat-card" style="text-decoration:none">
                <span class="stat-icon">🧾</span>
                <div class="stat-label">Data Transaksi</div>
                <div class="stat-value" style="font-size:16px">Lihat Data →</div>
            </a>
        </div>
    </div>
</body>
</html>
