<?php
    include_once '../style/style.php';
    $st = new app();
    $id = $_REQUEST['id'];
    $id_nd = $_REQUEST['nd'];
    if($id_nd!=3){
        $st->exportDetail("select dh.ID_DH,dh.TrangThai,dh.TongThu,dcgh.SoDienThoai as phone,CONCAT(dcgh.SoNha,', ',dcgh.Phuong,', ',dcgh.Quan,', ',dcgh.Tinh,'.') as address,CONCAT(nd.HoDem,' ',nd.Ten) as fullname,ctsp.ID_CTSP as id , (select m.TenMau from chitietsanpham ctsp join mau m on ctsp.ID_Mau = m.ID_Mau WHERE ID_CTSP = id) as TenMau , (select ch.Rom from chitietsanpham ctsp join cauhinh ch on ctsp.ID_CauHinh = ch.ID_CauHinh WHERE ID_CTSP = id) as Rom, (select ch.Ram from chitietsanpham ctsp join cauhinh ch on ctsp.ID_CauHinh = ch.ID_CauHinh WHERE ID_CTSP = id) as Ram,ctsp.Anh as Anh,ctdh.SoLuong as SoLuong, ctsp.Gia as Gia,dh.TongDon,dh.voucher as voucher, sp.TenSanPham as TenSanPham  from sanpham as sp join chitietsanpham as ctsp on sp.ID_SP = ctsp.ID_SP join chitietdonhang as ctdh on ctsp.ID_CTSP = ctdh.ID_CTSP join donhang as dh on dh.ID_DH = ctdh.ID_DH join nguoidung as nd on nd.ID_ND=dh.ID_ND JOIN diachigiaohang as dcgh on dh.ID_DCGH= dcgh.ID_DCGH where dh.ID_DH=$id");
    }else{
        $st->exportDetail("select dh.ID_DH,dh.TrangThai,dh.TongThu,dcgh.SoDienThoai as phone,CONCAT(dcgh.SoNha,', ',dcgh.Phuong,', ',dcgh.Quan,', ',dcgh.Tinh,'.') as address,CONCAT(nd.HoDem,' ',nd.Ten) as fullname,ctsp.ID_CTSP as id , (select m.TenMau from chitietsanpham ctsp join mau m on ctsp.ID_Mau = m.ID_Mau WHERE ID_CTSP = id) as TenMau , (select ch.Rom from chitietsanpham ctsp join cauhinh ch on ctsp.ID_CauHinh = ch.ID_CauHinh WHERE ID_CTSP = id) as Rom, (select ch.Ram from chitietsanpham ctsp join cauhinh ch on ctsp.ID_CauHinh = ch.ID_CauHinh WHERE ID_CTSP = id) as Ram,ctsp.Anh as Anh,ctdh.SoLuong as SoLuong, ctsp.Gia as Gia,dh.TongDon,dh.voucher as voucher, sp.TenSanPham as TenSanPham  from sanpham as sp join chitietsanpham as ctsp on sp.ID_SP = ctsp.ID_SP join chitietdonhang as ctdh on ctsp.ID_CTSP = ctdh.ID_CTSP join donhang as dh on dh.ID_DH = ctdh.ID_DH join nguoidung as nd on nd.ID_ND=dh.ID_ND JOIN diachigiaohang as dcgh on dh.ID_DCGH= dcgh.ID_DCGH where dh.ID_DH=$id");
    }
?>