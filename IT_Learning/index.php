<!DOCTYPE html>
<ht  ml lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Kursus Komputer | IT Learning Center</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">
                <i class="fas fa-laptop-code"></i>
                <h1>IT Learning Center</h1>
            </div>
            <p>Tingkatkan skill digitalmu bersama para profesional</p>
        </header>

        <main>
            <div class="form-container">
                <h2><i class="fas fa-user-plus"></i> Formulir Pendaftaran</h2>
                
            <form id="registrationForm" action="proses_daftar.php" method="POST">
                <div class="form-group">
                    <label for="nama"><i class="fas fa-user"></i> Nama Lengkap</label>
                    <input type="text" id="nama" name="nama" required placeholder="Masukkan nama lengkap">
                </div>

                <div class="form-group">
                    <label for="tgl_lahir"><i class="fas fa-calendar-alt"></i> Tanggal Lahir</label>
                    <input type="date" id="tgl_lahir" name="tgl_lahir" required>
                </div>

                <div class="form-group">
                    <label for="alamat"><i class="fas fa-map-marker-alt"></i> Alamat</label>
                    <textarea id="alamat" name="alamat" rows="3" required placeholder="Masukkan alamat lengkap"></textarea>
                </div>

                <div class="form-group">
                                    <label><i class="fas fa-venus-mars"></i> Jenis Kelamin</label>
                                    <div class="radio-group">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-laki" required>
                                            <span class="radio-custom"></span>
                                            Laki-laki
                                        </label>
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Perempuan">
                                            <span class="radio-custom"></span>
                                            Perempuan
                                        </label>
                                    </div>
                                </div>

                <div class="form-group">
                    <label for="kelas"><i class="fas fa-graduation-cap"></i> Pilihan Kelas</label>
                    <select id="kelas" name="kelas" required>
                    <option value="" disabled selected>Pilih kelas yang diminati</option>
                    <option value="MS Office">MS Office (Word, Excel, PowerPoint)</option>
                    <option value="Web Development">Web Development (HTML, CSS, JavaScript)</option>
                    <option value="Desain Grafis">Desain Grafis (Photoshop, Illustrator)</option>
                    <option value="Pemrograman Dasar">Pemrograman Dasar (Python, Java)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alasan"><i class="fas fa-comment-dots"></i> Alasan Mengikuti Kelas</label>
                    <textarea id="alasan" name="alasan" rows="3" required placeholder="Jelaskan alasan Anda mengikuti kursus ini"></textarea>
                </div>

                <div class="form-group">
                    <label for="no_hp"><i class="fas fa-phone"></i> Nomor HP/WhatsApp</label>
                    <input type="tel" id="no_hp" name="no_hp" required placeholder="Contoh: 081234567890">
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Daftar Sekarang
                </button>
            </form>


            </div>
            
            <div class="info-sidebar">
                <div class="info-card">
                    <h3><i class="fas fa-info-circle"></i> Informasi Penting</h3>
                    <ul>
                        <li><i class="fas fa-check-circle"></i> Biaya kursus sudah termasuk modul</li>
                        <li><i class="fas fa-check-circle"></i> Setiap kelas maksimal 15 peserta</li>
                        <li><i class="fas fa-check-circle"></i> Durasi belajar 8 pertemuan</li>
                        <li><i class="fas fa-check-circle"></i> Sertifikat diberikan setelah lulus</li>
                    </ul>
                </div>
                
                <div class="contact-card">
                    <h3><i class="fas fa-headset"></i> Butuh Bantuan?</h3>
                    <p>Hubungi kami melalui:</p>
                    <p><i class="fas fa-phone"></i> 0812-3456-7890</p>
                    <p><i class="fas fa-envelope"></i> info@itlearning.com</p>
                </div>
            </div>
        </main>
    </div> 
     <div id="registrationModal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <div class="confirmation-header">
                <i class="fas fa-check-circle"></i>
                <h2>Pendaftaran Berhasil!</h2>
                <p>Berikut adalah bukti pendaftaran Anda</p>
            </div>
            
             <div id="confirmationSection" class="confirmation-section">
                    <div class="confirmation-header">
                        <h2>Silakan SS dan Tunjukkan ke Admin</h2>
                        <p>Berikut adalah bukti pendaftaran Anda</p>
                    </div>
                    
                    <div class="confirmation-details">
                        <h3><i class="fas fa-file-alt"></i> Detail Pendaftaran</h3>
                        <div class="detail-item">
                            <span class="detail-label">Nomor Pendaftaran:</span>
                            <span class="detail-value" id="confirmationNumber">ITLC-2023-001</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Nama Lengkap:</span>
                            <span class="detail-value" id="confirmationName">John Doe</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Tanggal Lahir:</span>
                            <span class="detail-value" id="confirmationBirthDate">15 Januari 1990</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Kelas:</span>
                            <span class="detail-value" id="confirmationClass">Web Development</span>
                        </div>
                        <div class="detail-item">
                            <span class="detail-label">Tanggal Pendaftaran:</span>
                            <span class="detail-value" id="confirmationDate">15 Oktober 2023</span>
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
                </div>
        </div>
    </div>
     
</body>
</html>