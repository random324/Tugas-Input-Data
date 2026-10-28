<?php
session_start();
require 'Root.php';

$query = "SELECT NIK, Nama, Tgl_lahir, Jenis_Kelamin, Alamat, `RT_TW`, `Kel_Desa`, Kecamatan, Agama, Status_Perkawinan, Pekerjaan, Kwarganegaraan, Masa_Berlaku, Gol_Darah FROM ktp ORDER BY Nama ASC";
$result = $conn->query($query);
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
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
            <h2 style="text-align: left; margin-bottom: 0;">Daftar Data Penduduk</h2>
            <a href="dashboard.php" style="background-color: #3b82f6; color: white; padding: 10px 15px; text-decoration: none; border-radius: 5px; font-weight: bold;">+ Tambah Data</a>
        </div>

        <!-- Tabel Data -->
        <div style="overflow-x: auto;">
            <table style="width: 100%; border-collapse: collapse; font-size: 14px; text-align: left;">
                <thead>
                    <tr style="background-color: #f1f5f9; color: #334155;">
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">No</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">NIK</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Nama</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Tgl Lahir</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">L/P</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Alamat</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">RT/TW</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Kel/Desa</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Kecamatan</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Agama</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Status</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Pekerjaan</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Warga</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Masa Berlaku</th>
                        <th style="padding: 12px; border: 1px solid #cbd5e1;">Gol Darah</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Cek apakah ada datanya
                    if ($result && $result->num_rows > 0) {
                        $no = 1;
                        // Looping data dari database
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . $no++ . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['NIK']) . "</td>";
                            
                            // Karena di database Nama bertipe int(50), kita pastikan tampil sebagai string
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Nama']) . "</td>";
                            
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Tgl_lahir']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Jenis_Kelamin']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Alamat']) . "</td>";
                            
                            // Panggil kolom dengan slash
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['RT_TW']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Kel_Desa']) . "</td>";
                            
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Kecamatan']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Agama']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Status_Perkawinan']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Pekerjaan']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Kwarganegaraan']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Masa_Berlaku']) . "</td>";
                            echo "<td style='padding: 10px; border: 1px solid #cbd5e1;'>" . htmlspecialchars($row['Gol_Darah']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        // Jika data kosong
                        echo "<tr><td colspan='15' style='text-align: center; padding: 20px; border: 1px solid #cbd5e1;'>Belum ada data penduduk.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>