<?php
require "./Connection.php";

$query = $conn->prepare("
    ALTER TABLE user_info
    ADD COLUMN nama_asli VARCHAR(255),
    ADD COLUMN email VARCHAR(255),
    ADD COLUMN tempat_lahir VARCHAR(255),
    ADD COLUMN tanggal_lahir DATE
");

$query->execute();

$conn->close();
?>
