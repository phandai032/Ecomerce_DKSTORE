<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['IP'])){
        $id=$_REQUEST['IP'];
        $st->exportColor("select ctsp.ID_MAU as ID_MAU,m.TenMau as TenMau from chitietsanpham ctsp join mau m on m.ID_MAU=ctsp.ID_MAU where ctsp.ID_SP='$id' group by ID_Mau");
    }else{
        $st->exportColor("select ID_MAU as ID_MAU,TenMau as TenMau from mau");
    }
    

?>