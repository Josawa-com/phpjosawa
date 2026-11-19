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
        <p class="page-sub">Tambahkan pegawai baru.</p>
        <div class="card">
            <form action="pegawai-input-aksi.php" method="POST">
                <label>NIP</label>
                <input type="text" name="nip" placeholder="Contoh: 003" required>

                <label>Nama</label>
                <input type="text" name="nama" placeholder="Nama lengkap" required>

                <label>Alamat</label>
                <input type="text" name="alamat" placeholder="Alamat lengkap" required>

                <label>Username</label>
                <input type="text" name="username" required>

                <label>Password</label>
                <input type="text" name="password" required>

                <input type="submit" value="Simpan" class="btn">
            </form>
        </div>
    </div>
</body>
</html>
