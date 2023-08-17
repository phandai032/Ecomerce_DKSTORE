<?php
    include_once '../style/style.php';
    $st = new app();
    if(isset($_REQUEST['IP'])){
        $id=$_REQUEST['IP'];
        $st->exportSysTem("select ctsp.ID_CauHinh as ID_CauHinh, ch.Ram as Ram, ch.Rom as Rom, ch.Chip as Chip, ch.ManHinh as ManHinh,ch.ThietKe as ThietKe from chitietsanpham ctsp join cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh where ctsp.ID_SP='$id' group by ID_CauHinh");
    }else{
        $st->exportSysTem("select ch.ID_CauHinh as ID_CauHinh, ch.Ram as Ram, ch.Rom as Rom, ch.Chip as Chip, ch.ManHinh as ManHinh,ch.ThietKe as ThietKe from  cauhinh ch");
    }
?>