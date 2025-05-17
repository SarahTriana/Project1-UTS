<?php
include '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $kelas = $_POST['kelas'];
    $alasan = $_POST['alasan'];
    $no_hp = $_POST['no_hp'];

    $stmt = $conn->prepare("UPDATE pendaftaran SET nama=?, tgl_lahir=?, alamat=?, jenis_kelamin=?, kelas=?, alasan=?, no_hp=? WHERE id=?");
    $stmt->bind_param("sssssssi", $nama, $tgl_lahir, $alamat, $jenis_kelamin, $kelas, $alasan, $no_hp, $id);

    if ($stmt->execute()) {
        header("Location: pendaftarbaru.php?edit=success");
        exit();
    } else {
        echo "Gagal update data: " . $stmt->error;
    }

    $stmt->close();
}
