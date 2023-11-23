<?php
session_start();
require "./Connection.php";

function doLogin($username, $password) {
    global $conn;

    $query = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $data = $result->fetch_assoc();

        // Verify the entered password with the hashed password from the database
        if (password_verify($password, $data['password'])) {
            $_SESSION["success_message"] = "Welcome, $username";

            $_SESSION['is_login'] = true;
            $_SESSION['username'] = $data["username"];
            $_SESSION["role"] = $data["role"];
            $_SESSION["fullname"] = $data["fullname"];

            header("Location: ../profile.php");
            exit();
        } else {
            $_SESSION["error_message"] = "Username or Password Incorrect.";
            header("Location: ../login.php?error=1");
            exit();
        }
    } else {
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
