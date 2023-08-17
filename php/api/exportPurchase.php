<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $st->exportPurchase("SELECT * FROM `donmuahang` WHERE TrangThai = '$id' ORDER BY Date");
    }else{
        $st->exportPurchase('SELECT * FROM `donmuahang` ORDER BY Date' );
    }
    
?>