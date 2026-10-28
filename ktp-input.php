<?php
session_start();
require 'Root.php';

if(isset($_POST['submit'])) {

    $NIK = trim($_POST['NIK']);
    $Nama = trim($_POST['Nama']);
    $Tgl_lahir = trim($_POST['Tgl_lahir']);
    $Jenis_Kelamin = trim($_POST['Jenis_Kelamin']);
    $Alamat = trim($_POST['Alamat']);
    $RT_TW = trim($_POST['RT_TW']);
    $Kel_Desa = trim($_POST['Kel_Desa']);
    $Kecamatan = trim($_POST['Kecamatan']);
    $Agama = trim($_POST['Agama']);
    $Status_Perkawinan = trim($_POST['Status_Perkawinan']);
    $Pekerjaan = trim($_POST['Pekerjaan']);
    $Kwarganegaraan = trim($_POST['Kwarganegaraan']);
    $Masa_Berlaku = trim($_POST['Masa_Berlaku']);
    $Gol_Darah = trim($_POST['Gol_Darah']);

    $stmt = $conn->prepare(
        "INSERT INTO ktp (NIK, Nama, Tgl_lahir, Jenis_Kelamin, Alamat, RT_TW, Kel_Desa, Kecamatan, Agama, Status_Perkawinan, Pekerjaan, Kwarganegaraan, Masa_Berlaku, Gol_Darah) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    $stmt->bind_param("ssssssssssssss", $NIK, $Nama, $Tgl_lahir, $Jenis_Kelamin, $Alamat, $RT_TW, $Kel_Desa, $Kecamatan, $Agama, $Status_Perkawinan, $Pekerjaan, $Kwarganegaraan, $Masa_Berlaku, $Gol_Darah);

    if($stmt->execute()) {
        $_SESSION['success'] = "Data Berhasil di simpan";
    } else {
        $_SESSION['error'] = "Terjadi kesalahan" . $stmt->error;
    }

    $stmt->close();
    $conn->close();

    header("Location: dashboard.php");
    exit;
} else {
    header("Location: dashboard.php");
    exit;
}
?>