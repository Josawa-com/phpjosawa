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
        <form action="barang-input-aksi.php" method="POST">
            <label>Id Barang</label>
            <input type="text" name="id_barang">

            <label>Nama Barang</label>
            <input type="text" name="nama_barang">

            <label>Harga</label>
            <input type="text" name="harga">

            <label>Stock</label>
            <input type="text" name="stock">

            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>