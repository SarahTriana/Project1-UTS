<?php
include './inc/header.php';
include '../koneksi.php';

 if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM admin WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
} else {
    echo "ID tidak ditemukan.";
    exit;
}
?>

<div class="container">
    <h2>Edit Admin / Petugas</h2>

    <form action="proses_edit_admin.php" method="POST" class="form-edit-admin">
        <input type="hidden" name="id" value="<?= $admin['id']; ?>">

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="username" required value="<?= htmlspecialchars($admin['username']); ?>">
        </div>

        <div class="form-group">
            <label>Password Baru (kosongkan jika tidak diubah)</label>
            <input type="password" name="password" placeholder="Password baru">
        </div>

        <button type="submit" class="submit-btn"><i class="fas fa-save"></i> Simpan Perubahan</button>
     </form>
</div>

<?php include './inc/footer.php'; ?>
