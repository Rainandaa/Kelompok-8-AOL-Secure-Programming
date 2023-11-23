<?php
session_start();
require "./Connection.php";

if ($_SESSION['is_login'] !== true) {
    header("Location: login.php");
    exit();
}

if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['title']) && isset($_POST['recipient']) && isset($_POST['message'])) {
        $title = $_POST['title'];
        $recipient = $_POST['recipient'];
        $messages = $_POST['message'];

        if (!empty($recipient)) {
            $sql = "INSERT INTO coms (title, recipient_id, messages) VALUES (?, ?, ?)";

            // Assuming recipient_id is the correct column name for the user ID
            $recipient_id = getUserIdFromRecipient($recipient);

            $stmt = $conn->prepare($sql);

            // Bind parameter
            $stmt->bind_param("sis", $title, $recipient_id, $messages);

            if ($stmt->execute()) {
                $_SESSION["success_message"] = "Pesan berhasil terkirim.";
                header("Location: ../send.php");
                exit();
            } else {
                $_SESSION["error_message"] = "Pesan gagal terkirim, coba lagi.";
                header("Location: ../send.php");
                exit();
            }

            $stmt->close();
        } else {
            $_SESSION["error_message"] = "Penerima tidak valid.";
            header("Location: ../send.php");
            exit();
        }
    } else {
        $_SESSION["error_message"] = "Silakan lengkapi semua bidang.";
        header("Location: ../send.php");
        exit();
    }
}

$conn->close();

function getUserIdFromRecipient($recipient)
{
    // You need to implement the logic to retrieve the user ID based on the recipient's information
    // For now, it returns a placeholder value (1)
    return 1;
}
?>
