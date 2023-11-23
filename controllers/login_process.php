<?php
session_start();
require "./Connection.php";

// ... (proses login)

// Ambil data profil dari database
$query = $conn->prepare("SELECT email, nama_asli, tempat_lahir, tanggal_lahir FROM user_info WHERE username=?");
$query->bind_param("s", $_SESSION['username']);
$query->execute();
$query->bind_result($email, $nama_asli, $tempat_lahir, $tanggal_lahir);
$query->fetch();

// Simpan data profil ke dalam sesi
$_SESSION['email'] = $email;
$_SESSION['nama_asli'] = $nama_asli;
$_SESSION['tempat_lahir'] = $tempat_lahir;
$_SESSION['tanggal_lahir'] = $tanggal_lahir;

// Menutup koneksi database
$conn->close();
?>
