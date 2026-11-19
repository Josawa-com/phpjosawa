-- Database untuk project Toko (folder hph)
-- Import lewat HeidiSQL atau: mysql -u root toko < toko.sql

CREATE DATABASE IF NOT EXISTS toko CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE toko;

-- Akun login (dipakai register.php)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Data pegawai
CREATE TABLE IF NOT EXISTS pegawai (
    nip VARCHAR(20) PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    alamat TEXT,
    username VARCHAR(50),
    password VARCHAR(255)
);

-- Data barang
CREATE TABLE IF NOT EXISTS barang (
    id_barang VARCHAR(20) PRIMARY KEY,
    nama_barang VARCHAR(100) NOT NULL,
    harga INT NOT NULL DEFAULT 0,
    stock INT NOT NULL DEFAULT 0
);

-- Data transaksi
CREATE TABLE IF NOT EXISTS transaksi (
    id_transaksi VARCHAR(20) PRIMARY KEY,
    id_barang VARCHAR(20) NOT NULL,
    harga INT NOT NULL DEFAULT 0,
    qty INT NOT NULL DEFAULT 0,
    harga_total INT NOT NULL DEFAULT 0
);

INSERT INTO pegawai (nip, nama, alamat, username, password) VALUES
('001', 'Budi Santoso', 'Jl. Merdeka No. 1', 'budi', 'budi123'),
('002', 'Siti Aminah', 'Jl. Sudirman No. 5', 'siti', 'siti123');

INSERT INTO barang (id_barang, nama_barang, harga, stock) VALUES
('B001', 'Buku Tulis', 5000, 100),
('B002', 'Pulpen Hitam', 3000, 150),
('B003', 'Penghapus', 2000, 80);

INSERT INTO transaksi (id_transaksi, id_barang, harga, qty, harga_total) VALUES
('T001', 'B001', 5000, 2, 10000),
('T002', 'B002', 3000, 3, 9000);
