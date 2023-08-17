<?php
    include_once '../style/style.php';
    $st = new app();
    $st->exportSupplier("SELECT ID_Loai as ID, TenLoai as Ten FROM `loaisp`");

?>