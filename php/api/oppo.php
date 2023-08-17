<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST["TenSanPham"]))
    {
        $timkiem = $_REQUEST["TenSanPham"];
        $st->exportProDucts("select ctsp.ID_SP as ID_SP,ctsp.Gia as Gia,ctsp.Anh as Anh,ctsp.SoLuong as SoLuong,cah.ThietKe as ThietKe,sp.TenSanPham as TenSanPham,sp.NhaCungCap as NhaCungCap,sp.NamPhatHanh as NamPhatHanh,sp.ID_Loai as ID_Loai, ctsp.ID_Mau as ID_Mau,ctsp.ID_CauHinh as CauHinh,cah.Ram as Ram,cah.Rom as Rom,cah.Chip as Chip ,cah.ManHinh as ManHinh,ma.TenMau as TenMau from chitietsanpham ctsp join sanpham sp on ctsp.ID_SP = sp.ID_SP join mau ma on ma.ID_Mau = ctsp.ID_Mau join CauHinh cah on cah.ID_CauHinh = ctsp.ID_CauHinh where sp.ID_Loai = 3 && sp.TenSanPham LIKE '%$timkiem%'");
    }else{
        $st->exportProDucts("select ctsp.ID_SP as ID_SP,ctsp.Gia as Gia,ctsp.Anh as Anh,ctsp.SoLuong as SoLuong,cah.ThietKe as ThietKe,sp.TenSanPham as TenSanPham,sp.NhaCungCap as NhaCungCap,sp.NamPhatHanh as NamPhatHanh,sp.ID_Loai as ID_Loai, ctsp.ID_Mau as ID_Mau,ctsp.ID_CauHinh as CauHinh,cah.Ram as Ram,cah.Rom as Rom,cah.Chip as Chip ,cah.ManHinh as ManHinh,ma.TenMau as TenMau from chitietsanpham ctsp join sanpham sp on ctsp.ID_SP = sp.ID_SP join mau ma on ma.ID_Mau = ctsp.ID_Mau join CauHinh cah on cah.ID_CauHinh = ctsp.ID_CauHinh where sp.ID_Loai = 3");
    }
?>
