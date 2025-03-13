<?php
$host = "localhost";
$user = "root"; // Sesuaikan dengan user MySQL Anda
$pass = ""; // Sesuaikan dengan password MySQL Anda
$db   = "bisik_tangan";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>