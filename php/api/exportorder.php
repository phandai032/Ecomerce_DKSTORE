<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['mand'])){
        $mand =$_REQUEST['mand'];
        if(isset($_REQUEST['dh'])){
            $dh=$_REQUEST['dh'];
            if($dh ==0){
                $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND = '.$mand.' ');
            }else if($_REQUEST['dh']==1){
                $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND = '.$mand.' and dh.TrangThai = 2 or dh.TrangThai = 1');
            }else if($_REQUEST['dh']==2){
                $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND = '.$mand.' and ( dh.TrangThai = 3 or dh.TrangThai = 4 or dh.TrangThai = 5 )');
            }else if($_REQUEST['dh']==3){
                $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND = '.$mand.' and dh.TrangThai = 6');
            }else if($_REQUEST['dh']==4){
                $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND = '.$mand.' and dh.TrangThai = 8');
            }
        }else{
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND = '.$mand.'');
        }
        
        
    }else{
        if($_REQUEST['dh']==1){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where (dh.TrangThai = 1 or dh.TrangThai = 2 ) and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==2){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.TrangThai = 8 and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==3){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==4){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.TrangThai = 3 and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==5){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.TrangThai = 4 and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==6){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.TrangThai = 5 and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==7){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.TrangThai = 6 and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }else if($_REQUEST['dh']==8){
            $st->exportOrder('select dh.TrangThai as TrangThai, dh.ID_DH as ID_DH,nd.HoDem as HoDem,nd.Ten as Ten,dh.NgayLap as NgayLap,dh.TongDon as TongDon,dh.SoDienThoai as SoDienThoai,dh.HinhThucThanhToan as HinhThucThanhToan,dh.ID_ND as ID_ND from donhang dh join nguoidung nd on nd.ID_ND=dh.ID_ND where dh.TrangThai = 7 and dh.ID_ND != ANY(SELECT ID_ND from nguoidung where PhanQuyen = 3)');
        }
    }
?>