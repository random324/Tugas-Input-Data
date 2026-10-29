<?php
session_start();
require 'Root.php';

include 'layout/header.php';
include 'layout/sidebar.php';
?>

    <main class="content">
        <?php if (isset($_SESSION['success'])): ?>
            <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                <?= $_SESSION['success']; unset($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px;">
                <?= $_SESSION['error']; unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>
        <div class="form-container">
            <h2>Form Input Data Penduduk</h2>
            <form action="ktp-input.php" method="POST">
            
                <!-- NIK (varchar 16, Primary Key)[cite: 1] -->
                <div class="form-group">
                    <label for="NIK">NIK (16 Karakter):</label>
                    <input type="text" id="NIK" name="NIK" maxlength="16" placeholder="Masukkan 16 digit NIK" required>
                </div>

                <!-- Nama (int 50 / disesuaikan teks)[cite: 1] -->
                <div class="form-group">
                    <label for="Nama">Nama:</label>
                    <input type="text" id="Nama" name="Nama" maxlength="50" placeholder="Masukkan nama lengkap" required>
                </div>

                <!-- Tgl_lahir (date)[cite: 1] -->
                <div class="form-group">
                    <label for="Tgl_lahir">Tanggal Lahir:</label>
                    <input type="date" id="Tgl_lahir" name="Tgl_lahir" required>
                </div>

                <!-- Jenis_Kelamin (varchar 10)[cite: 1] -->
                <div class="form-group">
                    <label for="Jenis_Kelamin">Jenis Kelamin:</label>
                    <select id="Jenis_Kelamin" name="Jenis_Kelamin" required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <!-- Alamat (varchar 30)[cite: 1] -->
                <div class="form-group">
                    <label for="Alamat">Alamat:</label>
                    <input type="text" id="Alamat" name="Alamat" maxlength="30" placeholder="Nama jalan / Perumahan">
                </div>

                <!-- RT/TW (varchar 10)[cite: 1] -->
                <div class="form-group">
                    <label for="RT_TW">RT/TW:</label>
                    <input type="text" id="RT_TW" name="RT_TW" maxlength="10" placeholder="Contoh: 001/002">
                </div>

                <!-- Kel/Desa (varchar 30)[cite: 1] -->
                <div class="form-group">
                    <label for="Kel_Desa">Kel/Desa:</label>
                    <input type="text" id="Kel_Desa" name="Kel_Desa" maxlength="30" placeholder="Nama kelurahan/desa">
                </div>

                <!-- Kecamatan (varchar 30)[cite: 1] -->
                <div class="form-group">
                    <label for="Kecamatan">Kecamatan:</label>
                    <input type="text" id="Kecamatan" name="Kecamatan" maxlength="30" placeholder="Nama kecamatan">
                </div>

                <!-- Agama (varchar 15)[cite: 1] -->
                <div class="form-group">
                    <label for="Agama">Agama:</label>
                    <input type="text" id="Agama" name="Agama" maxlength="15" placeholder="Contoh: Islam, Kristen, dll">
                </div>

                <!-- Status_Perkawinan (varchar 15)[cite: 1] -->
                <div class="form-group">
                    <label for="Status_Perkawinan">Status Perkawinan:</label>
                    <input type="text" id="Status_Perkawinan" name="Status_Perkawinan" maxlength="15" placeholder="Belum Menikah / Menikah">
                </div>

                <!-- Pekerjaan (varchar 50)[cite: 1] -->
                <div class="form-group">
                    <label for="Pekerjaan">Pekerjaan:</label>
                    <input type="text" id="Pekerjaan" name="Pekerjaan" maxlength="50" placeholder="Jenis pekerjaan">
                </div>

                <!-- Kwarganegaraan (varchar 35)[cite: 1] -->
                <div class="form-group">
                    <label for="Kwarganegaraan">Kewarganegaraan:</label>
                    <input type="text" id="Kwarganegaraan" name="Kwarganegaraan" maxlength="35" value="WNI">
                </div>

                <!-- Masa_Berlaku (varchar 10)[cite: 1] -->
                <div class="form-group">
                    <label for="Masa_Berlaku">Masa Berlaku:</label>
                    <input type="text" id="Masa_Berlaku" name="Masa_Berlaku" maxlength="20" placeholder="Seumur Hidup / Tanggal">
                </div>

                <!-- Gol_Darah (varchar 2)[cite: 1] -->
                <div class="form-group">
                    <label for="Gol_Darah">Golongan Darah:</label>
                    <input type="text" id="Gol_Darah" name="Gol_Darah" maxlength="2" placeholder="A / B / AB / O">
                </div>

                <button type="submit" name="submit" class="btn-submit">Simpan Data</button>
            </form>
        </div>
    </main>
<?php 
include 'layout/footer.php';
?>