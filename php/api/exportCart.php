<?php
    include_once '../style/style.php';
    $st = new app();
    $id = $_REQUEST["id"];
    if(isset($id)){
        $st->exportCart('select gh.ID_ND as ID_ND,m.TenMau as mau,ch.Ram as ram,ch.Rom as rom,ch.Chip as chip, ctsp.ID_CTSP as ID_CTSP,ctsp.Anh as Anh,ctsp.Gia as Gia,sp.TenSanPham as TenSanPham,gh.SoLuong as SoLuong from chitietsanpham as ctsp join sanpham as sp on sp.ID_SP = ctsp.ID_SP join giohang as gh on ctsp.ID_CTSP = gh.ID_CTSP join mau m on ctsp.ID_mau = m.ID_Mau join cauhinh ch on ctsp.ID_CauHinh = ch.ID_CauHinh where gh.ID_ND = '.$id.'');
    }
    
?>