CREATE DATABASE IF NOT EXISTS inventaris;
USE inventaris;

CREATE TABLE IF NOT EXISTS admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password) VALUES ('admin', MD5('admin123'));

CREATE TABLE IF NOT EXISTS barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode_barang VARCHAR(100),
  nama_barang VARCHAR(100),
  sumber_input ENUM('scan','manual') DEFAULT 'manual',
  tanggal_input DATETIME DEFAULT CURRENT_TIMESTAMP,
  foto LONGBLOB
);