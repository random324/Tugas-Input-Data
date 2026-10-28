<?php
session_start();
require 'Root.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box;
        font-family: Arial, Helvetica, sans-serif;
    }
    nav {
        position: fixed;
        width: 100%;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 15px;
        border-bottom: 1px solid black;
        z-index: 999;
        top: 0;
        backdrop-filter: blur(20px);
    }
    .brand{
        font-size: 20px;
        font-weight: 600;
        border-bottom: 1px solid black;
    }
    .operator{
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .initial{
        font-size: 20px;
        font-weight: 800;
        width: 34px;
        height: 34px;
        background-color: blue;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #ffffff;
        
    }
    .username{
        border-left: 1px solid black;
        padding-left: 10px;
    }
    .username span{
        font-size: 20px;
        font-weight: 500;
    }
    .sidebar{
        position: fixed;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        top: 50px;
        position: fixed;
        background-color: #6b4545;
        width: 250px;
        height: calc(100vh - 40px);
        padding: 30px 20px 20px 10px;

    }
    .sidebar .item, .log{
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .sidebar .item a{
        display: flex;
        color: #ffffff;
        text-decoration: none;
        height: 35px;
        width: 220px;
        padding-left: 10px;
        border-radius: 10px;
        align-items: center;
        font-size: 17px;
        font-weight: 550;
        border-bottom: 2px solid #fbfafa00;
        transition: all 0.5s;
        background-color: #fffdfd00;
    }
    .sidebar .item a:hover{
        background-color: #08080826;
        backdrop-filter: blur(15px);
        border-bottom: 2px solid white;
        padding-left: 18px;
    }
    .sidebar .log a{
        text-decoration: none;
        color: #ffffff;
        font-size: 17px;
        font-weight: 500;
    }
    .content{
        margin: 70px 20px 20px 270px;
        min-height: calc(150vh - 70px);
        max-width: 8900px;
        background: #ffffff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    h2 {
      text-align: center;
      color: #1e293b;
      margin-bottom: 20px;
    }
    .form-group {
      margin-bottom: 15px;
    }
    label {
      display: block;
      font-weight: bold;
      color: #334155;
      margin-bottom: 5px;
      font-size: 14px;
    }
    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #cbd5e1;
      border-radius: 6px;
      font-size: 14px;
      box-sizing: border-box;
    }
    input:focus, select:focus {
      outline: none;
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }
    .btn-submit {
      width: 100%;
      background-color: #3b82f6;
      color: white;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      transition: background-color 0.2s;
    }
    .btn-submit:hover {
      background-color: #2563eb;
    }
</style>
<body>
    <!-- Navbar -->
    <nav>
        <div class="brand">
            <span>Data Penduduk</span>
        </div>
        <div class="operator">
            <!-- Huruf pertama dari username -->
            <div class="initial">
                B
            </div>
            <!-- Di isi dengan username -->
            <div class="username">
                <span>Budi Santoso</span>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
     <div class="sidebar">

        <!-- Bagian Item -->
        <div class="item">
            <a href="">Dashboard</a>
            <a href="dashboard.php">Input Data</a>
            <a href="TampilPenduduk.php">Data Penduduk</a>
        </div>

        <!-- Untuk Log Out dan Setting -->
        <div class="log">
            <hr>
            <a href="">Log Out</a>
        </div>
     </div>
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
</body>
</html>