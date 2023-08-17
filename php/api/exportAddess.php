<?php
    include_once '../style/style.php';
    $st = new app();
    $user = $_REQUEST['user'];
    $st->exportAddress("SELECT * FROM `diachigiaohang` WHERE ID_ND = $user");
?>
