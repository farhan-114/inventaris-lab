<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include "koneksi.php";

$data = $_POST['image'] ?? '';
$kode = $_POST['kode'] ?? '';
$nama = $_POST['nama'] ?? '';
$sumber = $_POST['sumber'] ?? 'scan';

$imgData = explode(',', $data, 2);
if (count($imgData) < 2) die("ERROR: format base64 salah");
$binary = base64_decode($imgData[1]);

$blob = null;
$stmt = $conn->prepare("INSERT INTO barang (kode_barang, nama_barang, sumber_input, foto) VALUES (?, ?, ?, ?)");
$stmt->bind_param("sssb", $kode, $nama, $sumber, $blob);
$stmt->send_long_data(3, $binary);
if (!$stmt->execute()) {
  die("ERROR SQL: " . $stmt->error);
}
echo "OK";
?>