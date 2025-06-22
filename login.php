<?php
session_start();
include "koneksi.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$q = $conn->query("SELECT * FROM admin WHERE username='$username' AND password='$password'");
if ($q->num_rows > 0) {
  $_SESSION['admin'] = $username;
  header("Location: index.php");
} else {
  echo "<script>alert('Login gagal!');window.location='login.html';</script>";
}
?>