<?php
include 'koneksi.php';

$stmt = mysqli_prepare($koneksi, "DELETE FROM pegawai WHERE nip = ?");
mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
mysqli_stmt_execute($stmt);

header("location:pegawai.php?pesan=hapus");