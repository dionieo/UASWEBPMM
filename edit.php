<?php
    session_start();
    if (!isset($_SESSION['LOGIN'])){
        header("Location: login.php");
        exit;
    }
    
    require 'functions.php';

    $id = $_GET["id"];

    $twice = query("SELECT * FROM twice WHERE id = $id")[0];

    if(isset($_POST["submit"])){

        if( editData($_POST) > 0){
            echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'index.php';
            </script>";
        } else {
            echo "<script>
                alert('Data gagal diubah!');
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
    
<h1>Edit data</h1>

<form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $twice["id"]; ?>">
    <input type="hidden" name="oldPic" value="<?= $twice["gambar"]; ?>">
    <ul>
        <li>
            <label for="nama_mahasiswa">Nama mahasiswa: </label>
            <input type="text" name="nama_mahasiswa" id="nama_mahasiswa" value="<?= $twice["nama_mahasiswa"]; ?>">
        </li>

        <li>
            <label for="nrp">NRP: </label>
            <input type="text" name="nrp" id="nrp" value="<?= $twice["nrp"]; ?>">
        </li>

        <li>
            <label for="tanggal_lahir">Tanggal lahir: </label>
            <input type="text" name="tanggal_lahir" id="tanggal_lahir" value="<?= $twice["tanggal_lahir"]; ?>">
        </li>

        <li>
            <label for="jenis_kelamin">Jenis kelamin: </label>
            <input type="text" name="jenis_kelamin" id="jenis_kelamin" value="<?= $twice["jenis_kelamin"]; ?>">
        </li>

        <li>
            <label for="agama">Agama: </label>
            <input type="text" name="agama" id="agama" value="<?= $twice["agama"]; ?>">
        </li>

        <li>
            <label for="alamat">Alamat: </label>
            <input type="text" name="alamat" id="alamat" value="<?= $twice["alamat"]; ?>">
        </li>

        <li>
            <label for="gambar">Gambar: </label> <br>
            <img src="img/<?= $twice['gambar']?>" alt="" width="10%">
            <input type="file" name="gambar" id="gambar">
        </li>

        <li><button type="submit" name="submit">Edit data</button></li>
    
    </ul>
</form>

</body>
</html>