<?php
include 'koneksi.php';

$stmt = mysqli_prepare($koneksi, "INSERT INTO pegawai (nip, nama, alamat, username, password) VALUES (?, ?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, "sssss", $_POST['nip'], $_POST['nama'], $_POST['alamat'], $_POST['username'], $_POST['password']);
mysqli_stmt_execute($stmt);

header("location:pegawai.php?pesan=input");