<?php
session_start();
if (!isset($_SESSION['admin'])) {
header("Location: ../login.php");
    exit();
}

$currentPage = basename($_SERVER['PHP_SELF']); // ambil nama file aktif

?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EduTech - Sistem Pendaftaran Kursus Komputer</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <i class="fas fa-laptop-code"></i>
            <h2>EduTech</h2>
        </div>

        <div class="sidebar-menu">
            <div class="menu-category">Menu Utama</div>
          <div class="menu-item <?= ($currentPage == 'dashboard.php') ? 'active' : '' ?>">
                <i class="fas fa-home"></i>
                <a href="dashboard.php">
                    <span>Dashboard</span>
                </a>
            </div>

            
            <div class="menu-item <?= ($currentPage == 'pendaftarbaru.php') ? 'active' : '' ?>">
                <i class="fas fa-user-plus"></i>
                <a href="pendaftarbaru.php">
                    <span>Pendaftar Baru</span>
                </a>
            </div>

            <div class="menu-item <?= ($currentPage == 'datapetugas.php') ? 'active' : '' ?>">
                <i class="fas fa-users"></i>
                <a href="datapetugas.php">
                    <span>Data Petugas</span>
                </a>
            </div>

            
            <div class="menu-category">Pengaturan</div>
            <div class="menu-item">
                <i class="fas fa-cog"></i>
               <a href="logout.php"><span>Log Out</span></a>
            </div>
        </div>


        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">AD</div>
                <div class="user-info">
                    <h4>Admin EduTech</h4>
                    <p>Super Administrator</p>
                </div>
                <div class="user-action">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content" id="mainContent">
        <div class="header">
            <div class="header-title">
                <h1>Dashboard Pendaftaran</h1>
                <p>Selamat datang kembali, Admin</p>
            </div>
            <div class="header-actions">
                 
                 
                <div class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </div>
                <div class="user-menu">
                    <div class="user-menu-avatar">AD</div>
                    <div class="user-menu-name">Admin</div>
                </div>
            </div>
        </div>

        <div class="content">