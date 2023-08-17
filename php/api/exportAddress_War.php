<?php
    include_once '../style/style.php';
    $st = new app();
    $id_city = $_REQUEST['city'];
    $id_dis = $_REQUEST['dis'];
    $st->exportAddressVN("SELECT pro.provinceid as code_city,pro.name as name_city,dis.districtid as code_dis, dis.name as name_dis,war.wardid as code_war,war.name as name_war FROM `province` pro join district dis on pro.provinceid = dis.provinceid JOIN ward war on dis.districtid = war.districtid where dis.provinceid=$id_city and war.districtid =$id_dis ORDER BY pro.name ASC");
?>
