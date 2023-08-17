<?php
    include_once '../style/style.php';
    $st = new app();
    $trangthai = $_REQUEST['status'];
    if($trangthai ==1){
        $st->exportVoucher("select count(ID_DH) from donhang where TrangThai = 1 or TrangThai=2");
    }else if($trangthai ==2){
        $st->exportVoucher("select count(ID_DH) from donhang where TrangThai = 8");
    }else{
        $st->exportVoucher("select count(ID_DH) from donhang");
    }
    
?>
