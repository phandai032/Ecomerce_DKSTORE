<?php
    session_start();
    include_once '../php/readAPI/conectAPI.php';
	$read = new api1();
    $id = $_GET['id'];
    $_SESSION['id']= $id;
    $read->readorderdetail_SP("http://localhostphp/api/exportdetail.php?id=$id&id_nd=4");
    
?>