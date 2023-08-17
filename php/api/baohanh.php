<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['imei'])){
        $st->exportBaoHanh('select bh.ID_BHDT,bh.ID_CTSP,sp.TenSanPham,m.TenMau,ch.Ram,ch.Rom,ch.Chip,bh.NgayMua,bh.NgayHetHan,bh.CodeMay,bh.Phone,bh.GhiChu,bh.Hash from baohanh bh join chitietsanpham ctsp on bh.ID_CTSP=ctsp.ID_CTSP join sanpham sp ON ctsp.ID_SP = sp.ID_SP JOIN mau m on m.ID_Mau = ctsp.ID_Mau JOIN cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh where CodeMay = "'.$_REQUEST['imei'].'"');
    }else if(isset($_REQUEST['hash'])){
        $st->exportBaoHanh('select bh.ID_BHDT,bh.ID_CTSP,sp.TenSanPham,m.TenMau,ch.Ram,ch.Rom,ch.Chip,bh.NgayMua,bh.NgayHetHan,bh.CodeMay,bh.Phone,bh.GhiChu,bh.Hash from baohanh bh join chitietsanpham ctsp on bh.ID_CTSP=ctsp.ID_CTSP join sanpham sp ON ctsp.ID_SP = sp.ID_SP JOIN mau m on m.ID_Mau = ctsp.ID_Mau JOIN cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh where Hash = "'.$_REQUEST['hash'].'"');
    }
    
?>
