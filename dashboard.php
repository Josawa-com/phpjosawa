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
            <p>Selamat datang di Dashboard Toko! Pantau data pegawai, barang, dan transaksi di sini.</p>
        </div>

        <div class="menu">
            <a href="pegawai.php" class="menu-card">
                <h3>Pegawai</h3>
                <p>Lihat Data Pegawai</p>
            </a>
            <a href="barang.php" class="menu-card">
                <h3>Barang</h3>
                <p>Lihat Data Barang</p>
            </a>
            <a href="transaksi.php" class="menu-card">
                <h3>Transaksi</h3>
                <p>Lihat Data Transaksi</p>
            </a>
        </div>

    </div>
</body>
</html>