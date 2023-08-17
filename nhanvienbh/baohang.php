<?php
    session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
    
    if(isset($_REQUEST['btn'])){
        switch ($_REQUEST['btn']) {
            case 'show':
                {
                    $code = $_REQUEST['code'];
                    $read->showbaohanh('http://localhostphp/api/baohanh.php?hash='.$code.'');
                    break;
                }
            case 'update':
                {
                    $id=$_POST['id'];
                    $time1 = date('H:i d-m-Y');
                    if($p->Interactive('Update baohanh SET GhiChu = CONCAT(GhiChu,"\n==> '.$time1.' Đã bảo hành") where Hash = "'.$id.'"')){
                        $data = $p->exportDATA('select bh.ID_BHDT,bh.ID_CTSP,sp.TenSanPham,m.TenMau,ch.Ram,ch.Rom,ch.Chip,bh.NgayMua,bh.NgayHetHan,bh.CodeMay,bh.Phone,bh.GhiChu,bh.Hash from baohanh bh join chitietsanpham ctsp on bh.ID_CTSP=ctsp.ID_CTSP join sanpham sp ON ctsp.ID_SP = sp.ID_SP JOIN mau m on m.ID_Mau = ctsp.ID_Mau JOIN cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh where Hash = "'.$id.'"');
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
                            $data1=$block.$nonce.$data.(string)$pre;
                            $hash=hash("sha256",$data1);
                            $mine = substr($hash,0,5);
                        };
                        $km = mysqli_query($con,'INSERT INTO `block` (`Nonce`, `Timestams`, `Data`, `PreHash`, `Hash`) VALUES ("'.$nonce.'",NOW(), "'.$data.'", "'.$pre.'","'.$hash.'")');
                        if($km){
                            $p->Interactive('update baohanh set Hash = "'.$hash.'" where Hash = "'.$id.'"');
                            include"../phpqrcode/qrlib.php";
                            $folderTemp ="../gbrqrcode/baohanh/";    
                            $a = "http://localhostbaohanh.php?code=";
                            $b = $hash;
                            $c = $a.$b;
                            $d = $b.".png";
                            $qual = 'H';
                            $size = 3;
                            $padding = 2;
                            QRCode :: png($c,$folderTemp.$d,$qual,$size,$padding);
                            $read->showbaohanh('http://localhostphp/api/baohanh.php?hash='.$hash.'');
                        }else{
                            echo'<script>alert("Tạo block thất bại");history.go(-2); </script>';
                        }
                    }
                    echo'<script>alert("Bảo hành thành công"); </script>';
                    break;
                }
            case 'tim':
                {
                    $read->modal_baohanh();
                    break;
                }
            case 'Cancel':
                {
                    echo'<script> window.location.replace("./quanlybaohanh.php");</script>';
                    break;
                }
            case 'add':
                {
                    $read->timkiem_baohanh();
                    break;
                }
            case 'coppy':
                {
                    $code = $_POST['voucher'];
                    echo'<script>if(navigator.clipboard.writeText("'.$code.'")){
                                    alert("Sao chép mã thành công!");
                                    window.location.replace("./voucherManagement.php");
                                }</script>';
                    break;
                }
            case 'quet':
                {
                    echo'<div class="row ">
                            <div class="col-lg-2"></div>
                            <div class="col-lg-8 bor25 m-t-170">
                            <div style="width:500px;" id="reader"></div>
                            </div>
                            <div class="col" style="padding:30px;">
                                <h4></h4>
                                <div id="result"></div>
                            </div>
                            <input type="hidden" id="btn" value="5">
                        </div>';
                    break;
                }
            case 'submit':
                {
                    $imei = $_POST['imei'];
                    $phone = $_POST['phone'];
                    $end = $_POST['end'];
                    $start = $_POST['start'];
                    $idsp = $_POST['code']; 
                    $time1 = date('H:i d-m-Y');
                    if($imei !='' && $phone !='' && $end !='' && $start !='' && $idsp !=''){
                        $k = $p->exportNumOrder('select MAX(ID_BHDT) as ID_DH from baohanh') + 1;
                        $p->Interactive('ALTER TABLE baohanh AUTO_INCREMENT = '.$k.'');
                        if($p->Interactive('INSERT INTO `baohanh` (`ID_CTSP`, `NgayMua`, `NgayHetHan`, `CodeMay`,GhiChu, `Phone`, `Hash`) VALUES ('.$idsp.', "'.$start.'", "'.$end.'", "'.$imei.'","==>'.$time1.'đã mua máy", "'.$phone.'","")')){
                            $k = $p->exportNumOrder('select ID_BHDT as ID_DH from baohanh where CodeMay = '.$imei.'');
                            $data = $k.'-'.$idsp.'-'.$imei.'-'.$start.'-'.$end.'-'.$phone.'-'.'==>'.$time1."đã mua hàng";
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
                                $data1=$block.$nonce.$data.(string)$pre;
                                $hash=hash("sha256",$data1);
                                $mine = substr($hash,0,5);
                            };
                            $km = mysqli_query($con,'INSERT INTO `block` (`Nonce`, `Timestams`, `Data`, `PreHash`, `Hash`) VALUES ("'.$nonce.'",NOW(), "'.$data.'", "'.$pre.'","'.$hash.'")');
                            if($km){
                                $p->Interactive('update baohanh set Hash = "'.$hash.'" where CodeMay = "'.$imei.'"');
                                include"../phpqrcode/qrlib.php";
                                $folderTemp ="../gbrqrcode/baohanh/";    
                                $a = "http://localhostbaohanh.php?code=";
                                $b = $hash;
                                $c = $a.$b;
                                $d = $b.".png";
                                $qual = 'H';
                                $size = 3;
                                $padding = 2;
                                QRCode :: png($c,$folderTemp.$d,$qual,$size,$padding);
                                $read->showbaohanh('http://localhostphp/api/baohanh.php?hash='.$hash.'');
                            }else{
                                echo'<script>alert("Tạo block thất bại");history.go(-2); </script>';
                            }
                            
                        }else{
                            echo'<script>alert("thiếu dữ liệu");history.go(-2); </script>';
                        }
                    }else{
                        echo'<script>alert("Tạo phiếu bảo hành thất bại");history.go(-2); </script>';
                    }
                    break;
                }
        }
    }else{
        echo '<input type="hidden" id="btn" value="1">';
    }


?>