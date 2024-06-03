<?php
    require 'functions.php';

    if(isset($_POST['register'])){
        if (registration($_POST) > 0){
            echo "<script>
                alert('Akun berhasil dibuat!');
            </script>";
            header("Location: login.php");
            exit;
        } else {
            echo mysqli_error($connect);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="passwordRegisterLogic.js"></script>
</head>
<body style="background-color: #1a1a1a;">
    <div class="container d-flex position-absolute top-50 start-50 translate-middle p-5 bg-light rounded-3 bg-opacity-50 w-25 flex-column">
        <h1>Registrasi</h1>
        <form action="" method="POST" name="registrationForm" class="d-flex flex-column" onsubmit="return formCheck()">
                <div class="form-group mb-3">
                    <label class="form-label" for="username">Username : </label>
                    <input type="text" name="username" id="username" class="form-control bg-dark text-light">
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" for="password">Password : </label>
                    <input type="password" name="password" id="password" class="form-control bg-dark text-light">
                </div>
                <div class="form-group mb-3 mb-4">
                    <label class="form-label" for="password2">Konfirmasi password : </label>
                    <input type="password" name="password2" id="password2" class="form-control bg-dark text-light">
                </div>
                <button type="submit" name="register" class="btn btn-success w-100 mb-3">Daftar</button>
                <p>Sudah punya akun? <a href="login.php" style="text-decoration: none;">Login di sini</a></p>
        </form>
    </div>
</body>
</html>