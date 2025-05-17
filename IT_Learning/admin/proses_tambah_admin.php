<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Enkripsi password

    $query = "INSERT INTO admin (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("ss", $username, $password);
        if ($stmt->execute()) {
            header("Location: datapetugas.php?status=sukses");
            exit();
        } else {
            echo "Gagal menambahkan admin.";
        }
        $stmt->close();
    } else {
        echo "Kesalahan pada query.";
    }
}
?>
