<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM pendaftaran WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();

    if ($data) {
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <title>Bukti Pendaftaran</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="css/css.css">
</head>
<body>
    <div class="confirmation-section">
        <div class="confirmation-header">
            <h2>Silakan Screenshot dan Tunjukkan ke Admin</h2>
            <p>Berikut adalah bukti pendaftaran Anda</p>
        </div>
        
        <div class="confirmation-details">
            <h3><i class="fas fa-file-alt"></i> Detail Pendaftaran</h3>
            <div class="detail-item">
                <span class="detail-label">Nomor Pendaftaran:</span>
                    <span class="detail-value"><?= htmlspecialchars($data['nomor_pendaftaran']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Nama Lengkap:</span>
                <span class="detail-value"><?= htmlspecialchars($data['nama']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Tanggal Lahir:</span>
                <span class="detail-value"><?= htmlspecialchars($data['tgl_lahir']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Kelas:</span>
                <span class="detail-value"><?= htmlspecialchars($data['kelas']) ?></span>
            </div>
            <div class="detail-item">
                <span class="detail-label">Tanggal Pendaftaran:</span>
                <span class="detail-value"><?= htmlspecialchars(date('d F Y', strtotime($data['tanggal_daftar'] ?? date('Y-m-d')))) ?></span>
            </div>
        </div>
        
        <div class="next-steps">
            <h3><i class="fas fa-list-check"></i> Langkah Selanjutnya</h3>
            <ol>
                <li>Tunjukkan screenshot bukti pendaftaran ini ke admin untuk verifikasi</li>
                <li>Anda akan menerima email konfirmasi dalam 1x24 jam</li>
                <li>Pembayaran dapat dilakukan via transfer bank atau langsung di kantor kami</li>
                <li>Jadwal kelas akan dikirimkan setelah pembayaran diterima</li>
            </ol>
        </div>

        <div class="btn-wrap">
            <form action="index.php" method="get">
                <button type="submit">Oke</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
    } else {
        echo "Data tidak ditemukan.";
    }

    $stmt->close();
} else {
    echo "ID tidak ditemukan.";
}

$conn->close();
?>
