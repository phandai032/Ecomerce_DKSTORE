<?php
    include_once '../style/style.php';
    $st = new app();
    
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $st->exportProDucts("SELECT *,anh as AnhChinh FROM sanpham where ID_SP = $id");
    }else{
        $st->exportProDucts("SELECT *,anh as AnhChinh FROM sanpham");
    }
?>