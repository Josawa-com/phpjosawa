<?php
include 'koneksi.php';

$id_transaksi = trim($_POST['id_transaksi'] ?? '');
$id_barang    = trim($_POST['id_barang'] ?? '');
$qty          = (int) ($_POST['qty'] ?? 0);

if ($id_transaksi === '' || $id_barang === '' || $qty < 1) {
    header("Location: transaksi-input.php?error=validasi");
    exit;
}

$stmt = mysqli_prepare($koneksi, "SELECT harga, stock FROM barang WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "s", $id_barang);
mysqli_stmt_execute($stmt);
$barang = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if (!$barang) {
    header("Location: transaksi-input.php?error=barang");
    exit;
}

if ($qty > (int) $barang['stock']) {
    header("Location: transaksi-input.php?error=stok");
    exit;
}

$harga = (int) $barang['harga'];
$total = $harga * $qty;

$stmt = mysqli_prepare($koneksi, "INSERT INTO transaksi (id_transaksi, id_barang, harga, qty, harga_total) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "ssiii", $id_transaksi, $id_barang, $harga, $qty, $total);
mysqli_stmt_execute($stmt);

$stmt = mysqli_prepare($koneksi, "UPDATE barang SET stock = stock - ? WHERE id_barang = ?");
mysqli_stmt_bind_param($stmt, "is", $qty, $id_barang);
mysqli_stmt_execute($stmt);

header("Location: transaksi.php?pesan=input");
exit;
