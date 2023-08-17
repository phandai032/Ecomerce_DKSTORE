<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST["id"])){
        $id = $_REQUEST["id"];
        if(isset($_REQUEST['ql'])){
            $st->exportPurchaseDetail("SELECT ctdm.ID_DM,ctsp.ID_CTSP,dm.TrangThai,ctdm.SoLuong,dm.Date,sp.TenSanPham, CONCAT(ch.Ram,' / ',ch.Rom,' / ',ch.Chip,' / ',m.TenMau)as mota,dm.note ,ctsp.Gia, dm.ThuGui, dm.ThuNhan FROM chitietdonmua ctdm JOIN chitietsanpham ctsp ON ctdm.ID_CTSP=ctsp.ID_CTSP join donmuahang dm on dm.ID_DM=ctdm.ID_DM JOIN sanpham sp on sp.ID_SP=ctsp.ID_SP join cauhinh ch on ch.ID_CauHinh = ctsp.ID_CauHinh join mau m on m.ID_Mau=ctsp.ID_Mau   where ctdm.ID_DM = $id");
        }else{
            $st->exportPurchaseDetail("SELECT ctdm.ID_DM,ctsp.ID_CTSP,ct.TenKhu as TenKhu,ct.TenTang as Tang, ct.TenViTri as ViTri,dm.TrangThai,ctdm.SoLuong,dm.Date,sp.TenSanPham, CONCAT(ch.Ram,' / ',ch.Rom,' / ',ch.Chip,' / ',m.TenMau)as mota,dm.note ,ctsp.Gia, dm.ThuGui, dm.ThuNhan FROM chitietdonmua ctdm JOIN chitietsanpham ctsp ON ctdm.ID_CTSP=ctsp.ID_CTSP join donmuahang dm on dm.ID_DM=ctdm.ID_DM JOIN sanpham sp on sp.ID_SP=ctsp.ID_SP join cauhinh ch on ch.ID_CauHinh = ctsp.ID_CauHinh join mau m on m.ID_Mau=ctsp.ID_Mau JOIN chitietkho ctk on ctk.ID_CTSP = ctsp.ID_CTSP join cautruc ct on ct.ID_CT = ctk.ID_CT JOIN kho k on k.ID_KHO=ct.ID_KHO where ctdm.ID_DM = $id");
        }
    }
?>