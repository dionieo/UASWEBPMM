<?php
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    setcookie('hasbulah', '', time()-3600);
    setcookie('koentji', '', time()-3600);

    header("Location: login.php");
    exit;
?>