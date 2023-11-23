<?php
session_start();
require "./Connection.php"; // Tambahkan semikolon di sini

// Pastikan pengguna telah login
if ($_SESSION['is_login'] !== true) {
    header("Location: login.php");
    exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
}

// Mendapatkan data dari formulir
$email = $_POST['email'];
$nama_asli = $_POST['nama_asli'];
$tempat_lahir = $_POST['tempat_lahir'];
$tanggal_lahir = $_POST['tanggal_lahir'];

// Menghindari SQL injection dengan menggunakan prepared statement
$query = $conn->prepare("INSERT INTO user_info (email, nama_asli, tempat_lahir, tanggal_lahir) VALUES (?, ?, ?, ?)");

// Bind parameter ke statement
$query->bind_param("ssss", $email, $nama_asli, $tempat_lahir, $tanggal_lahir);

// Eksekusi statement
if ($query->execute()) {
    $_SESSION['email'] = $email;
    $_SESSION['nama_asli'] = $nama_asli;
    $_SESSION['tempat_lahir'] = $tempat_lahir;
    $_SESSION['tanggal_lahir'] = $tanggal_lahir;

    header("Location: ../profile.php");
    exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
} else {
    die("Error: " . $query->error);
}

// Menutup koneksi database
$conn->close();
?>
