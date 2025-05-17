<?php
include './inc/header.php';
include '../koneksi.php';

// Ambil data admin dari database
$query = "SELECT * FROM admin ORDER BY id DESC";
$result = $conn->query($query);
?>

<div class="container">
    <h2>Manajemen Admin / Petugas</h2>

    <!-- Form Tambah Admin -->
    <form action="proses_tambah_admin.php" method="POST" class="form-tambah-admin">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" required placeholder="Masukkan username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" required placeholder="Masukkan password">
        </div>
        <button type="submit" class="submit-btn">
            <i class="fas fa-plus-circle"></i> Tambah Admin
        </button>
    </form>

    <br>

     <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['username']); ?></td>
                        <td>
                            <div class="action-btns">
                                <a class="edit-btn" href="edit_admin.php?id=<?= $row['id']; ?>"><i class="fas fa-edit"></i></a>

                                <form action="proses_hapus_admin.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus admin ini?')">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="3" style="text-align:center;">Tidak ada data admin</td></tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include './inc/footer.php'; ?>
