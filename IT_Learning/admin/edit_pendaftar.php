<?php
 
include './inc/header.php';
include '../koneksi.php';  // sesuaikan path ini jika berbeda

if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit();
}

$id = $_GET['id'];

// Ambil data berdasar id
$stmt = $conn->prepare("SELECT * FROM pendaftaran WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    echo "Data tidak ditemukan.";
    exit();
}

$stmt->close();
?>
     <div class="form-container">
                <h2><i class="fas fa-user-plus"></i> Formulir Pendaftaran</h2>
                <?php
// Asumsi data sudah diambil dari DB dan ada di $data associative array
// Contoh: $data['nama'], $data['tgl_lahir'], dll.
?>

<form action="proses_edit_pendaftaran.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($data['id']) ?>">

    <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required value="<?= htmlspecialchars($data['nama']) ?>">
    </div>

    <div class="form-group">
        <label for="tgl_lahir">Tanggal Lahir</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required value="<?= htmlspecialchars($data['tgl_lahir']) ?>">
    </div>

    <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea id="alamat" name="alamat" required><?= htmlspecialchars($data['alamat']) ?></textarea>
    </div>

    <div class="form-group">
        <label>Jenis Kelamin</label>
        <label><input type="radio" name="jenis_kelamin" value="Laki-laki" <?= $data['jenis_kelamin'] == 'Laki-laki' ? 'checked' : '' ?>> Laki-laki</label>
        <label><input type="radio" name="jenis_kelamin" value="Perempuan" <?= $data['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>> Perempuan</label>
    </div>

    <div class="form-group">
        <label for="kelas">Pilihan Kelas</label>
        <select id="kelas" name="kelas" required>
            <option value="" disabled>Pilih kelas yang diminati</option>
            <option value="MS Office" <?= $data['kelas'] == 'MS Office' ? 'selected' : '' ?>>MS Office (Word, Excel, PowerPoint)</option>
            <option value="Web Development" <?= $data['kelas'] == 'Web Development' ? 'selected' : '' ?>>Web Development (HTML, CSS, JavaScript)</option>
            <option value="Desain Grafis" <?= $data['kelas'] == 'Desain Grafis' ? 'selected' : '' ?>>Desain Grafis (Photoshop, Illustrator)</option>
            <option value="Pemrograman Dasar" <?= $data['kelas'] == 'Pemrograman Dasar' ? 'selected' : '' ?>>Pemrograman Dasar (Python, Java)</option>
        </select>
    </div>

    <div class="form-group">
        <label for="alasan">Alasan Mengikuti Kelas</label>
        <textarea id="alasan" name="alasan" required><?= htmlspecialchars($data['alasan']) ?></textarea>
    </div>

    <div class="form-group">
        <label for="no_hp">Nomor HP/WhatsApp</label>
        <input type="tel" id="no_hp" name="no_hp" required value="<?= htmlspecialchars($data['no_hp']) ?>">
    </div>

      <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Update Sekarang
     </button>
    
 
</form>

   
        </div>
<?php include './inc/footer.php'; ?>
