<?php
session_start();
require "./Connection.php"; 

if ($_SESSION['is_login'] !== true) {
    header("Location: login.php");
    exit();
}

if ($_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("CSRF token validation failed.");
}else{
    $email = $_POST['email'];
    $nama_asli = $_POST['nama_asli'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];

    $query = $conn->prepare("INSERT INTO user_info (email, nama_asli, tempat_lahir, tanggal_lahir) VALUES (?, ?, ?, ?)");

    $query->bind_param("ssss", $email, $nama_asli, $tempat_lahir, $tanggal_lahir);

    if ($query->execute()) {
        $_SESSION['email'] = $email;
        $_SESSION['nama_asli'] = $nama_asli;
        $_SESSION['tempat_lahir'] = $tempat_lahir;
        $_SESSION['tanggal_lahir'] = $tanggal_lahir;

        header("Location: ../profile.php");
        exit();
    } else {
        die("Error: " . $query->error);
    }
}


$conn->close();
?>
