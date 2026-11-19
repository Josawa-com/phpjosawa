<?php
include 'koneksi.php';

$stmt = mysqli_prepare($koneksi, "SELECT qty, id_barang FROM transaksi WHERE id_transaksi = ?");
mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
mysqli_stmt_execute($stmt);
$transaksi = mysqli_fetch_assoc(mysqli_stmt_get_result($stmt));

if ($transaksi) {
    $stmt = mysqli_prepare($koneksi, "DELETE FROM transaksi WHERE id_transaksi = ?");
    mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
    mysqli_stmt_execute($stmt);

    $stmt = mysqli_prepare($koneksi, "UPDATE barang SET stock = stock + ? WHERE id_barang = ?");
    mysqli_stmt_bind_param($stmt, "is", $transaksi['qty'], $transaksi['id_barang']);
    mysqli_stmt_execute($stmt);
}

header("Location: transaksi.php?pesan=hapus");
exit;
