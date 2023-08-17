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
                echo '<input type="hidden" id="btn" value="3">';
                $read->event6('http://localhostphp/api/exportEvent.php?id='.$id.'&sta=2');
                break;
            }
            case 'add':
                {
                    $read->event4();
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
            $noidung1 = $_POST['noidung1'];
            $noidung2 = $_POST['noidung2'];
            $noidung3 = $_POST['noidung3'];
            $filename = $_FILES["file"]["name"];
            $tempname = $_FILES["file"]["tmp_name"];  
            $filename1 = $_FILES["file1"]["name"];
            $tempname1 = $_FILES["file1"]["tmp_name"];  
            $folder = "../images/event/".$filename;
            $folder1 = "../images/event/".$filename1;
            if($filename !=''&&$noidung3 !=''&&$noidung2 !=''&&$noidung1 !=''&&$title !=''){
                move_uploaded_file($tempname, $folder);
                move_uploaded_file($tempname1, $folder1);
                $p->Interactive('INSERT INTO `blog` ( `tieude`, `date`, `noidung1`, `noidung2`, `noidung3`, `anh1`, `anh2`, `anh3`,TrangThai, `ID_loai`, `ID_Voucher`) VALUES ("'.$title.'",DATE(NOW()),"'.$noidung1.'","'.$noidung2.'","'.$noidung3.'","'.$filename.'","'.$filename1.'","",0,"2","-1")');
                echo'<script>alert("Tạo tin tức thành công");history.go(-2); </script>';
            }else{
                echo'<script>alert("Kiểm tra lại thông tin tin tức ");history.go(-1); </script>';
            }
           

        }else if($_POST['btn']=='edit'){
            $id = $_SESSION['id'];
            $read->event5('http://localhostphp/api/exportEvent.php?id='.$id.'&sta=2');
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
            if($noidung3 !=''&&$noidung2 !=''&&$noidung1 !=''&&$title !=''){
                move_uploaded_file($tempname, $folder);
                move_uploaded_file($tempname1, $folder1);
                if($filename !='' && $filename1 != ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `anh1` = "'.$filename.'", `anh2` = "'.$filename1.'", `ID_Voucher` = 1 where ID_BV = '.$id.'');
                }else if($filename =='' && $filename1 != ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `anh2` = "'.$filename1.'", `ID_Voucher` = 1 where ID_BV = '.$id.'');
                }else if($filename !='' && $filename1 == ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `anh1` = "'.$filename.'", `ID_Voucher` = 1 where ID_BV = '.$id.'');
                }else if($filename =='' && $filename1 == ''){
                    $p->Interactive('update `blog` set  `tieude` = "'.$title.'" , `noidung1` = "'.$noidung1.'", `noidung2` = "'.$noidung2.'", `noidung3` = "'.$noidung3.'", `ID_Voucher` = 1 where ID_BV = '.$id.'');
                }
                echo'<script>alert("Cập nhật tin tức thành công");history.go(-2); </script>';
            }else{
                echo'<script>alert("Kiểm tra lại thông tin bài viết!!!");history.go(-2); </script>';
            }
        }else if($_POST['btn']=='public'){
            $id = $_SESSION['id'];
            $p->Interactive('update `blog` set TrangThai = 1 where ID_BV = '.$id.'');
            echo'<script>alert("Công khai tin tức thành công !!!");history.go(-2); </script>';
        }else if($_POST['btn']=='private'){
            $id = $_SESSION['id'];
            $p->Interactive('update `blog` set TrangThai = 0 where ID_BV = '.$id.'');
            echo'<script>alert("Đã đóng tin tức thành công");history.go(-2); </script>';
        }
    }else{
        $read->readEvent('http://localhostphp/api/exportEvent.php?loai=2');
        echo '<input type="hidden" id="btn" value="1">';
    }
    
?>