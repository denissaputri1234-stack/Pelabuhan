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

INSERT INTO users (nama, username, password, role)
VALUES
('Admin 1', 'admin1', '12345', 'admin'),
('Admin 2', 'admin2', '12345', 'admin'),
('Petugas 1', 'petugas1', '12345', 'petugas'),
('Petugas 2', 'petugas2', '12345', 'petugas');

-- ==========================
-- TABEL AREA TUNGGU
-- ==========================
CREATE TABLE area_tunggu (
    id_area VARCHAR(10) PRIMARY KEY,
    id_user INT NOT NULL,
    nama_area VARCHAR(50) NOT NULL,
    kapasitas INT NOT NULL,
    status ENUM('Aktif','Tidak Aktif') DEFAULT 'Aktif',
    keterangan TEXT,

    FOREIGN KEY (id_user)
    REFERENCES users(id_user)
);

INSERT INTO area_tunggu
(id_area, id_user, nama_area, kapasitas, status, keterangan)
VALUES
('A1', 1, 'Area A', 50, 'Aktif', 'Area kendaraan kecil'),
('B1', 1, 'Area B', 75, 'Aktif', 'Area kendaraan sedang'),
('C1', 2, 'Area C', 100, 'Tidak Aktif', 'Area kendaraan besar');

-- ==========================
-- TABEL KAPAL
-- ==========================
CREATE TABLE kapal (
    id_kapal INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    nama_kapal VARCHAR(100) NOT NULL,
    kapasitas INT NOT NULL,
    status ENUM('Aktif','Tidak Aktif') DEFAULT 'Aktif',

    FOREIGN KEY (id_user)
    REFERENCES users(id_user)
);

-- ==========================
-- TABEL KENDARAAN
-- ==========================
CREATE TABLE kendaraan (
    id_kendaraan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_area VARCHAR(10) NOT NULL,
    no_polisi VARCHAR(20) NOT NULL,
    jenis_kendaraan VARCHAR(50) NOT NULL,
    nama_pengemudi VARCHAR(100) NOT NULL,
    nomor_antrian VARCHAR(20),
    status ENUM('Menunggu','Ditempatkan','Naik Kapal')
           DEFAULT 'Menunggu',

    FOREIGN KEY (id_user)
    REFERENCES users(id_user),

    FOREIGN KEY (id_area)
    REFERENCES area_tunggu(id_area)
);
ALTER TABLE kendaraan
ADD no_tiket VARCHAR(30);

ALTER TABLE kendaraan
ADD no_tiket VARCHAR(30);

-- ==========================
-- TABEL PENEMPATAN
-- ==========================
CREATE TABLE penempatan (
    id_penempatan INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_kendaraan INT NOT NULL,
    id_kapal INT NOT NULL,
    tanggal_penempatan DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (id_user)
    REFERENCES users(id_user),

    FOREIGN KEY (id_kendaraan)
    REFERENCES kendaraan(id_kendaraan),

    FOREIGN KEY (id_kapal)
    REFERENCES kapal(id_kapal)
);

-- ==========================
-- TABEL LAPORAN
-- ==========================
CREATE TABLE area_tunggu (
    id_area VARCHAR(10) PRIMARY KEY,
    id_user INT NOT NULL,
    nama_area VARCHAR(50) NOT NULL,
    kapasitas INT NOT NULL,
    status ENUM('Aktif','Tidak Aktif') DEFAULT 'Aktif',
    keterangan TEXT,

    FOREIGN KEY (id_user)
    REFERENCES users(id_user)
);


INSERT INTO kapal
(id_user, nama_kapal, kapasitas, status)
VALUES
(1, 'KMP Gilimanuk I', 100, 'Aktif'),
(1, 'KMP Gilimanuk II', 120, 'Aktif'),
(2, 'KMP Nusantara Jaya', 150, 'Aktif'),
(2, 'KMP Bali Sejahtera', 90, 'Tidak Aktif'),
(1, 'KMP Dharma Ferry', 130, 'Aktif'),
(2, 'KMP Samudra Nusantara', 110, 'Aktif'),
(1, 'KMP Selat Bali', 140, 'Aktif'),
(2, 'KMP Pelayaran Jaya', 80, 'Tidak Aktif');