<?php
session_start();
$csrf_token = bin2hex(random_bytes(32));
$_SESSION['csrf_token'] = $csrf_token; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update Profile - Tranqsite</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/hack.css">
    <link rel="stylesheet" href="assets/dark.css">
</head>

<body class="hack dark">
    <div class="grid main-form">
        <div>
            <a href="profile.php" class="back-button">&#8592; Back</a>

            <h1>Update Profile</h1>
            <form action="./controllers/update_profile_process.php" method="post">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

                <label for="nama_asli">Nama Asli:</label>
                <input type="text" id="nama_asli" name="nama_asli" value="<?php echo $nama_asli; ?>" required>

                <label for="tempat_lahir">Tempat Lahir:</label>
                <input type="text" id="tempat_lahir" name="tempat_lahir" value="<?php echo $tempat_lahir; ?>" required>

                <label for="tanggal_lahir">Tanggal Lahir:</label>
                <input type="date" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>" required>

                <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

                <button type="submit">Update Profile</button>
            </form>
        </div>
    </div>
</body>
</html>

