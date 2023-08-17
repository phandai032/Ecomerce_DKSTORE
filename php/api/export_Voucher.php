<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['Voucher'])){
        $voucher = $_REQUEST['Voucher'];
        $st->exportVoucher("SELECT * FROM `voucher` where MaVocher= md5('$voucher')");
    }else{
        if(isset($_REQUEST['id'])){
            $id =$_REQUEST['id'];
            $st->exportVoucher("SELECT * FROM `voucher` where Id_Voucher = $id");
        }else{
            $st->exportVoucher("SELECT * FROM `voucher`");
        }
    }
?>
