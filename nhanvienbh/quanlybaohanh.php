<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
  $read->readExportStatus('http://localhostphp/api/num_status_order.php');
  if(isset($_SESSION["phanquyen"])){
		$read->check_permission(4);
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
  <script src="../js/html5-qrcode.min_.js"></script>
  <style>
  .result{
    background-color: green;
    color:#fff;
    padding:20px;
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
      <a href="index.php" class="logo"><b>DKSTORE<span>Nhân viên bán hàng</span></b></a>
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
            <a class="active" href="index.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Bảng điểu khiển</span>
            </a>
          </li>
          <li >
            <a href="javascript:;">
              <i class="fa fa-archive"></i>
              <span>Quản lý đơn hàng</span>
              </a>
            <ul class="sub">
							<li><a  href="Order_processing.php?dh=1" > &nbsp;&nbsp; Đơn hàng chờ xử lý</a></li>
							<li><a  href="Order_processing.php?dh=2" > &nbsp;&nbsp; Đơn hàng đã hủy</a></li>
							<li><a  href="Order_processing.php?dh=3" > &nbsp;&nbsp; Tất cả đơn hàng</a></li>
            </ul>
          </li>
          <li>
            <a href="eventManager.php">
              <i class="fa fa-history"></i>
              <span>Quản lý tin tức</span>
              </a>
          </li>
          <li>
            <a href="quanlybaohanh.php">
              <i class="fa fa-ticket"></i>
              <span>Quản lý bảo hành</span>
              </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <div id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="flex-w flex-sb-m  m-tb-10">
                    <div  class="flex-w flex-l-m filter-tope-group"></div>
                  </div>
                  
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 650px;" id="myList">
                  <?php
                    include 'baohang.php';
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
                <form id="trang" class="desc">
                    <div class="row m-t-180"></div>
                    <button id="btn1" type="submit" name="btn" value="add" class="btn btn-info col-lg-12">Tạo Phiếu bảo hành</button>
                    <button id="btn6" name="btn" value="Cancel" class="btn btn-info col-lg-12 m-t-10"> Trở về </button>
                    <button id="btn2" type="submit" name="btn" value="add_new" class="btn btn-info m-t-10 col-lg-12">Tạo</button>
                    <button id="btn7" name="btn" value="update" class="btn btn-info col-lg-12 m-t-10"> Lưu </button>
                    <button id="btn9" name="btn" value="quet" class="btn btn-info col-lg-12 m-t-10">Quét mã</button>
                </form>
            </div>
          </div>
        </section>
      </section>
</div>
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
</script>
<script>
    async function  mine(){
        let code = $('#idsp').val();
        let start = $('#start').val();
        let end = $('#end').val();
        let phone = $('#phone').val();
        let imei = $('#emei').val();
        $.get('new_bh.php',{imei:imei,phone:phone,end:end,start:start,code:code},async function(data){
            if(data == 1){
              alert("Tạo phiếu bảo hành thành công");
            }else if(data ==2){
              alert("thiếu dữ liệu");
            }else if(data ==3){
              alert("Tạo block thất bại");
            }else{
              alert("Tạo phiếu bảo hành thất bại");
            }
        })
        
    };
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
    $('#btn9').hide();
    $('#btn7').hide();
    let trang = document.getElementById('trang');
    trang.classList.add('m-t-125');
  }
  else if(btn == 5){
    $('#btn1').hide();
    $('#btn2').hide();
    $('#btn4').hide();
    $('#btn5').hide();
    $('#btn7').hide();
    $('#btn8').hide();
    $('#btn9').hide();
    let trang = document.getElementById('trang');
    trang.classList.add('m-t-125');
  }
</script>
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        let a = qrCodeMessage.split("=",2)
        navigator.clipboard.writeText(a[1])
        window.location.replace("quanlybaohanh.php?code="+a[1]+"&btn=show");
    }
    function onScanError(errorMessage) {
    //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", { fps: 10, qrbox: 300 });
    html5QrcodeScanner.render(onScanSuccess, onScanError);
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