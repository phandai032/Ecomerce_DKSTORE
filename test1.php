<?php
    session_start();
	include_once './php/readAPI/conectAPI.php';
	include_once './php/style/style.php';
	$p = new app();
	$read = new api1();
    $city = $_POST['city']; 
    $dis = $_POST['dis']; 
    if($dis!=""){
        $city = $_SESSION['city'];
        return $read->readExportWar('http://localhostphp/api/exportAddress_War.php?city='.$city.'&dis='.$dis.'');
    }
    if($city!=""){
        $_SESSION['city']=$city;
        return $read->readExportDis('http://localhostphp/api/exportAddressVN_Dis.php?city='.$city.''); 
    }
    
?>