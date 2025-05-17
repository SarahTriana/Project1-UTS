<?php
include './inc/header.php';
include '../koneksi.php'; // pastikan $conn adalah koneksi MySQLi, bukan PDO

// Ambil jumlah peserta
$stmtPeserta = $conn->query("SELECT COUNT(*) AS total_peserta FROM pendaftaran");
$rowPeserta = $stmtPeserta->fetch_assoc();
$jumlahPeserta = $rowPeserta['total_peserta'];

// Ambil jumlah petugas
$stmtPetugas = $conn->query("SELECT COUNT(*) AS total_petugas FROM admin");
$rowPetugas = $stmtPetugas->fetch_assoc();
$jumlahPetugas = $rowPetugas['total_petugas'];
?>

<div class="welcome-banner fade-in">
    <h2>Selamat Datang di Sistem Pendaftaran Kursus Komputer</h2>
    <p>Kelola pendaftaran kursus komputer dengan mudah dan efisien. Pantau statistik terbaru dan aktivitas peserta.</p>
</div>

<div class="stats-container">
    <div class="stat-card fade-in delay-1">
        <div class="stat-card-header">
            <i class="fas fa-users"></i>
            <h3>Peserta Baru</h3>
        </div>
        <div class="stat-card-value"><?= $jumlahPeserta ?></div>
    </div>
    <div class="stat-card fade-in delay-4">
        <div class="stat-card-header">
            <i class="fas fa-graduation-cap"></i>
            <h3>Data Petugas</h3>
        </div>
        <div class="stat-card-value"><?= $jumlahPetugas ?></div>
    </div>
</div>

<?php include './inc/footer.php'; ?>
