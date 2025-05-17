<?php
include 'koneksi.php';

$nama          = $_POST['nama'];
$tgl_lahir     = $_POST['tgl_lahir'];
$alamat        = $_POST['alamat'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$kelas         = $_POST['kelas'];
$alasan        = $_POST['alasan'];
$no_hp         = $_POST['no_hp'];

if ($nama && $tgl_lahir && $alamat && $jenis_kelamin && $kelas && $alasan && $no_hp) {
    
    // Generate nomor pendaftaran otomatis
    $tanggalSekarang = date('Ymd'); // Contoh: 20250515
    // Ambil count pendaftaran hari ini untuk nomor urut
    $queryCount = $conn->prepare("SELECT COUNT(*) as total FROM pendaftaran WHERE DATE(created_at) = CURDATE()");
    $queryCount->execute();
    $resultCount = $queryCount->get_result()->fetch_assoc();
    $nomorUrut = $resultCount['total'] + 1;
    $nomorPendaftaran = sprintf("PP-%s-%04d", $tanggalSekarang, $nomorUrut); // PP-20250515-0001

    // Asumsi kamu punya kolom created_at dengan default CURRENT_TIMESTAMP di tabel pendaftaran, kalau belum bisa diubah
    $stmt = $conn->prepare("INSERT INTO pendaftaran (nomor_pendaftaran, nama, tgl_lahir, alamat, jenis_kelamin, kelas, alasan, no_hp) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $nomorPendaftaran, $nama, $tgl_lahir, $alamat, $jenis_kelamin, $kelas, $alasan, $no_hp);

    if ($stmt->execute()) {
        header('Location: bukti_pendaftaran.php?id=' . $conn->insert_id);
        exit();
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Semua field harus diisi!";
}

$conn->close();
?>
