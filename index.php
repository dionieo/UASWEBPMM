<?php
    session_start();
    if (!isset($_SESSION['LOGIN'])){
        header("Location: login.php");
        exit;
    }

    require 'functions.php';
    $toodoong = query("SELECT * FROM twice");
    if(isset($_POST["findbutton"])){
        $toodoong = findData($_POST["find"]);
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Mahasiswa</title>
    </head>
    <body>
        <a href="logout.php"><button>Logout</button></a>
        <h1>Data Mahasiswa</h1>
        <a href="add.php">Add new data</a>
        <br><br>
        <!-- <form action="" method="post" style="width: 100vw;">
            <input type="text" name="find" autofocus placeholder="type to search..." autocomplete="off" size="169">
            <button type="submit" name="findbutton">Search</button>
        </form> -->
        <form action="" method="POST" style="width: 100vw;">
                <select name="collumn">
                    <option value="nama_mahasiswa">Nama mahasiswa</option>
                    <option value="nrp">NRP</option>
                    <option value="tanggal_lahir">Tanggal lahir</option>
                    <option value="jenis_kelamin">Jenis kelamin</option>
                    <option value="agama">Agama</option>
                </select>
                <input type ="text"  name="find" autofocus placeholder="type to search..." autocomplete="off" size="169">
                <button type="submit" name="findbutton">Search</button>
            </form>
        <br>
        <table border="1" cellpadding="10" cellspacing="0" style="table-layout: fixed;">
            <tr>
                <th>No.</th>
                <th>Change</th>
                <th>Picture</th>
                <th>Nama Mahasiswa</th>
                <th>NRP</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
            </tr>
            <?php $i=1; ?>
            <?php foreach($toodoong as $row) : ?>
            <?php $stage_name = $row["stage_name"] ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row["id"]; ?>">Edit</a> | <a href="delete.php?id=<?= $row["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data dengan nama <?= $stage_name ?>?')">Hapus</a>
                </td>
                <td>
                    <img src="img/<?= $row["gambar"] ?> " alt="" width="90px">
                </td>
                <td>
                    <?= $row["nama_mahasiswa"] ?>
                </td>
                <td>
                    <?= $row["nrp"] ?>
                </td>
                <td>
                    <?= $row["tanggal_lahir"] ?>
                </td>
                <td>
                    <?= $row["jenis_kelamin"] ?>
                </td>
                <td>
                    <?= $row["agama"] ?></a>
                </td>
                <td>
                    <?= $row["alamat"] ?></a>
                </td>
            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </body>
</html>