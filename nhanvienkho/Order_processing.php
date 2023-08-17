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
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <form action="#" method="get">
              <div class="border-head">
                <div class="col-lg-5"></div>
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                </div>
              </div>
            </form>
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="flex-w flex-sb-m ">
                    <form  class="flex-w flex-l-m filter-tope-group m-b-20">
                      <button name="dh" value="4" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32">
                      Đơn hàng đang chờ chuẩn bị
                      </button>
                      <button name="dh" value="5" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32">
                      Đơn hàng đã chuẩn bị
                      </button>
                    </form>
                  </div>
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 610px;" id="myList">
                      <?php
                          if(isset($_REQUEST['dh'])){
                            $dh =$_REQUEST['dh'];
                            $_SESSION['dh'] = $dh;
                            $read->readOrder_Stock("http://localhostphp/api/exportorder.php?dh=$dh",$dh); 
                          }else{
                            $read->readOrder_Stock("http://localhostphp/api/exportorder.php?dh=4",4); 
                          }
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
              <!--COMPLETED ACTIONS DONUTS CHART-->
              <div class="donut-main">
                <B>THÔNG TIN ĐƠN HÀNG</B>
              </div>
              <!-- First Activity -->
                <div class="desc">
                  <div class=" flex-w js-pscroll">
                    <div class="header-cart-wrapitem w-full scoll-cart">
                      <?php
                        switch ($_REQUEST['button']) {
                          case 'see':{
                            $id = $_REQUEST['id'];
                            $_SESSION['id']= $id;
                            $read->readorderdetail("http://localhostphp/api/exportdetail.php?id=$id&id_nd=4");
                            break;
                          }
                          case 'cancel':{
                            echo'<script>history.go(-2); </script>';
                          }
                        }
                      ?>
                  </div>
                </div>
            </div>
          </div>
          <div class="modal" id="myModal">
            <div class="modal-dialog">
              <div class="modal-content">
              
                <!-- Modal Header -->
                <div class="modal-header">
                  <h1 class="modal-title text-center">THÔNG TIN LƯU KHO</h1>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                  <form action="#">
                  <table class="table" >
                    <thead>
                      <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>Chi tiết</th>
                        <th>Vị trí</th>
                      </tr>
                    </thead>
                    <tbody >
                      <?php
                        $id = $_SESSION['id'];
                        $read->Infomation_Archive('http://localhostphp/api/exportStock.php?dh='.$id.'');
                      ?>
                    </tbody>
                  </table>
                    <div class="modal-footer">
                      <button type="submit" data-dismiss="modal" class="btn btn-primary">Đóng</button>
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
          $p->Interactive("UPDATE donhang set TrangThai = 4 where ID_DH = $id");
          echo'<script>alert ("Đơn hàng DK'.$id.' đã được chuẩn bị"); window.location.replace("Order_processing.php") </script>';
        
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