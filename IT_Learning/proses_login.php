<?php
session_start();
include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM admin WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if ($data && password_verify($password, $data['password'])) {
    $_SESSION['admin'] = $data['username'];
    header("Location: admin/dashboard.php");
    exit();
} else {
    echo "Login gagal. Username atau password salah.";
}

$stmt->close();
$conn->close();
