<?php
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Query hapus admin berdasarkan ID
    $query = "DELETE FROM admin WHERE id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            // Jika berhasil, redirect ke halaman data admin
            header("Location: datapetugas.php?status=success");
            exit();
        } else {
            echo "Gagal menghapus data admin.";
        }
        $stmt->close();
    } else {
        echo "Terjadi kesalahan dalam query.";
    }
} else {
    echo "Akses tidak valid.";
}
?>
