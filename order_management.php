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
	<div class="container p-t-100">
		<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
			<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
				Trang Chủ
				<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
			</a>
			<span class="stext-109 cl4">
				Quản lý đơn hàng
			</span>
		</div>
	</div>
	<!-- Shoping Cart -->
	<section class="sec-product-detail bg0 p-t-20 p-b-20">
		<div class="container">
		<form class="bg0 p-t-15 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-lg-7 col-xl-3 m-lr-auto m-b-50 mt-2 bor14">
					<div class="bor10 m-r-40 m-lr-0-xl bor14">
						<div class="list-group">
							<a href="?dh=1" class="list-group-item bg6 list-group-item-action">Đơn hàng đang chờ xử lý</a>
							<a href="?dh=2" class="list-group-item bg6 list-group-item-action">Đơn hàng đã xử lý</a>
							<a href="?dh=3" class="list-group-item bg6 list-group-item-action">Đơn hàng đã nhận</a>
							<a href="?dh=4" class="list-group-item bg6 list-group-item-action">Đơn hàng đã hủy</a>
							<a href="?dh=0" class="list-group-item bg6 list-group-item-action">Tất cả đơn hàng</a>
						</div>
					</div>
				</div>
				<div class="col-lg-11 col-xl-9 bg6 bor14 pt-3">
				<form action="#" method="POST">
                <div class=" m-lr-0-xl">
                    <div >
						
						<?php
							if(isset($_REQUEST['button']))
							{
								switch($_REQUEST['button']){
									case 'view':
										{
											$id = $_REQUEST["id"];
											$read->ReadDetail("http://localhostphp/api/exportdetail.php?id=$id",$id);
											break;
										}
									case 'cancel':{
										$id = $_REQUEST["id"];
										$p->Interactive("update donhang set TrangThai = 8  where ID_DH = $id");
										echo'<script>alert ("Hủy đơn hàng thành công!!!"); window.location.replace("order_management.php?dh=1"); </script>';
										break;
									}
								}
							}
							else{
								$id = $_SESSION["maND"];
								$dh = $_REQUEST['dh'];
								$read->readOrder("http://localhostphp/api/exportorder.php?dh=$dh&mand=$id");
							}
						?>
                    </div>
                <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                    <div class="flex-w flex-m m-r-20 m-tb-5 bg-secondary">
                    </div>
                </div>
            </div>
            </form>
				</div>
			</div>
		</div>
	</form>
			</div>
	</section>
  </div>				
	


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