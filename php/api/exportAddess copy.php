<?php
    include_once '../style/style.php';
    $st = new app();
    $user = $_REQUEST['user'];
    $st->exportAddress("SELECT * FROM `diachiPriceohang` WHERE ID_ND = $user");
?>
