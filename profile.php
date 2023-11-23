<?php
    session_start();

    if ($_SESSION['is_login'] !== true) {
        header("Location: login.php");  
    }

    // Check if message_sent parameter is true and fetch the message from session
    if (isset($_GET['message_sent']) && $_GET['message_sent'] === 'true') {
        // Fetch the message from the session
        $message = isset($_SESSION['message']) ? $_SESSION['message'] : null;

        // Clear the message from the session to prevent displaying it multiple times
        unset($_SESSION['message']);
    }

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "AOL_SecProg";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        
        // Use prepared statement to prevent SQL injection
        $query = "SELECT messages FROM coms WHERE user_id = ?";
        $stmt = $conn->prepare($query);
    
        // Bind parameters
        $stmt->bind_param("i", $user_id);

        // Execute the query
        $stmt->execute();

        // Bind the result to the $message variable
        $stmt->bind_result($messages);

        // Fetch the message
        $stmt->fetch();

        // Close the statement
        $stmt->close();

    } else {
        // Handle the case when user_id is not set in the session
        $message = null;
    }
    
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tranqsite</title>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/hack.css">
    <link rel="stylesheet" href="assets/dark.css">
    <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
</head>

<div class="nav">
    <a class="button btn btn-success btn-ghost newq" href="profile.php">Profile</a>
    <a class="btn btn-info btn-ghost skip" href="update.php">Update Profile</a>
    <a class="button btn btn-primary btn-ghost newq" href="send.php">Send Message</a>
    <a class="btn btn-default btn-ghost skip" href="./controllers/AuthController.php?logout">Logout</a>
    <p class="welco">Welcome To Our Latest Project Mr. / Mrs. <?php echo $_SESSION['username']; ?></p>
</div>

<body class="hack dark">
    <div class="grid main-form">
        <div>
            <h1>Account</h1>
            <div class="card">
    <header class="card-headers">Temporary User's Information</header>

    <?php if (!empty($_SESSION['nama_asli']) && !empty($_SESSION['email']) && !empty($_SESSION['tempat_lahir']) && !empty($_SESSION['tanggal_lahir'])) : ?>
        <header class="card-header">Nama : <?php echo $_SESSION['nama_asli']; ?></header>
        <header class="card-header">Email : <?php echo $_SESSION['email']; ?></header>
        <header class="card-header">Tempat Lahir : <?php echo $_SESSION['tempat_lahir']; ?></header>
        <header class="card-header">Tanggal Lahir : <?php echo $_SESSION['tanggal_lahir']; ?></header>
    <?php else : ?>
        <header class="card-header">Silahkan Update Profile</header>
    <?php endif; ?>
</div>

        </div>
        <br><br>
<div>
<h1>Messages</h1>
    <div class="card">
        <header class="card-header">To: Be Loved One</header>
        <div class="card-content">
            <div class="inner">
                <?php if (!empty($message)) : ?>
                    <p>Pesan: <?php echo $query; ?></p> <!-- Corrected variable name -->
                <?php else: ?>
                    <p>Belum Ada Pesan</p>
                <?php endif; ?>
        </div>
    </div>
</div>

    <!-- <div class="alert alert-warning">No messages found.</div> -->
</body>

</html>