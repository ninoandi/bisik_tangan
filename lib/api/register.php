<?php
include 'config.php'; // Pastikan ada file config.php untuk koneksi database

header("Content-Type: application/json");

$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Gunakan hashing lebih aman seperti password_hash()

    if (!empty($name) && !empty($email) && !empty($password)) {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $response['error'] = false;
            $response['message'] = "Registrasi berhasil!";
        } else {
            $response['error'] = true;
            $response['message'] = "Registrasi gagal!";
        }
    } else {
        $response['error'] = true;
        $response['message'] = "Semua data harus diisi!";
    }
} else {
    $response['error'] = true;
    $response['message'] = "Metode tidak diizinkan!";
}

echo json_encode($response);
?>
