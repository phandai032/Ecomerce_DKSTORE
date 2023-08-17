<?php
	session_start();
	include_once './php/readAPI/conectAPI.php';
	include_once './php/style/style.php';
	$p = new app();
	$read = new api1();
	if(isset($_SESSION["phanquyen"])){
		$read->check_permission(1);
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Trang Chủ</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--================================================================================on-font.===============-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icmin.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" media="screen" href="./login/demo/css/style.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/logo_new.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Trang Chủ</a>
							</li>

							<li>
								<a href="product.php">Sản Phẩm</a>
								<ul class="sub-menu">
								<li><a href="product.php?ncc=APPLE">APPLE</a></li>
									<li><a href="product.php?ncc=XIAOMI">XIAOMI</a></li>
									<li><a href="product.php?ncc=SAMSUNG">SAMSUNG</a></li>
									<li><a href="product.php?ncc=APPLE">REALME</a></li>
									<li><a href="product.php?ncc=APPLE">OPPO</a></li>
									<li><a href="product.php?ncc=APPLE">Khác</a></li>
								</ul>
							</li>
							<li>
								<a href="product.php">Phụ Kiện</a>
								<ul class="sub-menu">
									<li><a href="#">Ốp lưng</a></li>
									<li><a href="#">Tai Nghe</a></li>
									<li><a href="#">Sạc dự phòng</a></li>
								</ul>
							</li>
							<li>
								<a href="blog.php">Tin Tức</a>
							</li>
							<li>
								<a href="contact.php">Liên Hệ</a>
							</li>
						</ul>
					</div>	
					<!-- Cart -->
					<div class="wrap-header-cart js-panel-cart">
						<div class="s-full js-hide-cart"></div>

						<div class="header-cart flex-col-l p-l-65 p-r-25">
							<div class="header-cart-title flex-w flex-sb-m p-b-8">
								<span class="mtext-103 cl2">
									Giỏ Hàng Của Tôi
								</span>
								<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
									<i class="zmdi zmdi-close"></i>
								</div>
							</div>
							
							<div class="header-cart-content flex-w js-pscroll">
								<ul class="header-cart-wrapitem w-full">
								<?php
									$id = $_SESSION['maND'];
									$read->readCart('http://localhostphp/api/exportCart.php?id='.$id.'');
								?>
						</div>
					</div>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m m-l-100">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $_SESSION['number_cart']; ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						<?php
							if(isset($_SESSION['current_user'])){
								echo '<ul class="nav nav-pills">
								<li class="nav-item dropdown">
								<a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle" data-toggle="dropdown" data-notify="0"><span>'.$_SESSION['name'].'</span></a>
									<div class="dropdown-menu ml-3">
									<a class="dropdown-item" href="account_management.php?ping=1">Xuất mã đăng nhập</a>
									<a class="dropdown-item" href="account_management.php?ping=2">Quản lý tài khoản</a>
									<a class="dropdown-item" href="order_management.php?ping=3">Quản lý đơn hàng</a>
									<a class="dropdown-item" href="http://localhostlogin_gg/logout.php">Đăng xuất</a></div>
								</li>
								</ul>';
							}else{
								echo '<a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0"><i class="zmdi zmdi-account"></i></a>';
							}
						?>
						
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/logo_new.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php echo $_SESSION['number_cart']; ?>">
							<a href="shoping-cart.php"><i class="zmdi zmdi-shopping-cart"></i></a>
						</div>
						<?php
							if(isset($_SESSION['current_user'])){
								echo '<ul class="nav nav-pills">
								<li class="nav-item dropdown">
								<a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle" data-toggle="dropdown" data-notify="0"><span>'.$_SESSION['name'].'</span></a>
									<div class="dropdown-menu ml-3">
									<a class="dropdown-item" href="?ping=1">Xuất mã đăng nhập</a>
									<a class="dropdown-item" href="?ping=2">Quản lý tài khoản</a>
									<a class="dropdown-item" href="order_management">Quản lý đơn hàng</a>
									<a class="dropdown-item" href="http://localhostlogin_gg/logout.php">Đăng xuất</a></div>
								</li>
								</ul>';
							}else{
								echo '<a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0"><i class="zmdi zmdi-account"></i></a>';
							}
						?>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.php">Trang Chủ</a>
				</li>

				<li>
					<a href="product.php">Sản Phẩm</a>
					<ul class="sub-menu-m">
						<li><a href="product.php?ncc=APPLE">APPLE</a></li>
						<li><a href="product.php?ncc=XIAOMI">XIAOMI</a></li>
						<li><a href="product.php?ncc=SAMSUNG">SAMSUNG</a></li>
						<li><a href="product.php?ncc=APPLE">REALME</a></li>
						<li><a href="product.php?ncc=APPLE">OPPO</a></li>
						<li><a href="product.php?ncc=APPLE">Khác</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="product.php">Phụ Kiện</a>
					<ul class="sub-menu-m">
						<li><a href="#">Ốp Lưng</a></li>
						<li><a href="#">Tai Nghe</a></li>
						<li><a href="#">Sạc Dự Phòng</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>	
				</li>
				<li>
					<a href="blog.php">Tin Tức</a>
				</li>
				<li>
					<a href="contact.php">Liên Hệ</a>
				</li>
			</ul>
		</div>
		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Tìm Kiếm...">
				</form>
			</div>
		</div>
	</header>

	<!-- breadcrumb -->
	<div class="container p-t-80 p-b-20">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Trang Chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				Giỏ Hàng Của Tôi
			</span>
		</div>
	</div>
		

	<!-- Shoping Cart -->
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<form action="#" method="POST">
						<div class="m-l-25 m-r--38 m-lr-0-xl">
							<div class="wrap-table-shopping-cart">
								<table class="table-shopping-cart table ">
								<thead>
									<tr class="table_head text-center">
										<th class="text-center">Hình Ảnh</th>
										<th class="text-center">Sản Phẩm</th>
										<th class="text-center">Giá</th>
										<th class="text-center">SL</th>
										<th class="text-center">TT</th>
										<th class="text-center">Thao Tác</th>
									</tr>
								</thead>				
								<tbody>
									<?php
										$id = $_SESSION["maND"];
										$read->readCartDetail("http://localhostphp/api/exportCart.php?id=$id");
									?>
								</tbody>
								</table>
							</div>
							<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
								<div class="flex-w flex-m m-r-20 m-tb-5 bg-secondary">
								</div>
							</div>
						</div>
					</form>
				</div>
				<?php
					if(isset($_REQUEST["button"])){
						switch ($_REQUEST["button"]) {
							case 'update':
								{
									$id_sp = $_REQUEST["ID"];
									$soluong= $_REQUEST['num-product'];
									$id_nd = $_SESSION['maND'];
									if($soluong != NULL){
										if($soluong > 0){
											$p->Interactive("update giohang set SoLuong=$soluong where ID_ND = $id_nd && ID_CTSP = $id_sp");
											echo'<script>alert ("Cập nhật số lượng thành công"); window.location.replace("shoping-cart.php"); </script>';
										}else{
											echo'<script>alert ("Số lượng sản phẩm ít nhất là 1"); window.location.replace("shoping-cart.php"); </script>';
										}
									}else{
										echo'<script>alert ("Cần nhập số lượng"); window.location.replace("shoping-cart.php"); </script>';
									}
									break;
								}
							case 'delete':{
								$id = $_REQUEST['ID'];
								$id_nd = $_SESSION['maND'];
								$p->Interactive("delete from giohang where ID_ND=$id_nd&&ID_CTSP=$id");
								$_SESSION['number_cart']=$_SESSION['number_cart']-1;
								echo'<script>alert ("Sản phẩm đã được xóa khỏi giỏ hàng"); window.location.replace("shoping-cart.php"); </script>';
								break;
							}
							case 'checkout':{
								if($_SESSION['nums']==0){
									echo'<script>alert ("Không tìm thấy sản phẩm trong giỏ hàng"); window.location.replace("shoping-cart.php"); </script>';
								}else{
									$add = $_REQUEST["add"];
									$phone = $_REQUEST["phone"];
									$_SESSION['tongtien'] = $_SESSION['tongtien'] + 35000;
									$tongtien = $_SESSION['tongtien'] - $_SESSION['discount'] ;
									$voucher = $_SESSION['voucher'];
									$payment = $_REQUEST['method'];
									if($add !='' && $phone!='' && $payment !=''){
										$id_nd = $_SESSION['maND'];
										$p->Interactive("INSERT INTO `donhang` (`TrangThai`, `NgayLap`, `TongDon`,TongThu, `SoDienThoai`, `HinhThucThanhToan`, `Voucher`, `ID_DCGH`, `ID_ND`) VALUES (1,NOW(),$tongtien,$tongtien,$phone,$payment,'$voucher',$add,$id_nd)");
										$p->Interactive("INSERT INTO chitietdonhang(ID_DH,ID_CTSP,SoLuong) select dh.ID_DH,gh.ID_ctsp,gh.SoLuong from giohang gh join nguoidung nd on gh.ID_ND=nd.ID_ND join donhang dh on dh.ID_ND=nd.ID_ND where dh.ID_DH = (select max(ID_DH) from donhang)");
										$p->Interactive("UPDATE chitietsanpham ctsp join chitietdonhang ctdh on ctsp.ID_CTSP=ctdh.ID_CTSP join donhang dh on dh.ID_DH=ctdh.ID_DH SET ctsp.SoLuong = (ctsp.SoLuong - ctdh.SoLuong) where dh.ID_DH= (select max(ID_DH) from donhang)");
										$p->Interactive("DELETE from giohang where ID_ND =$id_nd");
										$IDDH = $p->exportNumOrder("select max(ID_DH) as ID_DH from donhang");
										$_SESSION['number_cart']=0;
										$_SESSION['voucher'] = 0;
										if($_REQUEST['method']==2){
											echo'<script>alert ("Chuyển đến trang thanh toán!!!"); window.location.replace("http://localhostvnpay_php/index.php?ID='.$IDDH.'&tongtien='.$tongtien.'"); </script>';
										}else{
											echo'<script>alert ("Đặt hàng thành công!!!"); window.location.replace("http://localhostindex.php"); </script>';
										}
									}else{
										echo'<script>alert ("Hãy kiểm tra lại thông tin giao hàng!!");</script>';
									}
								}
								break;
							}
						}
					}
				?>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-Sauto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Tổng số giỏ hàng
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Tạm tính:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo $_SESSION['tongtien']; ?>  VNĐ
								</span>
							</div>
						</div>

						<form action="#" style="font-size: 16px;">
							<div class="flex-w flex-t bor12 p-t-15 p-b-30">
								<div class="form-group col-lg-12">
									<p class="stext-111 row p-t-2">Thông tin giao hàng:</p>
									<div class="p-t-15">
										<div class="row">
											<?php 
												$id = $_SESSION['maND'];
												$read->readExportAddess('http://localhostphp/api/exportAddess.php?user='.$id.''); 
											?>
											</select>
											<div class="col-lg-3"><button type="button" name="choose"  onclick="showmodal();" class="btn btn-info form-control">+</button></div>
										</div>
									</div>
								</div>
								<div class="form-group col-lg-12">
									<p class="stext-111 row p-t-2">Số điện thoại :</p>
									<div class="p-t-15 row">
										<input type="number" readonly id="phone" class="form-control col-lg-9" placeholder="Số điện thoại " name="phone">
									</div>
								</div>
								<div class="form-group col-lg-12">
									<p class="stext-111 row p-t-2">Mã giảm giá :</p>
									<div class="p-t-15">
										<div class="form-group row">
											<input type="text" class="form-control col-lg-9" placeholder="Voucher" id="voucher" name="Voucher" value="<?php echo $_SESSION['voucher']; ?>">
											<div class="col-lg-3">
												<button type="submit" class="btn btn-info  col-lg-12" name="check" value="check_VC" onclick="applyvoucher();" id="check_VC"><i class="fa fa-check"></i></button>
												<button type="submit" class="btn btn-info m-t-5 col-lg-12" name="check" value="cancel_vc"><i class="fa fa-trash-o"></i></button>
											</div>
											
										</div>
									</div>
									<?php
										switch ($_REQUEST['check']) {
											case 'check_VC':
											{
												$voucher = $_REQUEST['Voucher'];
												if($voucher){
													$check = $read->readCheck_VC('http://localhostphp/api/export_Voucher.php?Voucher='.$voucher.'');
													if($check !== 0){
														$_SESSION['voucher']=$voucher;
														$_SESSION['discount'] = $_SESSION['tongtien'] * $check;
														echo '<script>alert ("Mã giảm giá đã được thêm vào giỏ hàng!!!"); window.location.replace("http://localhostshoping-cart.php");</script>';
													}
												}else{
													echo '<script>alert ("Bạn cần nhập mã giảm giá!!!"); window.location.replace("http://localhostshoping-cart.php");</script>';
												}
												break;
											}
											case 'cancel_vc':
											{
												$_SESSION['discount'] = '';
												$_SESSION['voucher']='';
												echo '<script>alert ("Mã giảm giá đã được xóa khỏi giỏ hàng"); window.location.replace("http://localhostshoping-cart.php");</script>';
												break;
											}
										}
									?>
								</div>
								<div class="form-group col-lg-12">
									<p class="stext-111 row p-t-2">Hình thức thanh toán :</p>
									<div class="form-group row">
										<select class="form-control  col-lg-9" name="method">
											<option value="">Hình thức</option>
											<option value="1">Thanh toán trả sau</option>
											<option value="2">Thanh toán trả trước</option>
										</select>
									</div>
								</div>
							</div>
							<div class="flex-w flex-t p-t-27 p-b-10">
								<div class="size-228">
									<span class="mtext-120 cl2">
										Phí giao hàng
									</span>
								</div>
								<div class="size-189 p-t-1 p-l-5">
								: <?php echo 35000; ?>  VNĐ
								</div>
							</div>
							<div class="flex-w flex-t p-b-10">
								<div class="size-208">
									<span class="mtext-120 cl2">
										Tạm tính
									</span>
								</div>
								<div class="size-209 p-t-1 p-l-5">
								: <?php echo $_SESSION['tongtien'] + 35000; ?>  VNĐ
								</div>
							</div>
							<div class="flex-w flex-t p-b-10">
								<div class="size-208">
									<span class="mtext-120 cl2">
										Giảm giá
									</span>
								</div>
								<div class="size-209 p-t-1 p-l-5">
									: <?php echo $_SESSION['discount'] ?>  VNĐ
								</div>
							</div>
							<div class="flex-w flex-t p-t-27 p-b-10">
								<div class="size-208">
									<span class="mtext-120 cl2">
										Tổng đơn
									</span>
								</div>
								<div class="size-209 p-t-1 p-l-5">
									: <?php echo ($_SESSION['tongtien'] + 35000)- $_SESSION['discount']; ?>  VNĐ
								</div>
							</div>
							<button class="flex-c-m stext-101 cl0 size-116 bg3 m-t-20 bor14 hov-btn3 p-lr-15 trans-04" name="button" value="checkout">
								Thanh toán
							</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</form>
	<!-- model-address -->
	<div class="modal fade" style="z-index: 100000000000;" id="myModal">
		<div class="modal-dialog">
		<div class="modal-content">
		
			<!-- Modal Header -->
			<div class="modal-header">
			<h4 class="modal-title" style="font-size: 16px;">THÔNG TIN GIAO HÀNG</h4>
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<!-- Modal body -->
			<div class="modal-body">
			<form method="POST">
				<div class="row">
					<div class="col-6">
						<div class="form-group">
							<label for="sel1">Tỉnh/Thành phố:</label>
							<select class="form-control" id="city" name="city">
								<option></option>
								<?php $read->readExportCity('http://localhostphp/api/exportAddressVN.php'); ?>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="sel1">Quận/Huyện:</label>
							<select class="form-control" id="dis" name="dis">
								<option></option>
							</select>
						</div>
					</div>
				</div>
				<div class="row pt-3">
					<div class="col-6">
						<div class="form-group">
							<label for="sel1">Phường/Xã:</label>
							<select class="form-control" id="war" name="war">
								<option></option>
							</select>
						</div>
					</div>
					<div class="col-6">
						<div class="form-group">
							<label for="sel1">Số Nhà:</label>
							<input type="text" class="form-control" name="num">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="sel1">Số điện thoại:</label>
							<input type="text" name="phone" class="form-control">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="form-group">
							<label for="sel1">Email:</label>
							<input type="text" name="email" class="form-control">
						</div>
					</div>
				</div>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
			<button type="submit" class="btn btn-info" name="add_add" value="add1">Add Address</button>
			</div>
			<?php
				$add = $_POST['add_add'];
				if($add!=""){
					switch ($_POST['add_add']) {
						case 'add1':{
							$city = $_POST['city'];
							$dis = $_POST['dis'];
							$war = $_POST['war'];
							$phone = $_POST['phone'];
							$email = $_POST['email'];
							$num = $_POST['num'];
							$user = $_SESSION['maND'];
							if($city !='' && $dis!='' && $war!='' && $phone!='' && $email!='' && $num!=''){
								$p->Interactive("INSERT INTO `diachigiaohang` (`SoNha`, `Phuong`, `Quan`, `Tinh`, `SoDienThoai`, `ID_ND`, `Email`) VALUES ('$num', (SELECT name FROM `ward` WHERE wardid = $war), (SELECT name FROM `district` WHERE districtid = $dis), (SELECT name FROM `province` WHERE provinceid = $city), '$phone', '$user', '$email')");
								echo "<script>
									alert('Thêm địa chỉ giao hàng thành công');
								    window.location.replace('http://localhostshoping-cart.php');
								</script>";
							
							}
							break;
						}
						
					}
				}
			?>
			</form>
		</div>
		</div>
	</div>
	
	<!-- end-model-address -->
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Support
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								tư vấn mua hàng
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								đóng góp ý kiến - khiếu nại
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Chính sách
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								chính sách đổi - trả
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Chính sách bảo mật
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Chính sách bảo hành
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Tổng đài hỗ trợ
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								1800 77 1243
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								0967 122 784
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								0123 456 789
							</a>
						</li>
					</ul>

					
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						liên kết
					</h4>
					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>
			</div>

			
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
	<script type="text/javascript">
		function notify() {
			$.notify("Access granted", "success");
		}
	</script>
<!--===============================================================================================-->
	<script>
		$(document).ready(function(){
			$("#city").change(function(){
				var city = document.getElementById("city").value;
				if(city){
					$.post("test1.php",{city:city}, function(data){
						var data = '<option selected>Chon Huyen</option>'+ data;
						$('#dis').html(data);
					})
				}else{
					document.getElementById("dis").innerHTML = '<?php $read->readExportDis('http://localhostphp/api/exportAddressVN_Dis.php'); ?>';
				}
				document.getElementById("war").innerHTML = '<option selected>Chon Phuong/Xa</option>';
				$("#dis").change(function(){
					var dis = document.getElementById("dis").value;
					var city = document.getElementById("city").value;
					if(dis){
						$.post("test1.php",{dis:dis}, function(data){
							var data = '<option selected>Chon Phuong/Xa</option>'+ data;
							$('#war').html(data);
						})
					}else{
						document.getElementById("dis").innerHTML = '<?php $read->readExportDis('http://localhostphp/api/exportAddressVN_Dis.php'); ?>';
					}
				});
			});
		});
	</script>
	<script>
		$(document).ready(function(){
			$("#add").change(function(){
				var add = document.getElementById("add").value;
				var phone = document.getElementById(add).value;
				document.getElementById("phone").value = phone;
			});
		});
		function applyvoucher(){
			let voucher =  $('#voucher').val();
			if(voucher != ''){
				voucher.getAttribute('readonly');
			}
		}
		function showmodal(){
			let modal =  $('#add').val();
			if(modal == 'new'){
				$('#myModal').modal('show');
			}
		}
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>