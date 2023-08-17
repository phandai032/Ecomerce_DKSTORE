<?php
    class app{
        function connect(){
            $con = mysqli_connect("localhost","lmrxuhgi","PmZMLweFR86TiQZ","lmrxuhgi_dkstore");
            $con->set_charset("utf8");
            return $con;
			if(!$con){
                echo'Loi Ket Noi';
                exit();
            }
        }
        function connect_address(){
            $con = mysqli_connect("localhost","root","","vietnam");
            $con->set_charset("utf8");
            return $con;
			if(!$con){
                echo'Loi Ket Noi';
                exit();
            }
        }
        function checkUser($sql){
            $i = 0;
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
            return $i;
        }
        function exportNumOrder($sql){
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
            $row = mysqli_fetch_array($result);
            $num =  $row["ID_DH"];
            return $num;
        }
        function exportProDucts($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_SP = $row["ID_SP"];
                    $ID_CTSP = $row["ID_CTSP"];
					$TenSP = $row["TenSanPham"];
                    $NhaCC = $row["NhaCungCap"];
                    $Nam = $row["NamPhatHanh"];
                    $LoaiSP = $row["ID_Loai"];
                    $Ram = $row["Ram"];
                    $Rom = $row["Rom"];
                    $Chip = $row["Chip"];
                    $ManHinh = $row["ManHinh"];
                    $ThietKe = $row["ThietKe"];
                    $Mau = $row["TenMau"];
                    $Gia = $row["Gia"];
                    $SoLuong = $row["SoLuong"];
                    $Anh = $row["Anh"];
                    $anhchinh = $row['AnhChinh'];
                    $data[] = array('ID_CTSP' => $ID_CTSP,'ID_SP' => $ID_SP,'anhchinh' => $anhchinh,'TenSP' => $TenSP,'Anh' =>$Anh,'gia' => $Gia,'SoLuong' => $SoLuong,'Mau' => $Mau,'Ram' => $Ram,'Rom' => $Rom,'Chip' => $Chip,'ManHinh' => $ManHinh,'NhaCungCap' => $NhaCC,'NamPhatHanh' => $Nam,'ThietKe' => $ThietKe);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportPurchaseDetail($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_DM = $row["ID_DM"];
                    $ID_CTSP = $row["ID_CTSP"];
					$SoLuong = $row["SoLuong"];
                    $Date = $row["Date"];
                    $TenSanPham = $row["TenSanPham"];
                    $mota = $row["mota"];
                    $Gia = $row["Gia"];
                    $ThuGui = $row["ThuGui"];
                    $ThuNhan = $row["ThuNhan"];
                    $TenKhu = $row['TenKhu'];
                    $Tang = $row['Tang'];     
                    $note = $row['note'];
                    $ViTri = $row['ViTri'];
                    $TrangThai = $row["TrangThai"];
                    $data[] = array('ID_CTSP' => $ID_CTSP,'TenKhu'=>$TenKhu,'Tang'=>$Tang,'ViTri'=>$ViTri,'ID_DM' => $ID_DM,'SoLuong' => $SoLuong,'Date' => $Date,'TenSanPham' =>$TenSanPham,'gia' => $Gia,'mota' => $mota,'ThuGui' => $ThuGui,'note' => $note,'ThuNhan' => $ThuNhan,'TrangThai' => $TrangThai);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportAddress($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_DCGH = $row["ID_DCGH"];
                    $SoNha = $row["SoNha"];
                    $Phuong = $row["Phuong"];
                    $Quan = $row["Quan"];
                    $Tinh = $row["Tinh"];
                    $phone = $row["SoDienThoai"];
                    $Email = $row["Email"];
                    $ID_ND = $row["ID_ND"];
                    $data[] = array('ID_DCGH' => $ID_DCGH,'SoNha' => $SoNha,'Email' => $Email,'phone' => $phone,'Phuong' => $Phuong,'Quan' =>$Quan,'Tinh' => $Tinh,'ID_ND' => $ID_ND);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportBaoHanh($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_BHDT = $row["ID_BHDT"];
					$TenSP = $row["TenSanPham"];
                    $Ram = $row["Ram"];
                    $Rom = $row["Rom"];
                    $Chip = $row["Chip"];
                    $Mau = $row["TenMau"];
                    $NgayMua = $row["NgayMua"];
                    $NgayHetHan = $row['NgayHetHan'];
                    $CodeMay = $row['CodeMay'];
                    $GhiChu = $row['GhiChu'];
                    $Hash = $row['Hash'];
                    $Phone = $row['Phone'];
                    $data[] = array('ID_BHDT' => $ID_BHDT,'TenSP' => $TenSP,'Mau' => $Mau,'Ram' => $Ram,'Rom' => $Rom,'Chip' => $Chip,'NgayMua' => $NgayMua,'NgayHetHan' => $NgayHetHan,'CodeMay' => $CodeMay,'Phone' => $Phone,'GhiChu' => $GhiChu,'Hash' => $Hash);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
		function exportDATA($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
				while ($row = mysqli_fetch_array($result)) {
					$ID_BHDT = $row["ID_BHDT"];
					$idsp = $row["ID_CTSP"];
                    $NgayMua = $row["NgayMua"];
                    $NgayHetHan = $row['NgayHetHan'];
                    $CodeMay = $row['CodeMay'];
                    $GhiChu = $row['GhiChu'];
                    $Phone = $row['Phone'];
                    $data = $idsp.'-'.$CodeMay.'-'.$NgayMua.'-'.$NgayHetHan.'-'.$Phone.'-'.$GhiChu;
                    return $data;
				}
			}
		}
        function exportVoucher($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_Voucher = $row["ID_Voucher"];
                    $MaVocher = $row["MaVocher"];
                    $code = $row["code"];
                    $giamgia = $row["giamgia"];
                    $NgayBatDau = $row["NgayBatDau"];
                    $NgayKetThuc = $row["NgayKetThuc"];
                    $SoLanDung = $row["SoLanDung"];
                    $ID_NV = $row["ID_NV"];
                    $data[] = array('ID_Voucher' => $ID_Voucher,'code' => $code,'MaVocher' => $MaVocher,'giamgia' => $giamgia,'NgayBatDau' => $NgayBatDau,'NgayKetThuc' => $NgayKetThuc,'SoLanDung' =>$SoLanDung,'ID_NV' => $ID_NV);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportPurchase($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_DM = $row["ID_DM"];
                    $Date = $row["Date"];
                    $TongDon = $row["TongDon"];
                    $ID_NV = $row["ID_NV"];
                    $ThuGui = $row["ThuGui"];
                    $ThuNhan = $row["ThuNhan"];
                    $TrangThai = $row["TrangThai"];
                    $data[] = array('ID_DM' => $ID_DM,'Date' => $Date,'TongDon' => $TongDon,'ThuGui' => $ThuGui,'ThuNhan' => $ThuNhan,'TrangThai' => $TrangThai,'ID_NV' => $ID_NV);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportReview($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$CodeSP = $row["CodeSP"];
                    $hoten = $row["hoten"];
                    $noidung = $row["noidung"];
                    $danhGia = $row["danhGia"];
                    $ThoiGian = $row["ThoiGian"];
                    $data[] = array('ThoiGian' => $ThoiGian,'CodeSP' => $CodeSP,'hoten' => $hoten,'noidung' => $noidung,'danhGia' => $danhGia);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportShipper($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_ND = $row["ID_ND"];
                    $numorder = $row["numorder"];
                    $tongtien = $row["tongtien"];
                    $HoDem = $row["HoDem"];
                    $Ten = $row["Ten"];
                    $data[] = array('ID_ND' => $ID_ND,'numorder' => $numorder,'tongtien' => $tongtien,'HoDem' => $HoDem,'Ten' => $Ten);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportAddressVN($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$code_city = $row["code_city"];
                    $name_city = $row["name_city"];
                    $code_dis = $row["code_dis"];
                    $name_dis = $row["name_dis"];
                    $code_war = $row["code_war"];
                    $name_war = $row["name_war"];
                    $data[] = array('code_city' => $code_city,'name_city' => $name_city,'code_dis' => $code_dis,'name_dis' =>$name_dis,'code_war' => $code_war,'name_war' => $name_war);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportCart($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
                $TongTien = 0;
				while ($row = mysqli_fetch_array($result)) {
					$ID_CTSP = $row["ID_CTSP"];
                    $Gia = $row["Gia"];
                    $Ram = $row["ram"];
                    $Rom = $row["rom"];
                    $Chip = $row["chip"];
                    $Mau = $row["mau"];
                    $TenSanPham = $row["TenSanPham"];
                    $SoLuong = $row["SoLuong"];
                    $Anh = $row["Anh"];
                    $TongTien = $TongTien +($SoLuong*$Gia);
                    $data[] = array('ID_CTSP' => $ID_CTSP,'Mau' => $Mau,'Ram' => $Ram,'Rom' => $Rom,'Chip' => $Chip,'gia' => $Gia,'Soluong'=>$SoLuong,'TenSanPham'=>$TenSanPham,'Anh' =>$Anh,'TongTien' => $TongTien);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportCustomer($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
                $tongTien = 0;
				while ($row = mysqli_fetch_array($result)) {
					$ID_ND = $row["ID_ND"];
                    $User = $row["User"];
                    $Pass = $row["Pass"];
                    $hodem = $row["HoDem"];
                    $Ten = $row["Ten"];
                    $Email = $row["Email"];
                    $Phone = $row["SoDienThoai"];
                    $DiaChi = $row["DiaChi"];
                    $PhanQuyen = $row["PhanQuyen"];
                    $data[] = array('ID_ND' => $ID_ND,'User' => $User,'HoDem'=>$hodem,'Pass' => $Pass,'Ten' => $Ten,'Email' => $Email,'Phone' => $Phone,'DiaChi' => $DiaChi,'PhanQuyen' => $PhanQuyen);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportStaff($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_ND = $row["ID_ND"];
                    $ID_NV = $row["ID_NV"];
                    $User = $row["User"];
                    $hodem = $row["HoDem"];
                    $Ten = $row["Ten"];
                    $Email = $row["Email"];
                    $Phone = $row["SoDienThoai"];
                    $DiaChi = $row["DiaChi"];
                    $HinhDaiDien = $row["HinhDaiDien"];
                    $NamSinh = $row["NamSinh"];
                    $ThoiGianBD = $row["ThoiGianBD"];
                    $Luong = $row["Luong"];
                    $PhanQuyen = $row["PhanQuyen"];
                    $data[] = array('ID_ND' => $ID_ND,'ID_NV' => $ID_NV,'User' => $User,'HoDem'=>$hodem,'Ten' => $Ten,'HinhDaiDien' => $HinhDaiDien,'NamSinh' => $NamSinh,'ThoiGianBD' => $ThoiGianBD,'Luong' => $Luong,'Email' => $Email,'Phone' => $Phone,'DiaChi' => $DiaChi,'PhanQuyen' => $PhanQuyen);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportEvent($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$ID_Voucher = $row["ID_Voucher"];
                    $ID_loai = $row["ID_loai"];
                    $anh3 = $row["anh3"];
                    $anh2 = $row["anh2"];
                    $anh1 = $row["anh1"];
                    $noidung3 = $row["noidung3"];
                    $noidung2 = $row["noidung2"];
                    $noidung1 = $row["noidung1"];
                    $date = $row["date"];
                    $tieude = $row["tieude"];
                    $MaVocher = $row["MaVocher"];
                    $TrangThai = $row["TrangThai"];
                    $ID_BV = $row["ID_BV"];
                    $data[] = array('ID_BV' => $ID_BV,'TrangThai' => $TrangThai,'tieude' => $tieude,'date' => $date,'noidung1'=>$noidung1,'noidung2' => $noidung2,'noidung3' => $noidung3,'anh1' => $anh1,'anh2' => $anh2,'anh3' => $anh3,'ID_loai' => $ID_loai,'ID_Voucher' => $ID_Voucher,'MaVocher' => $MaVocher);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportColor($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$id = $row['ID_MAU'];
                    $ten = $row['TenMau'];
                    $data[] = array('id_mau'=>$id,'ten_mau' => $ten);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportSupplier($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$id = $row['ID'];
                    $ten = $row['Ten'];
                    $data[] = array('id'=>$id,'ten' => $ten);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportSysTem($sql){
			$link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) {
                $data = array();
				while ($row = mysqli_fetch_array($result)) {
					$id = $row['ID_CauHinh'];
                    $Ram = $row["Ram"];
                    $Rom = $row["Rom"];
                    $Chip = $row["Chip"];
                    $ManHinh = $row["ManHinh"];
                    $ThietKe = $row["ThietKe"];
                    
                    $data[] = array('id_cauhinh'=>$id,'Ram' => $Ram,'Rom' => $Rom,'Chip' => $Chip,'ManHinh' => $ManHinh,'Thiet_Ke' => $ThietKe);
				}
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
			}
		}
        function exportOrder($sql)
        {
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                $data = array();
				while ($row = mysqli_fetch_array($result)) 
                {
                    $hodem = $row['HoDem'];
                    $ten = $row['Ten'];
                    $id = $row['ID_DH'];
                    $date = $row['NgayLap'];
                    $total = $row['TongDon'];
                    $address = $row['DiaChi'];
                    $phone = $row['SoDienThoai'];
                    $trangthai = $row['TrangThai'];
                    $hinthucthanhtoan = $row['HinhThucThanhToan'];
                    $id_nd = $row['ID_ND'];
                    $data[] = array('id'=>$id,'HoTen'=>$hodem.' '.$ten, 'date'=>$date, 'total' => $total,'address'=>$address,'phone'=>$phone,'trangthai'=>$trangthai, 'hinhthucthanhtoan' => $hinthucthanhtoan, 'id_nd' => $id_nd);
                }
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
            }
        }
        function exportDetail($sql)
        {
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                $data = array();
				while ($row = mysqli_fetch_array($result)) 
                {
                    $Gia = $row['Gia'];
                    $soluong = $row['SoLuong'];
                    $ten = $row['TenSanPham'];
                    $anh = $row['Anh'];
                    $voucher = $row['voucher'];
                    $TongDon = $row['TongDon'];
                    $ID_CTSP = $row['id'];
                    $Ram = $row["Ram"];
                    $Rom = $row["Rom"];
                    $fullname = $row["fullname"];
                    $phone = $row["phone"];
                    $trangthai = $row['TrangThai'];
                    $address = $row['address'];
                    $tenmau= $row['TenMau'];
                    $ID_DH= $row['ID_DH'];
                    $TongThu= $row['TongThu'];
                    $data[] = array('ID_DH'=>$ID_DH,'ID_CTSP'=>$ID_CTSP,'fullname'=>$fullname,'phone'=>$phone,'address'=>$address,'Gia'=>$Gia,'TongThu'=>$TongThu,'voucher'=>$voucher, 'soluong'=>$soluong,'TongDon'=>$TongDon,'ten'=>$ten,'Anh'=>$anh,'Ram' => $Ram,'Rom' => $Rom,'ten_mau' => $tenmau,'trangthai'=>$trangthai);
                }
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
            }
        }
        function exportStock($sql)
        {
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                $data = array();
				while ($row = mysqli_fetch_array($result)) 
                {
                    $MaVT = $row['MaVT'];
                    $Gia = $row['Gia'];
                    $cungcap = $row['cungcap'];
                    $nam = $row['nam'];
                    $TenKhu = $row['TenKhu'];
                    $Tang = $row['Tang'];
                    $ViTri = $row['ViTri'];
                    $TenSanPham = $row['TenSanPham'];
                    $ChiTiet = $row['ChiTiet'];
                    $NhaPhatHanh = $row['NhaPhatHanh'];
                    $SoLuong  = $row["SoLuong"];
                    $anh = $row["anh"];
                    $MaSP = $row["MaSP"];
                    $data[] = array('MaVT'=>$MaVT,'TenKhu'=>$TenKhu,'anh'=>$anh,'nam'=>$nam,'gia'=>$Gia,'cungcap'=>$cungcap,'Tang'=>$Tang,'ViTri'=>$ViTri,'TenSanPham'=>$TenSanPham,'ChiTiet'=>$ChiTiet, 'NhaPhatHanh'=>$NhaPhatHanh,'SoLuong'=>$SoLuong ,'MaSP'=>$MaSP);
                }
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
            }
        }
        function exportStatus_order($sql)
        {
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                $data = array();
				while ($row = mysqli_fetch_array($result)) 
                {
                    $dangchoxuly = $row['dangchoxuly'];
                    $daxuly = $row['daxuly'];
                    $dachuanbi = $row['dachuanbi'];
                    $danggiao = $row['danggiao'];
                    $giaothanhcong = $row['giaothanhcong'];
                    $donhoan = $row['donhoan'];
                    $donhuy = $row['donhuy'];
                    $data[] = array('dangchoxuly'=>$dangchoxuly,'daxuly'=>$daxuly,'dachuanbi'=>$dachuanbi,'danggiao'=>$danggiao,'giaothanhcong'=>$giaothanhcong,'donhuy'=>$donhuy, 'donhoan'=>$donhoan);
                }
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
            }
        }
        function exportDelivery($sql)
        {
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                $data = array();
				while ($row = mysqli_fetch_array($result)) 
                {
                    $code = $row['madh'];
                    $time = $row['time'];
                    $total = $row['total'];
                    $anh1 = $row['anh1'];
                    $anh2 = $row['anh2'];
                    $num = $row['num'];
                    $status = $row['status'];
                    $data[] = array('code'=>$code,'time'=>$time,'total'=>$total,'anh1'=>$anh1,'anh2'=>$anh2,'num'=>$num,'status'=>$status);
                }
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
            }
        }
        function exportShipping($sql)
        {
            $link = $this->connect();
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                $data = array();
				while ($row = mysqli_fetch_array($result)) 
                {
                    $ID_DH = $row['ID_DH'];
                    $HoDem = $row['HoDem'];
                    $Ten = $row['Ten'];
                    $SoNha = $row['SoNha'];
                    $Phuong = $row['Phuong'];
                    $Quan = $row['Quan'];
                    $Tinh = $row['Tinh'];
                    $SoDienThoai = $row['SoDienThoai'];
                    $Email = $row['Email'];
                    $data[] = array('ID_DH'=>$ID_DH,'HoDem'=>$HoDem,'Ten'=>$Ten,'SoNha'=>$SoNha,'Phuong'=>$Phuong,'Quan'=>$Quan,'Tinh'=>$Tinh,'SoDienThoai'=>$SoDienThoai,'Email'=>$Email);
                }
                header("content-Type:application/json;charset=UTF-8");
                echo json_encode($data);
            }
        }
        function exportStock_Product($i,$k,$m)
        {
            $link = $this->connect();
            $sql = 'SELECT ct.TenViTri as vitri, sp.TenSanPham as sanpham,ch.Ram,ch.Rom,m.TenMau,ctsp.SoLuong from chitietkho ctk join cautruc ct on ct.ID_CT=ctk.ID_CT join chitietsanpham ctsp on ctk.ID_CTSP=ctsp.ID_CTSP join mau m ON m.ID_Mau=ctsp.ID_Mau JOIN cauhinh ch on ch.ID_CauHinh=ctsp.ID_CauHinh JOIN sanpham sp on sp.ID_SP=ctsp.ID_SP WHERE ct.TenKhu = "'.$i.'" and ct.TenTang = '.$k.' and ct.TenViTri = '.$m.'';
			$result = mysqli_query($link,$sql);
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                while ($row = mysqli_fetch_array($result)) 
                {
                    $vitri =$row['vitri'];
                    $TenMau = $row['TenMau'];
                    $Ram = $row['Ram'];
                    $Rom = $row['Rom'];
                    $SoLuong = $row['SoLuong'];
                    $sanpham = $row['sanpham'];
                    echo ' - '.$sanpham.'('.$Ram.'/'.$Rom.'/'.$TenMau.')</div> <div class="col-lg-1">x</div> <div class="col-lg-3">'.$SoLuong.' Cái</div> </li> ';
                }
            }else{
                echo '- Not found product</div>  <button type="submit"  class="btn btn-primary">Add Product</button></li> ';
            }
               
        }
        function exportStock_ViTri($i,$k)
        {
            $link = $this->connect();
			$result = mysqli_query($link,'SELECT TenKhu,TenTang,TenViTri FROM cautruc where TenKhu = "'.$i.'" and TenTang = "'.$k.'"');
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                while ($row = mysqli_fetch_array($result)) 
                {
                    $vitri = $row['TenViTri'];
                    $Tang = $row['TenTang'];
                    $Khu = $row['TenKhu'];
                    echo '<li class="li row"> <div class="col-lg-8"> Vi Tri So '.$vitri;
                    echo $this->exportStock_Product($Khu,$Tang,$vitri);
                }
            }
               
        }
        function exportStock_Tang($i)
        {
            $link = $this->connect();
			$result = mysqli_query($link,'SELECT TenKhu,TenTang FROM cautruc where TenKhu = "'.$i.'" GROUP BY TenTang');
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                while ($row = mysqli_fetch_array($result)) 
                {
                    $Tang = $row['TenTang'];
                    $Khu = $row['TenKhu'];
                    echo '<li class="li"><span class="caret1"> Tang '.$Tang.'</span>
                            <ul class="nested1">';
                    echo    $this->exportStock_ViTri($Khu,$Tang) ;           
                    echo      '</ul>
                        </li>';
                    }
            }
               
        }
        function exportStock_Khu()
        {
            $link = $this->connect();
			$result = mysqli_query($link,'SELECT TenKhu FROM cautruc GROUP BY TenKhu');
			$i = mysqli_num_rows($result);
			if ($i > 0) 
            {
                while ($row = mysqli_fetch_array($result)) 
                {
                    $TenKhu = $row['TenKhu'];
                    echo '<li class="li"><span class="caret1"> Khu '.$TenKhu.'</span>
                            <ul class="nested1"> ';
                    echo $this->exportStock_Tang($TenKhu);
                    echo '</ul>
                         </li>';
                    }
            }
               
        }
        
        function Interactive($sql)
        {
            $link = $this->connect();
            if (mysqli_query($link,$sql)) {
                return 1;
            } else {
                return 0;
            }
        }
        function upload($filename,$tempname){
            $folder = "./images/upload/shipping/".$filename;   
            if (move_uploaded_file($tempname, $folder)) {
                $msg = "Image uploaded successfully";
            }else{
                $msg = "Failed to upload image";
            }

        }
        
    }