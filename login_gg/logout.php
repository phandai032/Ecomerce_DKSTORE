<?php
    session_start();
    unset($_SESSION['current_user']);
    unset($_SESSION['access_token']);
    unset($_SESSION['maND']);
    unset($_SESSION["phanquyen"]);
    echo '<script>window.location.replace("http://localhostindex.php");</script>';
?>