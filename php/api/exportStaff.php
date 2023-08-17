<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        $st->exportStaff("SELECT * FROM nguoidung nd join nhanvien nv on nv.ID_ND=nd.ID_ND where nv.ID_NV = $id");
    }else{
        $st->exportStaff("SELECT * FROM nguoidung nd join nhanvien nv on nv.ID_ND=nd.ID_ND");
    }
?>