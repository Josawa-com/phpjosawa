<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Transaksi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Input Data Transaksi</h2>
        <form action="transaksi-input-aksi.php" method="POST">
            <label>ID Transaksi</label>
            <input type="text" name="id_transaksi">

            <label>Barang</label>
            <select name="id_barang">
                <?php
                $barang = mysqli_query($koneksi, "SELECT id_barang, nama_barang, harga FROM barang");
                while ($b = mysqli_fetch_assoc($barang)) {
                    echo "<option value='" . $b['id_barang'] . "'>" . $b['id_barang'] . " - " . $b['nama_barang'] . " (" . $b['harga'] . ")</option>";
                }
                ?>
            </select>

            <label>Qty</label>
            <input type="text" name="qty">

            <label>Pegawai</label>
            <select name="nip">
                <?php
                $pegawai = mysqli_query($koneksi, "SELECT nip, nama FROM pegawai");
                while ($p = mysqli_fetch_assoc($pegawai)) {
                    echo "<option value='" . $p['nip'] . "'>" . $p['nip'] . " - " . $p['nama'] . "</option>";
                }
                ?>
            </select>

            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>