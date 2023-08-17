<?php
    include_once '../style/style.php';
    $st = new app();
    $st->exportAddressVN("SELECT provinceid as code_city, name as name_city FROM `province` where provinceid = 79 order by name ASC");
?>
