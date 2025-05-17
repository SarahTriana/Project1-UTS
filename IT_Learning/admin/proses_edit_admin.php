<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($password)) {
        // Jika password diisi, update juga password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE admin SET username = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ssi", $username, $hashed, $id);
    } else {
        // Jika password kosong, hanya update username
        $query = "UPDATE admin SET username = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $username, $id);
    }

    if ($stmt->execute()) {
        header("Location: datapetugas.php?status=updated");
        exit();
    } else {
        echo "Gagal mengupdate data.";
    }
}
?>
