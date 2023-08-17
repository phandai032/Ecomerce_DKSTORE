<?php
    include_once '../style/style.php';
    $st = new app();
    $ID_SP = $_REQUEST['IP'];
    $st->exportReview("SELECT sp.ID_SP as CodeSP, CONCAT(nd.HoDem,nd.Ten) as hoten,ctdg.NoiDung as noidung,ctdg.ThoiGian as ThoiGian, ctdg.DanhGia as danhgia FROM `chitietdanhgia` ctdg join nguoidung nd on ctdg.ID_ND=nd.ID_ND join sanpham sp on ctdg.ID_SP = sp.ID_SP WHERE ctdg.ID_SP=$ID_SP");
?>
