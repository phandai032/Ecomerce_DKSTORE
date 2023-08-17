<?php
session_start();
include_once '../php/readAPI/conectAPI.php';
include_once '../php/style/style.php';
$p = new app();
$read = new api1();
$id=$_REQUEST['id'];
$read->readmodal('http://localhostphp/api/exportDelivery.php?id=58');


?>