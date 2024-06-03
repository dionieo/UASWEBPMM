<?php
    session_start();
    if (!isset($_SESSION['LOGIN'])){
        header("Location: login.php");
        exit;
    }
    require 'functions.php';

    $deleteData = $_GET["id"];

    if( deleteData($deleteData) > 0){
        echo "<script>
            alert('Data berhasil diahpus!');
            document.location.href = 'index.php';
        </script>";
    } else {
        echo mysqli_error($connect);
    }

?>

