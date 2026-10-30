<?php $halaman = basename($_SERVER['PHP_SELF']); ?>
<div class="sidebar">
    <h2>Toko</h2>
    <a href="dashboard.php" class="<?php echo $halaman == 'dashboard.php' ? 'active' : ''; ?>">Dashboard</a>
    <a href="pegawai.php" class="<?php echo $halaman == 'pegawai.php' ? 'active' : ''; ?>">Pegawai</a>
    <a href="barang.php" class="<?php echo $halaman == 'barang.php' ? 'active' : ''; ?>">Barang</a>
    <a href="transaksi.php" class="<?php echo $halaman == 'transaksi.php' ? 'active' : ''; ?>">Transaksi</a>
    <a href="logout.php" class="logout">Logout</a>
</div>