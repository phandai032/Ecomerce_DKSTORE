<?php
   include"../../phpqrcode/qrlib.php";
   $folderTemp ="../../gbrqrcode/";    
   $a = $_REQUEST["link"];
   $b = $_REQUEST['pass'];
   $e = $_REQUEST['user'];
   $c = $a."&pass=".$b."&button=login";
   $d = $e.".png";
   $qual = 'H';
   $size = 3;
   $padding = 2;
   QRCode :: png($c,$folderTemp.$d,$qual,$size,$padding);
   /* $sql = $p->xulytt("INSERT INTO `dkstore1`.`qrcode` (`ten`, `anh`) VALUES ('$b', '$d');");
    if($sql){
        echo 'tạo thành công';
    }else {
        echo'tạo thất bại';
    } */
?>