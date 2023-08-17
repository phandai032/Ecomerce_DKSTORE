<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['id'])){
        $id=$_REQUEST['id'];
        if(isset($_REQUEST['sta'])){
            $loai = $_REQUEST['sta'];
            $st->exportEvent('SELECT ID_BV,TrangThai,tieude,date,noidung1,noidung2,noidung3,anh1,anh2,anh3,bl.ID_loai as ID_loai,bl.ID_Voucher as ID_Voucher FROM `blog` bl where bl.ID_BV = '.$id.' and bl.ID_loai = 2');
        }else{
            $st->exportEvent("SELECT ID_BV,TrangThai,tieude,date,noidung1,noidung2,noidung3,anh1,anh2,anh3,bl.ID_loai as ID_loai,bl.ID_Voucher as ID_Voucher,vc.code as MaVocher FROM `blog` bl JOIN voucher vc on vc.ID_Voucher=bl.ID_Voucher where bl.ID_BV = $id");
        }
    }else{
        if(isset($_REQUEST['loai'])){
            $loai = $_REQUEST['loai'];
            $st->exportEvent('SELECT ID_BV,TrangThai,tieude,date,noidung1,noidung2,noidung3,anh1,anh2,anh3,bl.ID_loai as ID_loai,bl.ID_Voucher as ID_Voucher FROM `blog` bl where bl.ID_loai = '.$loai.'');
        }else{
        
            $st->exportEvent('SELECT ID_BV,TrangThai,tieude,date,noidung1,noidung2,noidung3,anh1,anh2,anh3,bl.ID_loai as ID_loai,bl.ID_Voucher as ID_Voucher,vc.code as MaVocher FROM `blog` bl JOIN voucher vc on vc.ID_Voucher=bl.ID_Voucher where bl.TrangThai=1');
        }
    }
    
?>