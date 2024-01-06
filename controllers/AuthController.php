<?php
session_start();
require "./Connection.php";

function checkLoginAttempts($username) {
    if (!isset($_SESSION['login_attempts'])) {
        $_SESSION['login_attempts'] = 0;
    }

    $_SESSION['login_attempts']++;

    if ($_SESSION['login_attempts'] >= 5) {
        $delayTime = 120;
        $lastFailedAttemptTime = $_SESSION['last_failed_attempt'] ?? 0;
        $currentTime = time();

        if ($currentTime - $lastFailedAttemptTime < $delayTime) {
            $_SESSION["error_message"] = "Too many failed login attempts. Please wait 2 minutes before trying again.";
            header("Location: ../login.php?error=1");
            exit();
        } else {
            $_SESSION['login_attempts'] = 0;
        }
    }
}

function doLogin($username, $password) {
    global $conn;

    checkLoginAttempts($username);

    $query = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        if (password_verify($password, $data['password'])) {
            $_SESSION["success_message"] = "Welcome, $username";

            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $data["username"];
            $_SESSION["role"] = $data["role"];
            $_SESSION["fullname"] = $data["fullname"];

            $_SESSION['login_attempts'] = 0;

            header("Location: ../profile.php");
            exit();
        } else {
            $_SESSION['last_failed_attempt'] = time();
            $_SESSION["error_message"] = "Username or Password Incorrect.";
            header("Location: ../login.php?error=1");
            exit();
        }
    } else {
        $_SESSION['last_failed_attempt'] = time(); 
        $_SESSION["error_message"] = "Username or Password Incorrect.";
        header("Location: ../login.php?error=1");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    doLogin($username, $password);
} elseif (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../login.php");
    exit();
}
?>
