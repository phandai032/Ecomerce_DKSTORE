<?php
    $nonce =1;
    $startTime = microtime(true);
    $endTime = microtime(true);
    $time = $endTime - $startTime;
    $con = mysqli_connect("localhost","lmrxuhgi","PmZMLweFR86TiQZ","lmrxuhgi_dkstore");
    $con->set_charset("utf8");
    $result = mysqli_query($con,'select Block ,Hash as pre from block WHERE Block = (SELECT MAX(Block) FROM block)');
    $i = mysqli_num_rows($result);
    if($i == 0){
        $pre ="0000000000000000000000000000000000000000000000000000000000000000";
        $num =  1;
    }else{
        $row = mysqli_fetch_array($result);
        $num =  $row["Block"]+1;
        $pre = $row['pre'];
    }
    while ($mine!=="00000") {
        $nonce =$nonce + 1;
        $block = $num;
        $data = $_REQUEST['data'];
        $data1=$block.$nonce.$data.(string)$pre;
        $hash=hash("sha256",$data1);
        $mine = substr($hash,0,5);
    };
    mysqli_query($con,'INSERT INTO `block` (`Nonce`, `Timestams`, `Data`, `PreHash`, `Hash`) VALUES ("'.$nonce.'",NOW(), "'.$data.'", "'.$pre.'","'.$hash.'")');
    return 1;
?>