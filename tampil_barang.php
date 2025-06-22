<?php
include "koneksi.php";
$result = $conn->query("SELECT * FROM barang ORDER BY id DESC");
$data = [];
while ($row = $result->fetch_assoc()) {
  if ($row['foto']) {
    $row['foto'] = base64_encode($row['foto']);
  }
  $data[] = $row;
}
header('Content-Type: application/json');
echo json_encode($data);
?>