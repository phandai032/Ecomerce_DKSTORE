<?php
    include_once '../style/style.php';
    $st = new app();
    $id=$_REQUEST['IP'];
    $st->exportShipping("SELECT ID_DH, nd.HoDem, nd.Ten, dcgh.SoNha, dcgh.Phuong, dcgh.Quan,dcgh.Tinh,dcgh.SoDienThoai,dcgh.Email FROM `donhang` dh JOIN diachigiaohang dcgh on dh.ID_DCGH=dcgh.ID_DCGH JOIN nguoidung nd on nd.ID_ND=dh.ID_ND WHERE dh.ID_DH = $id");

?>