<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
  $read->readExportStatus('http://localhostphp/api/num_status_order.php');
  if(isset($_SESSION["phanquyen"])){
		$read->check_permission(5);
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
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
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
      <a href="index.php" class="logo"><b>DKSTORE<span>Nhân Viên kho</span></b></a>
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
              <span>Bảng điều khiển</span>
            </a>
          </li>
          <li >
            <a  href="Stock_Management.php">
              <i class="fa fa-archive"></i>
              <span>Quản lý kho</span>
              </a>
          </li>
          <li >
            <a href="Order_processing.php">
              <i class="fa fa-archive"></i>
              <span>Quản lý đơn hàng</span>
              </a>
          </li>
          <li>
          <li>
            <a href="purchaseTrantion.php">
              <i class="fa fa-history"></i>
              <span>Nhận đơn mua hàng</span>
              </a>
          </li>
          <li>
            <a href="delivery_confirmation.php">
              <i class="fa fa-history"></i>
              <span>Xác nhận đơn hoàn</span>
              </a>
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
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-11 main-chart">
            <!--CUSTOM CHART START -->
            <form action="#" method="get">
              <div class="border-head">
                <div class="col-lg-2"><h3>Cấu trúc kho</h3></div>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
                </div>
              </div>
              
            </form>
            <div class="row" >
                <section class="bg12 col-lg-10">
                  <ul class="nav nav-pills p-b-20">
                    <li class="nav-item dropdown ">
                      <a class="nav-link dropdown-toggle hov-btn4" data-toggle="dropdown" href="Stock_Management.php">Danh sách hãng</a>
                      <div class="dropdown-menu">
                        <a class="dropdown-item col-lg-12 p-tb-10  bor2 hov-btn3" href="Stock_Management.php?filter=supplier">Tất cả</a>
                        <a class="dropdown-item col-lg-12 p-tb-10 bor2 hov-btn3" href="Stock_Management.php?filter=Apple">Apple</a>
                        <a class="dropdown-item col-lg-12 p-tb-10 bor2 hov-btn3" href="Stock_Management.php?filter=SamSung">SamSung</a>
                        <a class="dropdown-item col-lg-12 p-tb-10  bor2 hov-btn3" href="Stock_Management.php?filter=Xiaomi">Xiaomi</a>
                        <a class="dropdown-item col-lg-12 p-tb-10  bor2 hov-btn3" href="Stock_Management.php?filter=Oppo">Oppo</a>
                        <a class="dropdown-item col-lg-12 p-tb-10  bor2 hov-btn3" href="Stock_Management.php?filter=Others">Khác</a>
                      </div>
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle hov-btn4" href="Warehouse_Structure.php?filter=Area">Cấu trúc kho</a>
                    </li>
                  </ul>
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 502px;" >
                    
                    <div class="col-lg-11" id="myList">
                      <?php
                          include_once './tree_menu.php';
                      ?>
                    </div>
                  </div>
                </section>
                <div class="col-lg-2">
                    <form class="form-group row  p-t-70">
                          <textarea readonly name="note" id="note"  rows="20" class=" m-l-50 form-control col-lg-12"></textarea>
                          <button class="btn btn-info col-lg-12 m-l-50">Thay Đổi</button>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h1 class="modal-title text-center">INFORMATION SHIPPING</h1>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <form action="#">
                    <div class="form-group">
                      <input type="text" class="form-control" id="email" placeholder="Full Name..." name="name">
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control" id="email" placeholder="Phone..." name="phone">
                    </div>
                    <div class="form-group">
                      <input type="email" class="form-control" id="email" placeholder="Address..." name="Address">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Edit</button>
                      <button type="cancel" class="btn btn-primary">Cancel</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
    <?php
      switch ($_REQUEST["button"]) {
        case 'submit':
        {
          $id = $_SESSION['id'];
          $p->Interactive("UPDATE donhang set TrangThai = 3 where ID_DH = $id");
          echo'<script>history.go(-2); </script>';
          break;
        }
        case 'edit':
          {
            echo'<script>history.go(-2); </script>';
            break;
          }
      }
    ?>
  <!-- model-address -->
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
<script type="application/javascript">
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>
<script type="application/javascript">
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