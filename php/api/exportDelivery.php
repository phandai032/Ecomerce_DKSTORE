<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['id'])){
        $iddh =$_REQUEST['id'];
        $st->exportDelivery("SELECT ctgh.ID_DH as madh, ctgh.ThoiGianGiao as time, ctgh.TongTienNhan as total, ctgh.Anh1 as anh1, ctgh.Anh2 as anh2, dh.TrangThai as status FROM `chitietgiaohang` ctgh join donhang dh on ctgh.ID_DH=dh.ID_DH WHERE ctgh.ID_DH = $iddh");
    }else{
        $id=$_REQUEST['mand'];
        $status = $_REQUEST['status'];
        $st->exportDelivery("SELECT ctgh.ID_DH as madh, ctgh.ThoiGianGiao as time, ctgh.TongTienNhan as total, ctgh.Anh1 as anh1, ctgh.Anh2 as anh2, dh.TrangThai as status FROM `chitietgiaohang` ctgh join donhang dh on ctgh.ID_DH=dh.ID_DH WHERE ctgh.ID_ND = $id and ctgh.TrangThai =$status");
    }
    
   
?>