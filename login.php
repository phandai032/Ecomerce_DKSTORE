<?php
	session_start();
	include_once './php/readAPI/conectAPI.php';
	include_once './php/style/style.php';
	$p = new app();
	$read = new api1();
  if(isset($_SESSION["phanquyen"])){
    $read->phanquyen($_SESSION["phanquyen"],$_SESSION["username"]);
  }
?>
<?php
  require_once ('./login_gg/Google/libraries/Google/autoload.php');

  //Insert your cient ID and secret 
  //You can get it from : https://console.developers.google.com/
  $client_id = '1007906964730-1lgni9jrvgl1qelgvnvhvefskblkpskf.apps.googleusercontent.com';
  $client_secret = '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';
  $redirect_uri = 'http://localhostlogin.php';
  
  //incase of logout request, just unset the session var
  //if (isset($_GET['logout'])) {
  //    unset($_SESSION['access_token']);
  //}
  
  /* * **********************************************
    Make an API request on behalf of a user. In
    this case we need to have a valid OAuth 2.0
    token for the user, so we need to send them
    through a login flow. To do this we need some
    information from our API console project.
   * ********************************************** */
  $client = new Google_Client();
  $client->setClientId($client_id);
  $client->setClientSecret($client_secret);
  $client->setRedirectUri($redirect_uri);
  $client->addScope("email");
  $client->addScope("profile");
  
  /* * **********************************************
    When we create the service here, we pass the
    client to it. The client then queries the service
    for the required scopes, and uses that when
    generating the authentication URL later.
   * ********************************************** */
  $service = new Google_Service_Oauth2($client);
  
  /* * **********************************************
    If we have a code back from the OAuth 2.0 flow,
    we need to exchange that with the authenticate()
    function. We store the resultant access token
    bundle in the session, and redirect to ourself.
   */
  
  if (isset($_GET['code'])) {
      $client->authenticate($_GET['code']);
      $_SESSION['access_token'] = $client->getAccessToken();
      header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
      exit;
  }
  /* * **********************************************
    If we have an access token, we can make
    requests, else we generate an authentication URL.
   * ********************************************** */
  if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
      $client->setAccessToken($_SESSION['access_token']);
  } else {
      $authUrl = $client->createAuthUrl();
  }
  if ($client->isAccessTokenExpired()) {
      $authUrl = $client->createAuthUrl();
  //            header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
  }
  
  
if (!isset($authUrl)) {
  $googleUser = $service->userinfo->get(); //get user info 
  if(!empty($googleUser)){
      function loginFromSocialCallBack($socialUser) {
          $con = mysqli_connect("localhost","lmrxuhgi","PmZMLweFR86TiQZ","lmrxuhgi_dkstore");
          $con->set_charset("utf8");
          if (mysqli_connect_errno()) {
              echo "Connection Fail: " . mysqli_connect_errno();
              exit;
          }
          $result = mysqli_query($con, "Select * from `nguoidung` WHERE `Email` ='" . $socialUser['email'] . "'");
          if ($result->num_rows == 0) {
              $result = mysqli_query($con, "INSERT INTO `nguoidung` (User,Pass,Ten,`Email`, `PhanQuyen`) VALUES ( '" . $socialUser['email'] . "',md5('123456'),'" . $socialUser['name'] . "', '" . $socialUser['email'] . "', 1);");
              include"./phpqrcode/qrlib.php";
              $folderTemp ="./gbrqrcode/";    
              $a = "http://localhostlogin.php?user=";
              $b = md5('123456');
              $e = $user;
              $c = $a."&pass=".$b."&button=login";
              $d = $e.".png";
              $qual = 'H';
              $size = 3;
              $padding = 2;
              QRCode :: png($c,$folderTemp.$d,$qual,$size,$padding);
              if (!$result) {
                  echo mysqli_error($con);
                  exit;
              }
              $result = mysqli_query($con, "Select * from `nguoidung` WHERE `Email` ='" . $socialUser['email'] . "'");
          }
          if ($result->num_rows > 0) {
              $user = mysqli_fetch_assoc($result);
              if (session_status() == PHP_SESSION_NONE) {
                  session_start();
              }
              $explode_fullname = explode(' ', $socialUser['name']);
              $_SESSION['current_user'] = $user;
              $_SESSION['name'] =$explode_fullname[count($explode_fullname) - 1];
              $_SESSION['username']=$socialUser['email'];
              $_SESSION['phanquyen'] = 1;
              $mand = mysqli_query($con, "Select ID_ND from `nguoidung` WHERE `User`='".$socialUser['email']."'");
              $row = mysqli_fetch_array($mand);
              $_SESSION['maND'] = $row['ID_ND'];
              header('Location: ./account_management.php');
          }
      }
      
      function validateDateTime($date) {
          //Kiểm tra định dạng ngày tháng xem đúng DD/MM/YYYY hay chưa?
          preg_match('/^[0-9]{1,2}-[0-9]{1,2}-[0-9]{4}$/', $date, $matches);
          if (count($matches) == 0) { //Nếu ngày tháng nhập không đúng định dạng thì $match = array(); (rỗng)
              return false;
          }
          $separateDate = explode('-', $date);
          $day = (int) $separateDate[0];
          $month = (int) $separateDate[1];
          $year = (int) $separateDate[2];
          //Nếu là tháng 2
          if ($month == 2) {
              if ($year % 4 == 0) { //Nếu là năm nhuận
                  if ($day > 29) {
                      return false;
                  }
              } else { //Không phải năm nhuận
                  if ($day > 28) {
                      return false;
                  }
              }
          }
          //Check các tháng khác
          switch ($month) {
              case 1:
              case 3:
              case 5:
              case 7:
              case 8:
              case 10:
              case 12:
                  if ($day > 31) {
                      return false;
                  }
                  break;
              case 4:
              case 6:
              case 9:
              case 11:
                  if ($day > 30) {
                      return false;
                  }
                  break;
          }
          return true;
      }
      loginFromSocialCallBack($googleUser);
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>DKSTORE - ĐĂNG NHẬP</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/styles/metro/notify-metro.css" />
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
              <a href="index.php" class="dis-block icon-header-item cl2 hov-cl1 trans-01 p-l-22 p-r-11 font">
                <ins>Trở về <i class="zmdi zmdi-sign-in font"></i></ins>
              </a>
            </div>
          </nav>
        </div>	
      </div>
    </header>
   <!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><img src="images/logo_new.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
			<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							
			</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				
			</div>
		</div>
    <div class="row login pt-4 pb-5 font">
      <div class="col-2  col-sm-2 login1"></div>
      <div class="col-8 col-sm-8">
        <form>
          <div class="row">
            <div class="col-12 input-login">
              <h2 class="text-center text-info font"><b>ĐĂNG NHẬP</b></h2>
            </div><br><br>
            <div class="col-12 input-login">
              <input type="text" class="form-control" id="email" placeholder="Nhập tài khoản ..." name="username">
            </div><br><br>
            <div class="col-9 input-login">
              <input type="password" class="form-control" id="typepass" placeholder="Nhập mật khẩu ..." name="pass">
            </div><br><br>
            <div class="col-2 input-login">
              <button class="btn bg-light" type="button" onclick="Toggle()"><i class="fa fa-eye"></i></button>
            </div><br><br>
            <div class="col-12">
              <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-5">
                  <button class="btn btn-light col-lg-12 text-info" name="button" value="login"><i class="zmdi zmdi-account"></i> | Đăng nhập</button>
                </div>
                <div class="col-lg-5 btn-regis">
                  <a href="register.php" class="btn btn-light col-lg-12 text-info"><i class="zmdi zmdi-account-add"></i> | Đăng ký</a>
                </div>
              </div>
            </div>
            <div class="col-lg-12 mt-4">
              <div class="row">
                <div class="col-lg-4"><a class="btn btn-light col-lg-12 text-info" href="qrcode.php"><i class="fa fa-qrcode" aria-hidden="true"></i> | Quét mã</a></div>
                <div class="col-lg-4"><a href="<?= $authUrl ?>" class="btn btn-light col-lg-12 text-info"><i class="zmdi zmdi-google"></i> | GOOGE</a></div>
                <div class="col-lg-4 pt-1"><a href="repass.php"><i style="font-size:13px;">Quên mật khẩu?</i></a></div>
                
              </div>
            </div>
          </div>
        </form>
      </div>
      <div class="col-2"></div>
    </div>
</div>
<?php
    if(isset($_REQUEST['button'])){
      switch($_REQUEST['button']){
          case 'login':{
            $user =$_REQUEST['username'];
            $pass = $_REQUEST['pass'];
            if($user!=''&&$pass!=''){
              $read->readLogin("http://localhostphp/api/exportCustomer.php?username=$user&pass=$pass");
            }else{
                echo '<script>
                    alert("Bạn cần điền thông tin để đăng nhập !!");
                </script>';
            }
            break;
          }
        }
    }
        
    
?>
<!-- scripts -->
<script src="./login/demo/js/lib/particles.js"></script>
<script src="./login/demo/js/app.js"></script>

<script>
    // Change the type of input to password or text
        function Toggle() {
            var temp = document.getElementById("typepass");
            if (temp.type === "password") {
                temp.type = "text";
            }
            else {
                temp.type = "password";
            }
        }
</script>
<!-- stats.js -->
<script src="./js/lib/stats.js"></script>
<!--===============================================================================================-->	
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>
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
  <script type="text/javascript">
		function notify() {
			$.notify("Access granted", "success");
		}
	</script>
<!--===============================================================================================-->
	<script src="vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/sweetalert/sweetalert.min.js"></script>
	
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