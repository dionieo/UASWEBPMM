<?php
    session_start();
    if (!isset($_SESSION['LOGIN'])){
        header("Location: login.php");
        exit;
    }
    
    require 'functions.php';

    if(isset($_POST["submit"])){
        if( addData($_POST) > 0){
            echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal ditambahkan!');
                document.location.href = 'index.php';
            </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add new data</title>
    </head>
    <body>
        
    <h1>Add new data</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nama_mahasiswa">Nama mahasiswa: </label>
                <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" required>
            </li>
            <li>
                <label for="nrp">NRP: </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="tanggal_lahir">Tanggal lahir: </label>
                <input type="text" name="tanggal_lahir" id="tanggal_lahir" required>
            </li>
            <li>
                <label for="jenis_kelamin">Jenis kelamin: </label>
                <input type="text" name="jenis_kelamin" id="jenis_kelamin" required>
            </li>
            <li>
                <label for="agama">Agama: </label>
                <input type="text" name="agama" id="agama" required>
            </li>
            <li>
                <label for="alamat">Alamat: </label>
                <input type="text" name="alamat" id="alamat" required>
            </li>
            <li>
                <label for="gambar">Gambar: </label>
                <input type="file" name="gambar" id="gambar">
            </li>
            <li><button type="submit" name="submit">Add data!</button></li>
        </ul>
    </form>

    </body>
</html>