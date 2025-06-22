<?php
include "koneksi.php";
$kode = $_POST['kode'] ?? '';
$nama = $_POST['nama'] ?? '';
$sumber = $_POST['sumber'] ?? 'manual';
$stmt = $conn->prepare("INSERT INTO barang (kode_barang, nama_barang, sumber_input) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $kode, $nama, $sumber);
$stmt->execute();
echo "OK";
?>