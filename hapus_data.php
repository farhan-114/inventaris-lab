<?php
include "koneksi.php";
$conn->query("DELETE FROM barang");
echo "OK";
?>