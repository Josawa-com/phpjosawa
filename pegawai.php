<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pegawai</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'sidebar.php'; ?>
    <div class="content">
        <h2>Data Pegawai</h2>
        <p class="page-sub">Kelola data pegawai.</p>

        <?php if (isset($_GET['pesan']) && $_GET['pesan'] === 'hapus'): ?>
            <div class="alert alert-success">Pegawai berhasil dihapus.</div>
        <?php endif; ?>

        <div class="card">
            <div class="table-toolbar">
                <h3>Semua Pegawai</h3>
                <a href="pegawai-input.php" class="btn">+ Input Data Pegawai</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($koneksi, "SELECT * FROM pegawai ORDER BY nip");
                    $ada = false;
                    while ($row = mysqli_fetch_assoc($query)) {
                        $ada = true;
                    ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($row['nip']); ?></strong></td>
                        <td><?php echo htmlspecialchars($row['nama']); ?></td>
                        <td><?php echo htmlspecialchars($row['alamat']); ?></td>
                        <td><?php echo htmlspecialchars($row['username']); ?></td>
                        <td><?php echo htmlspecialchars($row['password']); ?></td>
                        <td>
                            <a href="pegawai-hapus.php?id=<?php echo urlencode($row['nip']); ?>"
                               class="hapus"
                               onclick="return confirm('Yakin mau hapus pegawai ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php } ?>
                    <?php if (!$ada): ?>
                    <tr>
                        <td colspan="6" class="empty-row">Belum ada pegawai.</td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
