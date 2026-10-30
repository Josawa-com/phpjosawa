<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Pegawai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Input Data Pegawai</h2>
        <form action="pegawai-input-aksi.php" method="POST">
            <label>NIP</label>
            <input type="text" name="nip">

            <label>Nama</label>
            <input type="text" name="nama">

            <label>Alamat</label>
            <input type="text" name="alamat">

            <label>Username</label>
            <input type="text" name="username">

            <label>Password</label>
            <input type="text" name="password">

            <input type="submit" value="Simpan">
        </form>
    </div>
</body>
</html>