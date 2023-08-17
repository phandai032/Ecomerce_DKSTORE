<?php
    session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
    
    if(isset($_REQUEST['btn'])){
        switch ($_REQUEST['btn']) {
            case 'edit':
                {
                    $id=$_POST['code'];
                    $_SESSION['id']=$id;
                    $read->modal_voucher('http://localhostphp/api/export_Voucher.php?id='.$id.'');
                    break;
                }
            case 'save':
                {
                    $end=$_POST['end'];
                    $start=$_POST['start'];
                    $num=$_POST['num'];
                    $dis=$_POST['dis'];
                    $code=$_POST['code'];
                    $id= $_SESSION['id'];
                    $p->Interactive('UPDATE `voucher` SET SoLanDung = '.$num.' ,NgayKetThuc= "'.$end.'",NgayBatDau= "'.$start.'",giamgia= '.$dis.',code= "'.$code.'",MaVocher= MD5("'.$code.'") where ID_Voucher = '.$id.'');
                    echo'<script>alert("Cập nhật mã giảm giá thành công");history.go(-2); </script>';
                    break;
                }
            case 'ban':
                {
                    $id= $_POST['code'];
                    $p->Interactive('UPDATE `voucher` SET SoLanDung = 0  where ID_Voucher = '.$id.'');
                    echo'<script>alert("Mã giảm giá đã bị vô hiệu hóa");history.go(-1); </script>';
                    break;
                }
            case 'Cancel':
                {
                    echo'<script>history.go(-2); </script>';
                    break;
                }
            case 'add':
                {
                    $read->modal_voucher1();
                    break;
                }
            case 'coppy':
                {
                    $code = $_POST['voucher'];
                    echo'<script>if(navigator.clipboard.writeText("'.$code.'")){
                                    alert("Sao chép mã thành công!");
                                    window.location.replace("./voucherManagement.php");
                                }</script>';
                    break;
                }
            case 'submit':
                {
                    $end=$_POST['end'];
                    $start=$_POST['start'];
                    $num=$_POST['num'];
                    $dis=$_POST['dis'];
                    $code=$_POST['code'];
                    $nd = $_SESSION['maND'];
                    if($end !=''&& $code !=''&& $dis !=''&& $num !=''&& $start !=''){
                        $p->Interactive('INSERT INTO `voucher` (`MaVocher`, `code`, `giamgia`, `NgayBatDau`, `NgayKetThuc`, `SoLanDung`, `ID_NV`) VALUES (MD5("'.$code.'"),"'.$code.'" ,"'.$dis.'","'.$start.'","'.$end.'","'.$num.'","'.$nd.'")');
                        echo'<script>alert("Tạo mã giảm giá thành công");history.go(-2); </script>';
                    }else{
                        echo'<script>alert("Hãy kiểm tra lại thông tin mã giảm giá");history.go(-1); </script>';
                    }
                    
                    
                    break;
                }
        }
    }else{
        $read->voucher('http://localhostphp/api/export_Voucher.php');
    }


?>