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
                $read->event1('http://localhostphp/api/exportEvent.php?id='.$id.'');
                break;
            }
            case 'add':
                {
                    $read->event2();
                    break;
                }
            case 'Cancel':
            {
                echo'<script>history.go(-2); </script>';
                break;
            }
            
        }
        if($_POST['btn']=='add_new'){
            $title = $_POST['title'];
            $code = $_POST['code'];
            $noidung1 = $_POST['noidung1'];
            $noidung2 = $_POST['noidung2'];
            $noidung3 = $_POST['noidung3'];
            $filename = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];  
            $filename1 = $_FILES["file1"]["name"];
            $tempname1 = $_FILES["file1"]["tmp_name"];  
            $folder = "../images/event/".$filename;
            $folder1 = "../images/event/".$filename1;
            if($filename !=''&&$noidung3 !=''&&$noidung2 !=''&&$noidung1 !=''&&$code !=''&&$title !=''){
                move_uploaded_file($tempname, $folder);
                move_uploaded_file($tempname1, $folder1);
                $k = $p->exportNumOrder('SELECT ID_Voucher as ID_DH FROM voucher where code = "'.$code.'"');
                $p->Interactive('INSERT INTO `blog` ( `tieude`, `date`, `noidung1`, `noidung2`, `noidung3`, `anh1`, `anh2`, `anh3`,TrangThai, `ID_loai`, `ID_Voucher`) VALUES ("'.$title.'",DATE(NOW()),"'.$noidung1.'","'.$noidung2.'","'.$noidung3.'","'.$filename.'","'.$filename1.'","",1,"1","'.$k.'")');
                echo'<script>alert("Tạo sự kiện thành công");history.go(-2); </script>';
            }else{
                echo'<script>alert("Hãy kiểm tra lại thông tin sự kiện");history.go(-2); </script>';
            }
           

        }else if($_POST['btn']=='edit'){
            $id = $_SESSION['id'];
            $read->event3('http://localhostphp/api/exportEvent.php?id='.$id.'');
        }else if($_POST['btn']=='update'){
            $id = $_SESSION['id'];
            $title = $_POST['title'];
            $code = $_POST['code'];
            $noidung1 = $_POST['noidung1'];
            $noidung2 = $_POST['noidung2'];
            $noidung3 = $_POST['noidung3'];
            $filename = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];  
            $filename1 = $_FILES["file1"]["name"];
            $tempname1 = $_FILES["file1"]["tmp_name"];  
            $folder = "../images/event/".$filename;
            $folder1 = "../images/event/".$filename1;
            if($noidung3 !=''&&$noidung2 !=''&&$noidung1 !=''&&$code !=''&&$title !=''){
                move_uploaded_file($tempname, $folder);
                move_uploaded_file($tempname1, $folder1);
                $k = $p->exportNumOrder('SELECT ID_Voucher as ID_DH FROM voucher where code = "'.$code.'"');;
                if($filename !='' && $filename1 != ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `anh1` = "'.$filename.'", `anh2` = "'.$filename1.'", `ID_Voucher` = "'.$k.'" where ID_BV = '.$id.'');
                }else if($filename =='' && $filename1 != ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `anh2` = "'.$filename1.'", `ID_Voucher` = "'.$k.'" where ID_BV = '.$id.'');
                }else if($filename !='' && $filename1 == ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `anh1` = "'.$filename.'", `ID_Voucher` = "'.$k.'" where ID_BV = '.$id.'');
                }else if($filename =='' && $filename1 == ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `ID_Voucher` = "'.$k.'" where ID_BV = '.$id.'');
                }
                echo'<script>alert("Cập nhật sự kiện thành công");history.go(-2); </script>';
            }else{
                echo'<script>alert("Hãy kiểm tra lại thông tin sự kiện");history.go(-2); </script>';
            }
        }else if($_POST['btn']=='public'){
            $id = $_SESSION['id'];
            $p->Interactive('update `blog` set TrangThai = 1 where ID_BV = '.$id.'');
            echo'<script>alert("Công khai sự kiện thành công");history.go(-2); </script>';
        }else if($_POST['btn']=='private'){
            $id = $_SESSION['id'];
            $p->Interactive('update `blog` set TrangThai = 0 where ID_BV = '.$id.'');
            echo'<script>alert("Ẩn sự kiện thành công");history.go(-2); </script>';
        }
    }else{
        $read->readEvent('http://localhostphp/api/exportEvent.php?loai=1');
        
    }
    
?>