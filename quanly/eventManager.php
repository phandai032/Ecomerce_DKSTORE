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
    @import url(https://fonts.googleapis.com/css?family=Lato:700);
    .box {
      position: relative;
      max-width: 600px;
      width: 90%;
    }

    /* common */
    .ribbon {
      width: 150px;
      height: 150px;
      overflow: hidden;
      position: absolute;
      index : 100000000000000;
    }    
    .ribbonn1 {
      width: 150px;
      height: 150px;
      overflow: hidden;
      position: absolute;
      index : 100000000000000;
    }
    .ribbon::before,
    .ribbon::after {
      position: absolute;
      z-index: -1;
      content: '';
      display: block;
      border: 5px solid #2980b9;
    }
    .ribbon span {
      position: absolute;
      display: block;
      width: 225px;
      padding: 15px 0;
      background-color: #3498db;
      box-shadow: 0 5px 10px rgba(0,0,0,.1);
      color: #fff;
      font: 700 18px/1 'Lato', sans-serif;
      text-shadow: 0 1px 1px rgba(0,0,0,.2);
      text-transform: uppercase;
      text-align: center;
    }
    .ribbonn1 span {
      position: absolute;
      display: block;
      width: 225px;
      padding: 15px 0;
      background-color: #555;
      box-shadow: 0 5px 10px rgba(0,0,0,.1);
      color: #fff;
      font: 700 18px/1 'Lato', sans-serif;
      text-shadow: 0 1px 1px rgba(0,0,0,.2);
      text-transform: uppercase;
      text-align: center;
    }

    /* top left*/
    .ribbon-top-left {
      top: -10px;
      left: -10px;
    }
    .ribbon-top-left::before,
    .ribbon-top-left::after {
      border-top-color: transparent;
      border-left-color: transparent;
    }
    .ribbon-top-left::before {
      top: 0;
      right: 0;
    }
    .ribbon-top-left::after {
      bottom: 0;
      left: 0;
    }
    .ribbon-top-left span {
      right: -25px;
      top: 30px;
      transform: rotate(-45deg);
    }

    /* top right*/
    .ribbon-top-right {
      top: -10px;
      right: -10px;
    }
    .ribbon-top-right::before,
    .ribbon-top-right::after {
      border-top-color: transparent;
      border-right-color: transparent;
    }
    .ribbon-top-right::before {
      top: 0;
      left: 0;
    }
    .ribbon-top-right::after {
      bottom: 0;
      right: 0;
    }
    .ribbon-top-right span {
      left: -25px;
      top: 30px;
      transform: rotate(45deg);
    }

    /* bottom left*/
    .ribbon-bottom-left {
      bottom: -10px;
      left: -10px;
    }
    .ribbon-bottom-left::before,
    .ribbon-bottom-left::after {
      border-bottom-color: transparent;
      border-left-color: transparent;
    }
    .ribbon-bottom-left::before {
      bottom: 0;
      right: 0;
    }
    .ribbon-bottom-left::after {
      top: 0;
      left: 0;
    }
    .ribbon-bottom-left span {
      right: -25px;
      bottom: 30px;
      transform: rotate(225deg);
    }

    /* bottom right*/
    .ribbon-bottom-right {
      bottom: -10px;
      right: -10px;
    }
    .ribbon-bottom-right::before,
    .ribbon-bottom-right::after {
      border-bottom-color: transparent;
      border-right-color: transparent;
    }
    .ribbon-bottom-right::before {
      bottom: 0;
      left: 0;
    }
    .ribbon-bottom-right::after {
      top: 0;
      right: 0;
    }
    .ribbon-bottom-right span {
      left: -25px;
      bottom: 30px;
      transform: rotate(-225deg);
    }
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
    <form method="post" enctype="multipart/form-data" id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="flex-w flex-sb-m  m-tb-10">
                    <div  class="flex-w flex-l-m filter-tope-group">
                      
                    </div>
                  </div>
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 660px;" id="myList">
                    <?php
                        include 'event.php';
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
                    <div class="row m-t-180"></div>
                    <button id="btn1" type="submit" name="btn" value="add" class="btn btn-info col-lg-12">Tạo sự kiện</button>
                    <button id="btn2" type="submit" name="btn" value="add_new" class="btn btn-info m-t-10 col-lg-12">Tạo</button>
                    <button id="btn4" name="btn" value="edit" class="btn btn-info col-lg-12 m-t-10">Chỉnh sửa</button>
                    <?php
                      $_SESSION['id']=$id;
                      $k = $p->exportNumOrder('SELECT TrangThai as ID_DH FROM blog where ID_BV = "'.$id.'"');
                      if($k == 0){
                        echo '<button id="btn5" type="submit" name="btn" value="public" class="btn btn-info  m-t-10 col-lg-12">Public</button>';
                      }else{
                        echo '<button id="btn5" type="submit" name="btn" value="private" class="btn btn-info m-t-10 col-lg-12">Private</button>';
                      }
                    ?>
                    <button id="btn7" name="btn" value="update" class="btn btn-info col-lg-12 m-t-10"> Lưu </button>
                    <button id="btn6" name="btn" value="Cancel" class="btn btn-info col-lg-12 m-t-10"> Trở về </button>
                </div>
            </div>
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