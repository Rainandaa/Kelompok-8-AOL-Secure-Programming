<?php
    session_start();
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8LDJ5l6b5A/k15QL4LeODKuZ8DBWr3FAxCz4PIyF6sdMz8D2+xsk+tgkR6N" crossorigin="anonymous"></script>
</head>

<body class="hack dark">
    <?php
        if(isset($_SESSION['error_message'])) {
            $error_message = $_SESSION['error_message'];

            echo "<div class='alert alert-danger'>$error_message</div>";

            unset($_SESSION['error_message']);
        }
    ?>
    <!-- Alert Error -->

    <div class="grid main-form">
        <form action="controllers/AuthController.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
            <fieldset class="form-group form-success">
                <label for="username">USERNAME</label>
                <input id="username" name="username" type="text" placeholder="" class="form-control">
            </fieldset>
            <fieldset class="form-group form-success">
                <label for="password">PASSWORD</label>
                <input id="password" name="password" type="password" placeholder="" class="form-control">
            </fieldset>
            <br>
            <div>
                <button class="btn btn-primary btn-block btn-ghost" name="login" value="Login">Login</button>
                <div class="help-block">Only noble users are allowed to bypass access here</div>
            </div>
        </form>
    </div>

    <div class="register-link">
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
    
    <div class="footer">
        Valar Morghulis, ....
    </div>
</body>

</html>
