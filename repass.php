<?php
	session_start();
	include_once './php/readAPI/conectAPI.php';
	include_once './php/style/style.php';
	$p = new app();
	$read = new api1();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>DK-STORE</title>
  <meta name="description" content="particles.js is a lightweight JavaScript library for creating particles.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<!--===============================================================================================-->	
  <link rel="stylesheet" media="screen" href="./login/demo/css/style.css">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="./images/logo.png"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
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
<!--===============================================================================================-->
</head>
<body>
<!-- particles.js container -->
<div id="particles-js">
  <header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<img src="images/logo_new.png" alt="IMG-LOGO">
					</a>
					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							
						</div>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-cart" data-notify="2">
							
						</div>

						<a href="login.php" class="dis-block  font icon-header-item cl2 hov-cl1 trans-01 p-l-22 p-r-11" data-notify="0">
							<ins>Trở về <i class="zmdi zmdi-sign-in"></i></ins>
						</a>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile ">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10" data-notify="0">
					<i class="zmdi zmdi-account"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>
	</header>
    <div class="row register pt-5 pb-5  font">
      <div class="col-2"></div>
      <div class="col-8">
        <form>
          <div class="row">
            <div class="col-12 input-login">
              <h2 class="text-center text-info">QUÊN MẬT KHẨU</h2>
            </div><br><br>
            <div class="col-12 input-login">
              <input type="email" class="form-control" placeholder="Email" name="email">
            </div><br><br>
            <div class="col-12">
              <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                  <button class="btn btn-light col-10 text-info ml-3" name="button" value="reset">Gửi</button>
                </div>
              </div>
            </div>
          </div>
		<?php
			if(isset($_REQUEST['button'])){
				switch($_REQUEST["button"]){
					case 'reset':{
						$mail= $_REQUEST['email'];
						$k = $p->checkUser('select*from nguoidung where Email = "'.$mail.'"');
						if($k == 0){
							echo '<script>alert ("You have not registered an account with this email !!!"); window.location.replace("repass.php"); </script>';
						}else{
							$user = $p->exportNumOrder('select User as ID_DH from nguoidung where Email = "'.$mail.'"');
							require_once "mail/PHPMailer/src/PHPMailer.php";
							require_once "mail/PHPMailer/src/SMTP.php";
							require_once "mail/PHPMailer/src/Exception.php";
					
								$mail = new PHPMailer\PHPMailer\PHPMailer();
								$mail->IsSMTP(); // enable SMTP
								$mail->SMTPAuth = true; // authentication enabled
								$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
								$mail->Host = "smtp.gmail.com";
								$mail->Port = 465; // or 587
								$mail->IsHTML(true);
								$mail->Username = "dkstore102@gmail.com";
								$mail->Password = "cblxwzdkxgtcfzie";
								$mail->SetFrom("dkstore102@gmail.com");
								$mail->Subject = "RESET PASSWORD WEBSITE DKSTORE";
								$MESSAGER = "<span>User :".$user."</span></br>"."<p>Link repass :http://localhostchange.php?action=repass&token=".md5($user)."</p>";
								$mail->Body = $MESSAGER;
								$mail->AddAddress($_REQUEST['email']);
					
								if(!$mail->Send()) {
									echo "Mailer Error: " . $mail->ErrorInfo;
								} else {
									echo "Message has been sent";
								}
						}
					}
				}
			}
		?>
        </form>
      </div>
      <div class="col-2"></div>
    </div>
</div>

<!-- scripts -->
<script src="./login/demo/js/lib/particles.js"></script>
<script src="./login/demo/js/app.js"></script>

<!-- stats.js -->
<script src="./js/lib/stats.js"></script>
</body>
</html>