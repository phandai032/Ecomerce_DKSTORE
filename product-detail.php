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
	<div class="container">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-130 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Trang chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<a href="product.php?ncc=<?php echo $p->exportNumOrder('select NhaCungCap as ID_DH from sanpham where ID_SP = '.$_REQUEST['IP'].''); ?>" class="stext-109 cl8 hov-cl1 trans-04">
				<?php echo $p->exportNumOrder('select NhaCungCap as ID_DH from sanpham where ID_SP = '.$_REQUEST['IP'].''); ?>
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>

			<span class="stext-109 cl4">
				<?php echo $p->exportNumOrder('select TenSanPham as ID_DH from sanpham where ID_SP = '.$_REQUEST['IP'].''); ?>
			</span>
		</div>
	</div>
		

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<?php
									$id =$_REQUEST['IP'];
									$read->readProductDetail_title("http://localhostphp/api/exportProductsDetail.php?IP=$id");
								?>
						<form action="#" method="get">
							<div class="p-t-33">
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
									Cấu hình
									</div>
									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="cauhinh">
												<option value="">Chọn cấu hình</option>
												<?php
													$id =$_REQUEST['IP'];
													$read->readExportsystem("http://localhostphp/api/exportsystem.php?IP=$id");
												?>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>
								<?php
									$id =$_REQUEST['IP'];
									echo'<input type="hidden" name="IP" value="'.$id.'">';
								?>
								<div class="flex-w flex-r-m p-b-10">
									<div class="size-203 flex-c-m respon6">
										Màu
									</div>
									<div class="size-204 respon6-next">
										<div class="rs1-select2 bor8 bg0">
											<select class="js-select2" name="mau">
												<option value=""i>Chọn màu</option>
												<?php
													$id =$_REQUEST['IP'];
													$read->readExportColor("http://localhostphp/api/exportcolor.php?IP=$id");
												?>
											</select>
											<div class="dropDownSelect2"></div>
										</div>
									</div>
								</div>

								<div class="flex-w flex-r-m p-b-10">
									<div class="size-204 flex-w flex-m respon6-next">
										<div class="wrap-num-product flex-w m-r-20 m-tb-10">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product" value="1">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>

										<button class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04 js-addcart-detail" name="button" value="add">
											Thêm vào giỏ hàng
										</button>
									</div>
								</div>	
							</div>
						</form>

						<!--  -->
						
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#information" role="tab">Thông tin sản phẩm</a>
						</li>

						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh giá</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">=

						<!-- - -->
						<div class="tab-pane fade " id="information" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<ul class="p-lr-28 p-lr-15-sm">
										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Hãng
											</span>

											<span class="stext-102 cl6 size-206">
											<?php echo $p->exportNumOrder('select NhaCungCap as ID_DH from sanpham where ID_SP = '.$_REQUEST['IP'].''); ?>
											</span>
										</li>

										<li class="flex-w flex-t p-b-7">
											<span class="stext-102 cl3 size-205">
												Năm phát hành
											</span>

											<span class="stext-102 cl6 size-206">
											<?php echo $p->exportNumOrder('select NamPhatHanh as ID_DH from sanpham where ID_SP = '.$_REQUEST['IP'].''); ?>
											</span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade show active" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<?php
											$id_sp = $_REQUEST['IP'];
											$read->readExportReview('http://localhostphp/api/review.php?IP='.$id_sp.'');
										?>
										
										<!-- Add review -->
										<form class="w-full" method="POST">
											<h5 class="mtext-108 cl2 p-b-7">
												Thêm đánh giá
											</h5>

											<p class="stext-102 cl6">
												Bạn hay đánh giá khách quan trải nghiệm khi dùng sản phẩm của DK-STORE*
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Điểm đánh giá
												</span>
												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
											</div>
											<?php
												$id =$_REQUEST['IP'];
												echo'<input type="hidden" name="IP" value="'.$id.'">';
											?>
											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Đánh giá của bạn</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review"></textarea>
												</div>
												<div class="col-sm-12 p-b-5">
													<label class="stext-102 cl3" for="name">Tên người dùng</label>
													<input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name" type="text" readonly value="<?php echo $_SESSION['current_user']; ?>" name="name">
												</div>
											</div>
											<button value="review" name="btn" class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
												Đánh giá
											</button>
											<?php
												
													if($_REQUEST['btn'] != '' or $_REQUEST['button'] != ''){
														if(isset($_SESSION['current_user'])){
															switch ($_REQUEST['button']) {
																case 'add':
																	{
																		if($_REQUEST['mau'] != '' && $_REQUEST['cauhinh'] !=''){
																			$soluong = $_REQUEST['num-product'];
																			$id = $_REQUEST['IP'];
																			$id_cauhinh = $_REQUEST['cauhinh'];
																			$id_mau = $_REQUEST['mau'];
																			$id_nd = $_SESSION['maND'];
																			$m = $p->exportNumOrder('select ID_CTSP as ID_DH from chitietsanpham ctsp join sanpham sp on sp.ID_SP = ctsp.ID_SP where sp.ID_SP = '.$id.' and ID_Mau = '.$id_mau.' and ID_CauHinh = '.$id_cauhinh.'');
																			$k = $p->exportNumOrder('select SoLuong as ID_DH from chitietsanpham ctsp join sanpham sp on sp.ID_SP = ctsp.ID_SP where ctsp.ID_CTSP = '.$m.'');
																			if($k >= $soluong){
																				if($p->Interactive("INSERT INTO `giohang` (`ID_ND`, `ID_CTSP`, `SoLuong`) VALUES ('$id_nd',(select ID_CTSP from chitietsanpham where ID_SP = $id && ID_Mau = $id_mau && ID_CauHinh = $id_cauhinh), $soluong)")){
																					$_SESSION['number_cart']=$_SESSION['number_cart']+1;
																					echo'<script>alert ("Sản phẩm đã được thêm vào giỏ hàng!");history.go(-1); </script>';
																				}else{
																					echo'<script>alert ("Sản phẩm không thêm được giỏ hàng!"); history.go(-1);</script>';
																				}
																			}else{
																				echo'<script>alert ("Số lượng trong kho không đủ");history.go(-1);</script>';
																			}
																		}else{
																			echo'<script>alert ("Bạn vui lòng chọn phiên bản"); history.go(-1);</script>';
																		}
																			
																		break;
																	}
																}
															switch ($_REQUEST['btn']) {
																case 'review':
																	{
																		$IP = $_POST['IP'];
																		$nguoidung = $_SESSION['maND'];
																		$rate = $_POST['rating'];
																		$review = $_POST['review'];
																		$name = $_POST['name'];
																		if($review!= ''&& $rate != ''){
																			if($p->Interactive('INSERT INTO `chitietdanhgia` (`ID_SP`, `ID_ND`, `NoiDung`, `DanhGia`, ThoiGian) VALUES ('.$IP.','.$nguoidung.',"'.$review.'",'.$rate.', NOW())')){
																				echo '<script>window.location.replace("product-detail.php?IP='.$IP.'"); </script>';
																			}else{
																				echo '<script>
																							alert ("Bạn đã đánh giá tại sản phẩm từ trước"); 
																					</script>';
																			}
																			
																		}else{
																			echo '<script>alert ("Bạn cần điền đủ thông tin để đánh giá "); window.location.replace("product-detail.php?IP='.$IP.'"); </script>';
																		}
																		break;
																	}
															}
														}else{
															echo'<script>alert ("Bạn cần đăng nhập để thực hiện"); window.location.replace("login.php"); </script>';
														}
													}
												
												?>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Hỗ Trợ
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
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/slick/slick.min.js"></script>
	<script src="js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').php();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').php();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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
