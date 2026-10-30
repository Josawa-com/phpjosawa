<?php
include 'koneksi.php';

$id_transaksi = $_POST['id_transaksi'];
$id_barang    = $_POST['id_barang'];
$qty          = (int) $_POST['qty'];
$nip          = $_POST['nip'];

// ambil harga barang dari database
$stmt = mysqli_prepare($koneksi, "SELECT harga FROM barang WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "s", $id_barang);
mysqli_stmt_execute($stmt);
$barang = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

$harga       = $barang['harga'];
$harga_total = $harga * $qty;

// simpan transaksi
$stmt = mysqli_prepare($koneksi, "INSERT INTO transaksi (id_transaksi, id_barang, harga, qty, harga_total, nip) VALUES (?, ?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssiiis", $id_transaksi, $id_barang, $harga, $qty, $harga_total, $nip);
mysqli_stmt_execute($stmt);

header("location:transaksi.php?pesan=input");