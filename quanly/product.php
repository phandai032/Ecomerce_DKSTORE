<?php
    session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
    if(isset($_REQUEST['btn'])){
        switch ($_REQUEST['btn']) {
            case 'view':
            {
                $id = $_REQUEST['id'];
                $_SESSION['id']=$id;
                $read->readProduct_Loai_QL('http://localhostphp/api/exportProducts.php?id='.$id.'');
                break;
            }
            case 'detail':
            {
                $id = $_REQUEST['id'];
                $_SESSION['idct']=$id;
                $read->readProduct_Detail_QL('http://localhostphp/api/exportProductsDetail.php?id='.$id.'');
                break;
            }
            case 'Cancel':
            {
                echo'<script>history.go(-2); </script>';
                break;
            }
            
        }
    }else{
        if(isset($_REQUEST['button'])){
            switch ($_REQUEST['button']) {
                case 'add':
                {
                    $read->readproduct1();
                    break;
                }
                
                case 'edit':
                {
                    $id=$_SESSION['idct'];
                    $read->readProduct4('http://localhostphp/api/exportProductsDetail.php?id='.$id.'');
                    break;
                }
                case 'add_ver':
                {
                    $id = $_SESSION['id'];
                    $read->readProduct3('http://localhostphp/api/exportSP.php?id='.$id.'');
                    break;
                }
            }
            if($_POST['button']=='add_product'){
                $name = $_POST['name'];
                $year = $_POST['year'];
                $sup = $_POST['sup'];
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];  
                $folder = "../images/".$filename;
                if($name!=''&&$year!=''&& $sup !=''&& $filename != '' && $tempname !=''){
                    move_uploaded_file($tempname, $folder);
                    $k = $p->exportNumOrder('SELECT MAX(ID_SP)+1 as ID_DH FROM sanpham');
                    $p->Interactive('ALTER TABLE sanpham AUTO_INCREMENT = '.$k.'');
                    $p->Interactive('INSERT INTO `sanpham` (`ID_SP`, `TenSanPham`, `NhaCungCap`, `NamPhatHanh`, `anh`, `ID_Loai`) VALUES (NULL, "'.$name.'", "'.$sup.'", "'.$year.'",  "'.$filename.'", (select ID_Loai from loaisp where TenLoai = "'.$sup.'"))');
                    echo'<script>alert("Thêm sản phẩm '.$name .' thành công");history.go(-2); </script>';
                }else{
                 	echo'<script>alert("Hãy kiểm tra lại thông tin sản phẩm");history.go(-1); </script>';
                }
            }else if($_POST['button']=='add_new_ver'){
                $id = $_POST['id'];
                $gia = $_POST['gia'];
                $mau = $_POST['mau'];
                $scr = $_POST['scr'];
                $chip = $_POST['chip'];
                $ram = $_POST['ram'];
                $cau = $_POST['cau'];
                $rom = $_POST['rom'];
                $sup = $_POST['sup'];
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];  
                $folder = "../images/".$filename;
                if($scr !=''&&$mau !=''&&$gia!=''){
                    move_uploaded_file($tempname, $folder);
                    $k = $p->checkUser('select * from mau where TenMau = "'.$mau.'"');
                    if($k ==0){
                        $p->Interactive('INSERT INTO `mau` (`ID_Mau`, `TenMau`) VALUES (NULL, "'.$mau.'")');
                    }
                    $l = $p->checkUser('SELECT * FROM `cauhinh` WHERE Ram = "'.$ram.'" and Rom = "'.$rom.'" AND Chip = "'.$chip.'" AND ManHinh = "'.$scr.'" AND ThietKe = "'.$cau.'" ');
                    if($l == 0){
                        $p->Interactive('INSERT INTO `cauhinh` (`ID_CauHinh`, `Ram`, `Rom`, `Chip`, `ManHinh`, `ThietKe`) VALUES (NULL, "'.$ram.'", "'.$rom.'","'.$chip.'","'.$scr.'","'.$cau.'")');
                    }
                    $m = $p->exportNumOrder('SELECT MAX(ID_CTSP)+1 as ID_DH FROM chitietsanpham');
                    $p->Interactive('ALTER TABLE chitietsanpham AUTO_INCREMENT = '.$m.'');
                    $p->Interactive('INSERT INTO `chitietsanpham` (`ID_CTSP`, `ID_SP`, `ID_CauHinh`, `ID_Mau`, `Gia`, `SoLuong`, `Anh`, `MoTa`, `ID_DanhGia`) VALUES (NULL, "'.$id.'",(SELECT ID_CauHinh FROM `cauhinh` WHERE Ram = "'.$ram.'" and Rom = "'.$rom.'" AND Chip = "'.$chip.'" AND ManHinh = "'.$scr.'" AND ThietKe = "'.$cau.'" ),(select MAX(ID_Mau) as ID_Mau from mau where TenMau = "'.$mau.'"),"'.$gia.'",0,"'.$filename.'",1,1)');
                    echo'<script>alert("Thêm phiên bản thành công");history.go(-2); </script>';
                }else{
                    echo'<script>alert("Hãy kiểm tra lại thông tin sản phẩm");history.go(-1); </script>';
                }
            }else if($_POST['button']=='save'){
                $id = $_POST['id'];
                $gia = $_POST['gia'];
                $mau = $_POST['mau'];
                $scr = $_POST['scr'];
                $chip = $_POST['chip'];
                $ram = $_POST['ram'];
                $rom = $_POST['rom'];
                $sup = $_POST['sup'];
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];  
                $folder = "../images/".$filename;
                if($id !=''&&$sup !=''&&$rom !=''&&$ram !=''&&$chip !=''&&$scr !=''&&$mau !=''&&$gia!=''){
                    move_uploaded_file($tempname, $folder);
                    $k = $p->checkUser('select * from mau where TenMau = "'.$mau.'"');
                    if($k ==0){
                        $p->Interactive('INSERT INTO `mau` (`ID_Mau`, `TenMau`) VALUES (NULL, "'.$mau.'")');
                    }
                    $l = $p->checkUser('SELECT * FROM `cauhinh` WHERE Ram = "'.$ram.'" and Rom = "'.$rom.'" AND Chip = "'.$chip.'" AND ManHinh = "'.$scr.'" AND ThietKe = "'.$cau.'" ');
                    if($l == 0){
                        $p->Interactive('INSERT INTO `cauhinh` (`ID_CauHinh`, `Ram`, `Rom`, `Chip`, `ManHinh`, `ThietKe`) VALUES (NULL, "'.$ram.'", "'.$rom.'","'.$chip.'","'.$scr.'","'.$cau.'")');
                    }
                    if($filename ==''){
                        $p->Interactive('UPDATE `chitietsanpham` SET ID_Mau =(select ID_Mau from mau where TenMau = "'.$mau.'"), `ID_CauHinh` = (SELECT ID_CauHinh FROM `cauhinh` WHERE Ram = "'.$ram.'" and Rom = "'.$rom.'" AND Chip = "'.$chip.'" AND ManHinh = "'.$scr.'" AND ThietKe = "'.$cau.'" ), Gia = '.$gia.' WHERE `ID_CTSP` = '.$id.'');
                    }else{
                        $p->Interactive('UPDATE `chitietsanpham` SET ID_Mau =(select ID_Mau from mau where TenMau = "'.$mau.'"), `ID_CauHinh` = (SELECT ID_CauHinh FROM `cauhinh` WHERE Ram = "'.$ram.'" and Rom = "'.$rom.'" AND Chip = "'.$chip.'" AND ManHinh = "'.$scr.'" AND ThietKe = "'.$cau.'" ), Gia = '.$gia.', Anh = "'.$filename.'" WHERE `ID_CTSP` = '.$id.'');
                    }
                    
                    echo'<script>alert("Cập nhật sản phẩm thành công");history.go(-2); </script>';
                }else{
                    echo'<script>alert("Hãy kiểm tra lại thông tin sản phẩm");history.go(-1); </script>';
                }
               
            }
        }
        else{
            $read->readProduct_QL('http://localhostphp/api/exportSP.php');
        }
        
    }
    

?>