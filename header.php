<?php
	session_start();
	include_once './php/readAPI/conectAPI.php';
	include_once './php/style/style.php';
	$p = new app();
	$read = new api1();
?>
<?php
    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
        <title>Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!--===============================================================================================-->	
        <link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
                                    <a href="index.php">Home</a>
                                </li>
    
                                <li>
                                    <a href="product.php">Products</a>
                                    <ul class="sub-menu">
                                        <li><a href="product_apple.php">APPLE</a></li>
                                        <li><a href="#">XIAOMI</a></li>
                                        <li><a href="product_samsung.php">SAMSUNG</a></li>
                                        <li><a href="#">REALME</a></li>
                                        <li><a href="product_oppo.php">OPPO</a></li>
                                        <li><a href="#">MORE</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="product.php">Accessories</a>
                                    <ul class="sub-menu">
                                        <li><a href="#">PhoneCase</a></li>
                                        <li><a href="#">HeadPhones</a></li>
                                        <li><a href="#">Battery Charger Cases</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="blog.php">Blog</a>
                                </li>
    
                                <li>
                                    <a href="about.php">About</a>
                                </li>
    
                                <li>
                                    <a href="contact.php">Contact</a>
                                </li>
                            </ul>
                        </div>	
                        <!-- Cart -->
                        <div class="wrap-header-cart js-panel-cart">
                            <div class="s-full js-hide-cart"></div>
    
                            <div class="header-cart flex-col-l p-l-65 p-r-25">
                                <div class="header-cart-title flex-w flex-sb-m p-b-8">
                                    <span class="mtext-103 cl2">
                                        Your Cart
                                    </span>
                                    <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                                        <i class="zmdi zmdi-close"></i>
                                    </div>
                                </div>
                                
                                <div class="header-cart-content flex-w js-pscroll">
                                    <ul class="header-cart-wrapitem w-full">';
    $id = $_SESSION["maND"];
	$read->readCart("http://localhostphp/api/exportCart.php?id=$id");
    echo '</div>
    </div>
    <!-- Icon header -->
    <div class="wrap-icon-header flex-w flex-r-m m-l-100">
        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
            <i class="zmdi zmdi-search"></i>
        </div>

        <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="';
        echo $_SESSION['number_cart'];
    echo'">
            <i class="zmdi zmdi-shopping-cart"></i>
        </div>';
    if(isset($_SESSION['current_user'])){
        echo '<ul class="nav nav-pills">
        <li class="nav-item dropdown">
        <a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle" data-toggle="dropdown" data-notify="0"><span>'.$_SESSION['name'].'</span></a>
            <div class="dropdown-menu ml-3">
            <a class="dropdown-item" href="account_management.php?ping=1">Export Login Code</a>
            <a class="dropdown-item" href="account_management.php?ping=2">Account Management</a>
            <a class="dropdown-item" href="order_management.php?ping=3">Order Management</a>
            <a class="dropdown-item" href="http://localhostlogin_gg/logout.php">Logout</a></div>
        </li>
        </ul>';
    }else{
        echo '<a href="login.php" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" data-notify="0"><i class="zmdi zmdi-account"></i></a>';
    }
    echo '</div>
    </nav>
</div>	
</div>';
?>
