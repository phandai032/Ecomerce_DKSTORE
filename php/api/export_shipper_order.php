<?php
    include_once '../style/style.php';
    $st = new app();
    $id = $_REQUEST['mand'];
    $status =$_REQUEST['status'];
    $st->exportShipper("SELECT nd.HoDem, nd.Ten,SUM(ctgh.TongTienNhan) as tongtien,COUNT(ID_DH) as numorder, nd.ID_ND FROM chitietgiaohang ctgh JOIN nguoidung nd on nd.ID_ND=ctgh.ID_ND where ctgh.TrangThai=$status GROUP BY ID_ND");
?>
