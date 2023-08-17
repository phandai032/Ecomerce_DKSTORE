<?php
    include_once '../style/style.php';
    $st = new app();
    $user = $_REQUEST["username"];
    $st->exportCustomer("select*from nguoidung where User = '$user'");
?>