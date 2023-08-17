<?php
    include_once '../style/style.php';
    $st = new app();
    $id_nd = $_REQUEST['maND'];
    $id = $_REQUEST['dh']-1;
    $dh = $id -3;
    if(isset($_REQUEST['status'])){
        $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongThu as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND,ctgh.ID_ND as ID_NV from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND join chitietgiaohang ctgh on ctgh.ID_DH = dh.ID_DH  where (dh.TrangThai = 6 or dh.TrangThai = 7 ) and ctgh.TrangThai = 3 and ctgh.ID_ND = '.$id_nd.'');
    }else{
        
        if($_REQUEST['dh']==8){
            $dh = $dh-1;
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongThu as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND,ctgh.ID_ND as ID_NV from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND join chitietgiaohang ctgh on ctgh.ID_DH = dh.ID_DH  where dh.TrangThai = '.$id.' and ctgh.TrangThai = '.$dh.' and ctgh.ID_ND = '.$id_nd.'');
        }else{
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongThu as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND,ctgh.ID_ND as ID_NV from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND join chitietgiaohang ctgh on ctgh.ID_DH = dh.ID_DH  where dh.TrangThai = '.$id.' and ctgh.TrangThai = '.$dh.' and ctgh.ID_ND = '.$id_nd.''); 
        }
    }
?>