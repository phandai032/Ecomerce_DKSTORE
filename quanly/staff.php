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
                $read->readStaff_Detail('http://localhostphp/api/exportStaff.php?id='.$id.'');
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
                    $read->readStaff1();
                    break;
                }
                case 'edit':
                {
                    $id=$_SESSION['id'];
                    $read->readStaff2('http://localhostphp/api/exportStaff.php?id='.$id.'');
                    break;
                }
                case 'Cancel':
                {
                    echo'<script>history.go(-2); </script>';
                    break;
                }
            }
            if($_POST['button']=='add_new_staff'){
                $date = $_POST['date'];
                $sala = $_POST['sala'];
                $pos = $_POST['pos'];
                $add = $_POST['add'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $pass = $_POST['pass'];
                $user = $_POST['user'];
                $bdate = $_POST['bdate'];
                $lname = $_POST['lname'];
                $fname = $_POST['fname'];
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];  
                $folder = "../images/staff/".$filename;
                if($date !=''&&$sala !=''&&$pos !=''&&$add !=''&&$phone !=''&&$email !=''&&$pass !=''&&$user !=''&&$bdate !=''&&$lname!=''&&$fname!=''){
                    $k = $p->checkUser('select * from nguoidung where User = "'.$user.'"');
                    if($k == 0){
                        move_uploaded_file($tempname, $folder);
                        $m = $p->exportNumOrder('SELECT MAX(ID_ND)+1 as ID_DH FROM nguoidung');
                        $p->Interactive('ALTER TABLE nguoidung AUTO_INCREMENT = '.$m.'');
                        $p->Interactive('INSERT INTO `nguoidung` (`User`, `Pass`, `HoDem`, `Ten`, `Email`, `SoDienThoai`, `DiaChi`, `PhanQuyen`) VALUES ("'.$user.'",md5("'.$pass.'"),"'.$fname.'","'.$lname.'","'.$email.'","'.$phone.'","'.$add.'",'.$pos.');');
                        $nd = $p->exportNumOrder('SELECT ID_ND as ID_DH FROM nguoidung where User = "'.$user.'"');
                        $p->Interactive('INSERT INTO `nhanvien` (`ID_NV`, `ThoiGianBD`, `HinhDaiDien`, `Luong`, `NamSinh`, `ID_ND`) VALUES (NULL, "'.$date.'","'.$filename.'", "'.$sala.'", "'.$bdate.'",'.$nd.')');
                        echo'<script>alert("Tạo nhân viên thành công");history.go(-2); </script>';
                    }else{
                        echo'<script>alert("Người dùng đã tồn tại");history.go(-2); </script>';
                    }
                    
                }else{
                    echo'<script>alert("Hãy kiểm tra lại thông tin nhân viên");history.go(-1); </script>';
                }
            }else if($_POST['button']=='save'){
                $id = $_POST['id'];
                $nd = $_POST['nd'];
                $date = $_POST['date'];
                $sala = $_POST['sala'];
                $pos = $_POST['pos'];
                $add = $_POST['add'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $user = $_POST['user'];
                $bdate = $_POST['bdate'];
                $filename = $_FILES["file"]["name"];
                $tempname = $_FILES["file"]["tmp_name"];  
                $folder = "../images/staff/".$filename;
                if($date !=''&&$sala !=''&&$pos !=''&&$add !=''&&$phone !=''&&$email !=''&&$user !=''&&$bdate !=''){
                    if($filename != ''){
                        move_uploaded_file($tempname, $folder);
                        $p->Interactive('update `nguoidung` set `User` = "'.$user.'", `Email` = "'.$email.'", `SoDienThoai`="'.$phone.'", `DiaChi`="'.$add.'", `PhanQuyen`='.$pos.' where ID_ND = '.$nd.';');
                        $p->Interactive('update `nhanvien` set `ThoiGianBD` ="'.$date.'", `HinhDaiDien`= "'.$filename.'", `Luong`="'.$sala.'", `NamSinh`= "'.$bdate.'" where ID_NV='.$id.'');
                    }else{
                        $p->Interactive('update `nguoidung` set `User` = "'.$user.'", `Email` = "'.$email.'", `SoDienThoai`="'.$phone.'", `DiaChi`="'.$add.'", `PhanQuyen`='.$pos.' where ID_ND = '.$nd.';');
                        $p->Interactive('update `nhanvien` set `ThoiGianBD` ="'.$date.'", `Luong`="'.$sala.'", `NamSinh`= "'.$bdate.'" where ID_NV='.$id.'');
                    }
                    echo'<script>alert("Cập nhật thông tin nhân viên thành công");history.go(-2); </script>';
                    
                }else{
                    echo'<script>alert("Hãy kiểm tra lại thông tin nhân viên");history.go(-1); </script>';
                }
            }
        }
        else{
            $read->readStaff('http://localhostphp/api/exportStaff.php');
        }
        
    }


?>