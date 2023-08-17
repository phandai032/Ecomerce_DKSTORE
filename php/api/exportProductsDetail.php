<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST["IP"])){
        $ip = $_REQUEST["IP"];
        $st->exportProDucts("select sp.ID_SP as ID_SP,ctsp.ID_CTSP as ID_CTSP,sp.TenSanPham as TenSanPham,ctsp.Gia as Gia,ctsp.Anh as Anh,ctsp.SoLuong as SoLuong,cah.ThietKe as ThietKe,sp.NhaCungCap as NhaCungCap,sp.NamPhatHanh as NamPhatHanh,sp.ID_Loai as ID_Loai, ctsp.ID_Mau as ID_Mau,ctsp.ID_CauHinh as CauHinh,cah.Ram as Ram,cah.Rom as Rom,cah.Chip as Chip ,cah.ManHinh as ManHinh,ma.TenMau as TenMau from chitietsanpham ctsp join sanpham sp on ctsp.ID_SP = sp.ID_SP join mau ma on ma.ID_Mau = ctsp.ID_Mau join cauhinh cah on cah.ID_CauHinh = ctsp.ID_CauHinh where sp.ID_SP = $ip group by ma.ID_Mau");
    }else if(isset($_REQUEST["id"])){
        $ip = $_REQUEST["id"];
        $st->exportProDucts("select sp.ID_SP as ID_SP,ctsp.ID_CTSP as ID_CTSP,sp.TenSanPham as TenSanPham,ctsp.Gia as Gia,ctsp.Anh as Anh,ctsp.SoLuong as SoLuong,cah.ThietKe as ThietKe,sp.NhaCungCap as NhaCungCap,sp.NamPhatHanh as NamPhatHanh,sp.ID_Loai as ID_Loai, ctsp.ID_Mau as ID_Mau,ctsp.ID_CauHinh as CauHinh,cah.Ram as Ram,cah.Rom as Rom,cah.Chip as Chip ,cah.ManHinh as ManHinh,ma.TenMau as TenMau from chitietsanpham ctsp join sanpham sp on ctsp.ID_SP = sp.ID_SP join mau ma on ma.ID_Mau = ctsp.ID_Mau join cauhinh cah on cah.ID_CauHinh = ctsp.ID_CauHinh where ctsp.ID_CTSP = $ip group by ma.ID_Mau");
    }
?>