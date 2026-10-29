<?php
session_start();
require 'Root.php';

$query = "SELECT NIK, Nama, Tgl_lahir, Jenis_Kelamin, Alamat, `RT_TW`, `Kel_Desa`, Kecamatan, Agama, Status_Perkawinan, Pekerjaan, Kwarganegaraan, Masa_Berlaku, Gol_Darah FROM ktp ORDER BY Nama ASC";
$result = $conn->query($query);
include 'layout/header.php';
include 'layout/sidebar.php';
?>

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
<?php 
include 'layout/footer.php'
?>