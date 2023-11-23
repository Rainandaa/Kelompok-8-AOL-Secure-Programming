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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <!-- Tambahkan script JavaScript untuk menampilkan pesan alert -->
    <script>
        // Fungsi untuk menampilkan pesan alert
        function showAlert(message) {
            alert(message);
        }

        // Fungsi untuk memvalidasi formulir sebelum pengiriman
        function validateForm() {
            var username = document.getElementById('new_username').value;

            // Validasi username sesuai dengan ketentuan
            if (!/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]{8,16}$/.test(username)) {
                showAlert("Tolong sesuaikan dengan ketentuan berikut: 1. menggunakan campuran alfabet 2. menggunakan setidaknya 1 simbol 3. menggunakan setidaknya 1 huruf kapital 4. menggunakan minimal 8-16 karakter");
                return false; // Menghentikan pengiriman formulir
            }

            return true; // Lanjutkan dengan pengiriman formulir jika valid
        }
    </script>
</head>

<body class="hack dark">
    <div class="grid main-form">
        <form action="controllers/RegisterController.php" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="csrf_token">
            <fieldset class="form-group form-success">
                <label for="new_username">NEW USERNAME</label>
                <input id="new_username" name="new_username" type="text" placeholder="" class="form-control">
            </fieldset>

            <fieldset class="form-group form-success">
                <label for="new_password">NEW PASSWORD</label>
                <input id="new_password" name="new_password" type="password" placeholder="" class="form-control">
            </fieldset>
            <br>
            <div>
                <button class="btn btn-primary btn-block btn-ghost" name="register" value="Register">Daftar</button>
            </div>
        </form>
    </div>

    <div class="footer">
        Valar Morghulis, ....
    </div>
</body>

</html>
