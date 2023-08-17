<?php
    include_once '../style/style.php';
    $st = new app();
    $st->exportStatus_order("SELECT (SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai =1 or TrangThai =2) as dangchoxuly,(SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai = 3) as daxuly,(SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai =4) as dachuanbi,(SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai =5) as danggiao,(SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai =6) as giaothanhcong,(SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai =7) as donhoan,(SELECT COUNT(ID_DH) FROM donhang WHERE TrangThai =8) as donhuy ");

?>