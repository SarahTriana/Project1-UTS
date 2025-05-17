<?php
include './inc/header.php';

// Koneksi ke database
include '../koneksi.php';

// Ambil data pendaftaran dari database, tambahkan kolom id
$query = "SELECT id, nomor_pendaftaran, nama, tgl_lahir, alamat, jenis_kelamin, kelas, alasan, no_hp FROM pendaftaran ORDER BY id DESC";
$result = $conn->query($query);
?>


<div class="container">
 

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Pendaftaran</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Alasan Join</th>
                <th>No. HP</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                $no = 1;
                while ($row = $result->fetch_assoc()) {
                    // Format tanggal lahir ke format dd/mm/yyyy
                    $tgl_lahir = date('d/m/Y', strtotime($row['tgl_lahir']));
                    ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= htmlspecialchars($row['nomor_pendaftaran']); ?></td>
                        <td><?= htmlspecialchars($row['nama']); ?></td>
                        <td><?= $tgl_lahir; ?></td>
                        <td><?= htmlspecialchars($row['alamat']); ?></td>
                        <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
                        <td><span class="badge badge-web"><?= htmlspecialchars($row['kelas']); ?></span></td>
                        <td><?= htmlspecialchars($row['alasan']); ?></td>
                        <td><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td>
                            <div class="action-btns"> 
                        <a class="edit-btn" href="edit_pendaftar.php?id=<?= $row['id'] ?>"><i class="fas fa-edit"></i></a>



                                  <form action="proses_hapus_pendaftaran.php" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                                    <button type="submit" class="delete-btn"><i class="fas fa-trash"></i></button>
                                </form>

                                </div>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                echo '<tr><td colspan="10" style="text-align:center;">Tidak ada data peserta</td></tr>';
            }
            ?>
        </tbody>
    </table>

  
</div>
  

 
<?php include './inc/footer.php'; ?>
