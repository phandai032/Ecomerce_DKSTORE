<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['dh'])){
        $dh = $_REQUEST['dh'];
        $st->exportStock("SELECT ctk.ID_CT as MaVT, ct.TenKhu as TenKhu,ct.TenTang as Tang, ct.TenViTri as ViTri,sp.TenSanPham as TenSanPham,CONCAT(ch.Ram,'-', ch.Rom,'-',m.TenMau) as ChiTiet,sp.NhaCungCap as NhaPhatHanh, ctsp.SoLuong as SoLuong,ctsp.ID_CTSP as MaSP from chitietkho ctk join cautruc ct on ctk.ID_CT=ct.ID_CT join chitietsanpham ctsp on ctsp.ID_CTSP=ctk.ID_CTSP join kho k on k.ID_KHO=ct.ID_KHO join sanpham sp on sp.ID_SP=ctsp.ID_SP join cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh join mau m on m.ID_Mau = ctsp.ID_Mau WHERE ctsp.ID_CTSP = ANY(select ID_CTSP from donhang dh JOIN chitietdonhang ctdh on dh.ID_DH=ctdh.ID_DH WHERE dh.ID_DH =  $dh )");
    }else{
        if(isset($_REQUEST['filter'])){
            $ft=$_REQUEST['filter'];
            $st->exportStock("SELECT ctk.ID_CT as MaVT,sp.NhaCungCap as cungcap,sp.NamPhatHanh as nam,ctsp.Gia as Gia,ctsp.Anh as anh, ct.TenKhu as TenKhu,ct.TenTang as Tang, ct.TenViTri as ViTri,sp.TenSanPham as TenSanPham,CONCAT(ch.Ram,'-', ch.Rom,'-',m.TenMau) as ChiTiet,sp.NhaCungCap as NhaPhatHanh, ctsp.SoLuong as SoLuong,ctsp.ID_CTSP as MaSP from chitietkho ctk join cautruc ct on ctk.ID_CT=ct.ID_CT join chitietsanpham ctsp on ctsp.ID_CTSP=ctk.ID_CTSP join kho k on k.ID_KHO=ct.ID_KHO join sanpham sp on sp.ID_SP=ctsp.ID_SP join cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh join mau m on m.ID_Mau = ctsp.ID_Mau where sp.ID_Loai= $ft ORDER BY `MaVT` ASC");
        }else{
            $st->exportStock("SELECT ctk.ID_CT as MaVT,sp.NhaCungCap as cungcap,sp.NamPhatHanh as nam,ctsp.Gia as Gia,ctsp.Anh as anh, ct.TenKhu as TenKhu,ct.TenTang as Tang, ct.TenViTri as ViTri,sp.TenSanPham as TenSanPham,CONCAT(ch.Ram,'-', ch.Rom,'-',m.TenMau) as ChiTiet,sp.NhaCungCap as NhaPhatHanh, ctsp.SoLuong as SoLuong,ctsp.ID_CTSP as MaSP from chitietkho ctk join cautruc ct on ctk.ID_CT=ct.ID_CT join chitietsanpham ctsp on ctsp.ID_CTSP=ctk.ID_CTSP join kho k on k.ID_KHO=ct.ID_KHO join sanpham sp on sp.ID_SP=ctsp.ID_SP join cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh join mau m on m.ID_Mau = ctsp.ID_Mau ORDER BY `MaVT` ASC");
        }
    }

?>