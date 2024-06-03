<?php
    session_start();
    require 'functions.php';

    if(isset($_COOKIE['hasbulah']) && isset($_COOKIE['koentji'])){
        $id = $_COOKIE['hasbulah'];
        $username = $_COOKIE['koentji'];
        $result = mysqli_query($connect, "SELECT * FROM users WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
        if($username === hash('sha256', $row['username'])){
            $_SESSION['LOGIN'] = true;
        }
    }

    if(isset($_SESSION['LOGIN'])){
        header("Location: index.php");
    }
    if (isset($_POST['login'])){
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $result = mysqli_query($connect, "SELECT * FROM users WHERE username = '$username'");
        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($pass, $row['password'])){
                $_SESSION['LOGIN'] = true;
                if(isset($_POST['remember'])){
                    setcookie('hasbulah', $row['id'], time()+60);
                    setcookie('koentji', hash('sha256', $row['username']), time()+60);
                }
                header("Location: index.php");
                exit;
            }
        }
        $error = true;
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <title>Login</title>
        <script src="loginCheck.js"></script>
    </head>
    <body style="background-color: #1a1a1a;">
        <div class="container d-flex position-absolute top-50 start-50 translate-middle p-5 bg-light rounded-3 bg-opacity-50 w-25 flex-column">
            <h1>Login</h1>
            <form action="" method="POST" name="loginForm" class="d-flex flex-column" onsubmit="return formCheck()">
                    <div class="form-group mb-3">
                        <label class="form-label" for="username">Username : </label>
                        <input type="text" name="username" id="username" class="form-control bg-dark text-light">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="pass">Password : </label>
                        <input type="password" name="pass" id="pass" class="form-control bg-dark text-light">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="remember">Ingat saya</label>
                        <input type="checkbox" name="remember" id="remember">
                    </div>
                    <button type="submit" name="login" class="btn btn-success w-100 mb-3">Login</button>
                    <p>Belum punya akun? <a href="registration.php" style="text-decoration: none;">Daftar di sini</a></p>
            </form>
        </div>
    </body>
</html>