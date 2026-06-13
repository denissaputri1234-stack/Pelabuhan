CREATE DATABASE pelabuhan_gilimanuk;
USE pelabuhan_gilimanuk;

-- ==========================
-- TABEL USERS
-- ==========================
CREATE TABLE users (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','petugas') NOT NULL
);

-- ==========================
-- TABEL AREA TUNGGU
-- ==========================
CREATE TABLE area_tunggu (
    id_area INT AUTO_INCREMENT PRIMARY KEY,
    nama_area VARCHAR(50) NOT NULL,
    kapasitas INT NOT NULL,
    keterangan TEXT
);

-- ==========================
-- TABEL KAPAL
-- ==========================
CREATE TABLE kapal (
    id_kapal INT AUTO_INCREMENT PRIMARY KEY,
    nama_kapal VARCHAR(100) NOT NULL,
    kapasitas INT NOT NULL,
    status ENUM('Aktif','Tidak Aktif') DEFAULT 'Aktif'
);

-- ==========================
-- TABEL KENDARAAN
-- ==========================
CREATE TABLE kendaraan (
    id_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
    no_polisi VARCHAR(20) NOT NULL,
    jenis_kendaraan VARCHAR(50) NOT NULL,
    nama_pengemudi VARCHAR(100) NOT NULL,
    nomor_antrian VARCHAR(20),
    id_area INT,
    status ENUM('Menunggu','Ditempatkan','Naik Kapal') DEFAULT 'Menunggu'
);

-- ==========================
-- TABEL PENEMPATAN
-- ==========================
CREATE TABLE penempatan (
    id_penempatan INT AUTO_INCREMENT PRIMARY KEY,
    id_kendaraan INT NOT NULL,
    id_area INT NOT NULL,
    tanggal_penempatan DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- ==========================
-- TABEL LAPORAN
-- ==========================
CREATE TABLE laporan (
    id_laporan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    judul VARCHAR(100) NOT NULL,
    isi_laporan TEXT NOT NULL,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP
);
