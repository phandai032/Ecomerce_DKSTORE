<?php
    include_once '../style/style.php';
    $st = new app();
    $id_city = $_REQUEST['city'];
    $st->exportAddressVN("SELECT pro.provinceid as code_city,pro.name as name_city,dis.districtid as code_dis, dis.name as name_dis FROM `province` pro join district dis on pro.provinceid = dis.provinceid where pro.provinceid=$id_city  ORDER BY dis.name DESC");
?>
