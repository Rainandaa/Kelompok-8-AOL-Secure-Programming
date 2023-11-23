<?php
session_start();
require "Connection.php";

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

function validate_username($username) {
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,25}$/";
    return preg_match($pattern, $username);
}

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['register'])) {
    $newUsername = clean_input($_POST['new_username']);
    $newPassword = clean_input($_POST['new_password']);

    // Validasi username
    if (!validate_username($newUsername)) {
        $_SESSION["error_message"] = "Invalid username format.";
        header("Location: ../register.php");
        exit();
    }

    // Validasi password, misalnya minimal 8 karakter
    if (strlen($newPassword) < 8) {
        $_SESSION["error_message"] = "Password must be at least 8 characters long.";
        header("Location: ../register.php");
        exit();
    }

    // Hash password sebelum menyimpan ke database
    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

    // Periksa ketersediaan nama pengguna
    $checkUsernameQuery = "SELECT * FROM users WHERE username = ?";
    $checkUsernameStmt = $conn->prepare($checkUsernameQuery);
    $checkUsernameStmt->bind_param("s", $newUsername);
    $checkUsernameStmt->execute();
    $result = $checkUsernameStmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION["error_message"] = "Username already exists. Choose a different one.";
        header("Location: ../register.php");
        exit();
    }

    // Simpan pengguna baru ke database
    $query = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $newUsername, $hashedPassword);

    if ($stmt->execute()) {
        $_SESSION["success_message"] = "Registration successful. Silakan login.";
        header("Location: ../login.php");
        exit();
    } else {
        $_SESSION["error_message"] = "Registration failed. Silakan coba lagi.";
        header("Location: ../register.php");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>
