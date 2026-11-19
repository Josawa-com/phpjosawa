<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Input Data Barang</h2>
        <p class="page-sub">Tambahkan barang baru beserta harga dan stoknya.</p>
        <div class="card">
            <form action="barang-input-aksi.php" method="POST">
                <label>Id Barang</label>
                <input type="text" name="id_barang" placeholder="Contoh: B004" required>

                <label>Nama Barang</label>
                <input type="text" name="nama_barang" placeholder="Contoh: Buku Gambar" required>

                <label>Harga</label>
                <input type="number" name="harga" min="0" placeholder="Contoh: 5000" required>

                <label>Stok</label>
                <input type="number" name="stock" min="0" placeholder="Contoh: 50" required>

                <input type="submit" value="Simpan" class="btn">
            </form>
        </div>
    </div>
</body>
</html>
