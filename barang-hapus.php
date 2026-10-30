<?php
include 'koneksi.php';

$id = $_GET['id'];

$stmt = mysqli_prepare($koneksi, "DELETE FROM barang WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "s", $id);
mysqli_stmt_execute($stmt);

header("location:barang.php?pesan=hapus");