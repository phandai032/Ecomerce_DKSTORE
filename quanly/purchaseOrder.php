<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
  $read->readExportStatus('http://localhostphp/api/num_status_order.php');
  if(isset($_SESSION["phanquyen"])){
		$read->check_permission(7);
	}else{
    echo'<script>window.location.replace("../login.php"); </script>';
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="DkStore, DkPhone">
  <title>DK STORE - Thế giới điện thoại</title>
  <!-- Favicons -->
  <link href="../images/logo.png" rel="icon">
  <link href="../images/logo.png" rel="apple-touch-icon">
  <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
  <!--===============================================================================================-->
  <!-- Bootstrap core CSS -->
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="../css/style.css" rel="stylesheet">
  <link href="../css/style-responsive.css" rel="stylesheet">
  <script src="../lib/chart-master/Chart.js"></script>
  <style>
    input[type="date"]::-webkit-datetime-edit, input[type="date"]::-webkit-inner-spin-button, input[type="date"]::-webkit-clear-button {
      color: #fff;
      position: relative;
    }

    input[type="date"]::-webkit-datetime-edit-year-field{
      position: absolute !important;
      padding: 2px;
      color:#000;
      left: 56px;
    }

    input[type="date"]::-webkit-datetime-edit-month-field{
      position: absolute !important;
      padding: 2px;
      color:#000;
      left: 26px;
    }


    input[type="date"]::-webkit-datetime-edit-day-field{
      position: absolute !important;
      color:#000;
      padding: 2px;
      left: 4px;
      
    }
    .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 40%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      text-align: center;
    }

    .container:hover .image {
      opacity: 0.5;
    }

    .container:hover .middle {
      opacity: 1;
    }

    .text {
      color: black;
      font-size: 16px;
      padding: 16px 32px;
    }
    .cao{
      height: 300px;
    }
    .bg0{
      background-color: #111;
    }
    #upload {
    opacity: 1;
    }
    #upload1 {
    opacity: 1;
    }

    #upload-label {
        position: absolute;
        top: 50%;
        left: 1rem;
        transform: translateY(-50%);
    }

    .image-area {
        padding: 1rem;
        position: relative;
    }

    .image-area img {
        z-index: 2;
        position: relative;
    }
  </style>
</head>
<body>
<section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header bg-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo"><b>DKSTORE<span>Quản lý cửa hàng</span></b></a>
      <?php
        include_once '../nav.php';
      ?>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="../profile.php"><img src="../images/user_admin.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION["fname"] ." ". $_SESSION["name"]; ?></h5>
          <li class="mt"  >
            <a  href="index.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Bảng điều khiển</span>
            </a>
          </li>
          <li >
            <a href="productManagement.php">
              <i class="fa fa-archive"></i>
              <span>Quản lý sản phẩm</span>
            </a>
          </li>
          <li >
            <a href="staffManagement.php">
              <i class="fa fa-users"></i>
              <span>Quản lý nhân sự</span>
            </a>
          </li>
          <li >
            <a href="eventManager.php">
              <i class="fa fa-calendar-o"></i>
              <span>Quản lý sự kiện</span>
            </a>
          </li>
          <li >
            <a href="voucherManagement.php">
              <i class="fa fa-cc"></i>
              <span>Quản lý mã giảm giá</span>
            </a>
          </li>
          <li >
            <a href="javascript:;">
              <i class="fa fa-shopping-bag"></i>
              <span>Quản lý mua hàng</span>
            </a>
            <ul class="sub">
							<li><a  href="purchase_manager.php" > &nbsp;&nbsp; Tạo đơn mua hàng</a></li>
							<li><a class="pb-4"  href="purchaseTrantion.php" > &nbsp;&nbsp;Quản lý đơn mua hàng</a></li>
							<li></li>
            </ul>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <form method="POST" enctype="multipart/form-data" id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 680px;" id="myList">
                  <?php
                    $id= $_REQUEST['id'];
                    $date = $_REQUEST['date'];
                    $_SESSION['id']= $id;
                    $_SESSION['date']=$date;
                    $read->readExportPurchaseDetail('http://localhostphp/api/exportPorchaseDetail.php?ql=1&id='.$_SESSION['id'].'');
                  ?>
                  </div>
                </section>
              </div>
            </div>
            <!-- /col-lg-9 END SECTION MIDDLE -->
            <!-- **********************************************************************************************************************************************************
                RIGHT SIDEBAR CONTENT
                *********************************************************************************************************************************************************** -->
            <div class="col-lg-3 ds">
              <!-- First Activity -->
                <div id="trang" class="desc">
                    <div class="row m-t-300"></div>
                    <?php
                      $k = $p->exportNumOrder('select TrangThai as ID_DH from donmuahang where ID_DM = '.$_SESSION['id'].'');
                      if($k == 2){
                        echo '<button id="btn6" name="btn" value="Cancel" class="btn btn-info col-lg-12 m-t-10"> Trở về </button>';
                      }else{
                        echo '<a id="btn7" class="btn btn-info col-lg-12 m-t-10" href="purchaseBill.php" style="color:white;" > In hóa đơn</a>
                              <button id="btn7" name="btn" value="update" class="btn btn-info col-lg-12 m-t-10"> Gửi </button>
                              <button id="btn6" name="btn" value="Cancel" class="btn btn-info col-lg-12 m-t-10"> Trở về </button>';
                      }
                    ?>
                    
                </div>
            </div>
            <?php
              switch ($_REQUEST['btn']) {
                case 'update':{
                  $tmail=$_POST['tmail'];
                  $id =$_SESSION['id'];
                  require_once "../mail/PHPMailer/src/PHPMailer.php";
                  require_once "../mail/PHPMailer/src/SMTP.php";
                  require_once "../mail/PHPMailer/src/Exception.php";
                  $mail = new PHPMailer\PHPMailer\PHPMailer();
                  $mail->IsSMTP(); // enable SMTP
                  $mail->SMTPDebug = 0;
                  $mail->SMTPAuth = true; // authentication enabled
                  $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
                  $mail->Host = "smtp.gmail.com";
                  $mail->Port = 465; // or 587
                  $mail->IsHTML(true);
                  $mail->Username = "dkstore102@gmail.com";
                  $mail->Password = "cblxwzdkxgtcfzie";
                  $mail->SetFrom("dkstore102@gmail.com");
                  $mail->Subject = "PURCHASE ORDER DKSTORE -". date_default_timezone_get();
                  $MESSAGER = "<h1>DKSTORE - Thế giới điện thoại</h1> </br> <p>Địa chỉ : 334 Chu Van An, Phuong 12, Binh Thanh, Ho Chi Minh</p></br><p>Điện thoại : +84 967 122 784</p><p>Đơn mua hàng đến từ cửa hàng DKSTORE</p>";
								  $mail->Body = $MESSAGER;
                  $file = '../pdf/PO/PO_'.$id.'.pdf';
                  $mail->addAttachment($file, 'PO_DKSTORE.pdf');
                  $mail->AddAddress($tmail);
                  $time = date('H:i d-m-Y');
                  if(!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                  } else {
                    $p->Interactive('update donmuahang set ThuNhan = "'.$tmail.'", ThuGui ="dkstore102@gmail.com" where ID_DM = '.$id.'');
                    $p->Interactive('UPDATE donmuahang set TrangThai =  2 where ID_DM = '.$id.'');
                    $p->Interactive('UPDATE donmuahang SET note = CONCAT(note,"\n ==> '.$time.' Hóa đơn mua hàng đã được gửi đến cho địa chỉ mail :'.$tmail.'") where ID_DM = '.$id.';');
                    echo '<script>alert("Gửi hóa đơn mua hàng thành công"); window.location.replace("http://localhostquanly/purchaseTrantion.php");</script>';
                  }
                  break;
                }
                case 'Cancel':{
                  echo '<script>window.location.replace("http://localhostquanly/purchaseTrantion.php");</script>';
                }
              }
            ?>
          </div>
        </section>
      </section>
    </form>

  <script src="../lib/jquery/jquery.min.js"></script>

<script src="../lib/bootstrap/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="../lib/jquery.scrollTo.min.js"></script>
<script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="../lib/jquery.sparkline.js"></script>
<script src="../lib/raphael/raphael.min.js"></script>
<!--common script for all pages-->
<script src="../lib/common-scripts.js"></script>
<script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="../lib/gritter-conf.js"></script>
<script type="text/javascript" src="../lib/morris/morris.min.js"></script>
<script type="text/javascript" src="../lib/morris-conf.js"></script>
<link rel="stylesheet" href="http://cdn.oesmith.co.uk/morris-0.4.3.min.css">
<!--script for this page-->
<script src="../lib/sparkline-chart.js"></script>
<script src="../lib/zabuto_calendar.js"></script>
<script src="../lib/chartjs-conf.js"></script>
<script src="../lib/canvasjs.min.js"></script>
<script>
    document.getElementById('copy').addEventListener('click', ()=>{
    /* document.getElementById('copyArea').select();
    document.execCommand('copy'); */
    let copyArea = document.getElementById('copyArea');
    navigator.clipboard.writeText(copyArea.value);
});
</script>
<script>
  let btn = $('#btn').val();
  if(btn == 1){
    $('#btn4').hide();
    $('#btn2').hide();
    $('#btn5').hide();
    $('#btn6').hide();
    $('#btn7').hide();
    let trang = document.getElementById('trang');
    trang.classList.add('m-t-145');
  }else if(btn ==2){
    $('#btn1').hide();
    $('#btn7').hide();
    $('#btn4').hide();
    let trang = document.getElementById('trang');
    trang.classList.add('m-t-145');
  }else if(btn == 3){
    $('#btn1').hide();
    $('#btn2').hide();
    $('#btn5').hide();
    $('#btn7').hide();
    let trang = document.getElementById('trang');
    trang.classList.add('m-t-125');
  }
  else if(btn == 4){
    $('#btn1').hide();
    $('#btn2').hide();
    $('#btn4').hide();
    $('#btn5').hide();
    let trang = document.getElementById('trang');
    trang.classList.add('m-t-125');
  }
</script>
<script type="application/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
  }
  function readURL1(input1) {
    if (input1.files && input1.files[0]) {
        var reader1 = new FileReader();

        reader1.onload = function (e) {
            $('#imageResult1')
                .attr('src', e.target.result);
        };
        reader1.readAsDataURL(input1.files[0]);
    }
  }
  $(function () {
      $('#upload').on('change', function () {
          readURL(input);
      });
  });
  $(function () {
      $('#upload1').on('change', function () {
          readURL1(input);
      });
  });
  var input = document.getElementById( 'upload' );
  var infoArea = document.getElementById( 'upload-label' );
  var input1 = document.getElementById( 'upload1' );
  var infoArea1 = document.getElementById( 'upload-label1' );
  input.addEventListener( 'change', showFileName );
  function showFileName( event ) {
    var input = event.srcElement;
    var fileName = input.files[0].name;
    infoArea.textContent = 'File name: ' + fileName;
  }
  function showFileName1( event ) {
    var input1 = event.srcElement;
    var fileName1 = input1.files[0].name;
    infoArea1.textContent = 'File name: ' + fileName1;
  }
  
  $(document).ready(function() {
    
    $("#date-popover").popover({
      html: true,
      trigger: "manual"
    });
    $("#date-popover").hide();
    $("#date-popover").click(function(e) {
      $(this).hide();
    });

    $("#my-calendar").zabuto_calendar({
      action: function() {
        return myDateFunction(this.id, false);
      },
      action_nav: function() {
        return myNavFunction(this.id);
      },
      ajax: {
        url: "show_data.php?action=1",
        modal: true
      },
      legend: [{
          type: "text",
          label: "Special event",
          badge: "00"
        },
        {
          type: "block",
          label: "Regular event",
        }
      ]
    });
  });

  function myNavFunction(id) {
    $("#date-popover").hide();
    var nav = $("#" + id).data("navigation");
    var to = $("#" + id).data("to");
    console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
  }
</script>
</body>

</html>