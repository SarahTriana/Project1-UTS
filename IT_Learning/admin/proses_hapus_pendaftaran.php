<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM pendaftaran WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);  

    if ($stmt->execute()) {
        header("Location: pendaftarbaru.php");
        exit;
    } else {
        echo "Gagal menghapus data: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Akses tidak sah.";
}
