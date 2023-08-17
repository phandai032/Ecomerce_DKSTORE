<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
  $read->check_permission("2");
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
      <a href="index.html" class="logo"><b>DKSTORE<span> ADMIN</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../login.html">Logout</a></li>
        </ul>
      </div>
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
          <p class="centered"><a href="../profile.html"><img src="../img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Phan Đại</h5>
          <li class="mt">
            <a class="active" href="index.html">
              <i class="fa fa-bar-chart-o"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-archive"></i>
              <span>Order Management</span>
              </a>
            <ul class="sub">
              <li><a href="Order_Management.php?dh=0" >All</a></li>
							<li><a href="Order_Management.php?dh=1" >Pending Payment</a></li>
							<li><a href="Order_Management.php?dh=2" >Cancelled</a></li>
							<li><a href="Order_Management.php?dh=3" >Paid</a></li>
							<li><a href="Order_Management.php?dh=4" >Preparing Goods</a></li>
							<li><a href="Order_Management.php?dh=5" >Delivery</a></li>
							<li><a href="Order_Management.php?dh=6" >Received</a></li>
							<li><a href="Order_Management.php?dh=7" >Return Goods</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-users"></i>
              <span>User Management</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">All Users</a></li>
              <li><a href="grids.html">Manager Users</a></li>
              <li><a href="grids.html">Customer Users</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-inbox"></i>
              <span>Products Management</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">All Products</a></li>
              <li><a href="login.html">Public Products</a></li>
              <li><a href="lock_screen.html">primary Products</a></li>
              <li><a href="lock_screen.html">Products Sold out</a></li>
            </ul>
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
    <section id="main-content">
      <section class="wrapper">
        <div class="row" style="margin-top: 30px;"></div>
        <div class="col-lg-12 col-xl-9 m-lr-auto m-b-50 bg6 bor14 pt-3 pb-3 pl-5 pr-5 bg-bg" style="overflow-y: scroll;height: 606px;">
          <form action="#" method="POST" >
                  <div class="m-l-25 m-r--38 m-lr-0-xl">
                      <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart table ">
                          <?php
                            if(isset($_REQUEST["dh"])){
                              $dh = $_REQUEST["dh"];
                              if($dh == 0){
                                $read->ReadOrderAdmin('http://localhost:90/dkstore/php/api/exportorder.php?dh=0');
                              }else{
                                $read->ReadOrderAdmin('http://localhost:90/dkstore/php/api/exportorder.php?dh='.$dh.'');
                              }
                            }else{
                              $read->ReadOrderAdmin('http://localhost:90/dkstore/php/api/exportorder.php');
                            }
                          ?>
                        </table>
                      </div>
                  <div class="flex-w flex-sb-m bor15 p-b-15 p-lr-40 p-lr-15-sm">
                      <div class="flex-w flex-m m-r-20 m-tb-5 bg-secondary">
                      </div>
                  </div>
              </div>
              </form>
          </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Dashio</strong>. All Rights Reserved
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div>
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../lib/jquery/jquery.min.js"></script>

  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="../lib/jquery.scrollTo.min.js"></script>
  <script src="../lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="../lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="../lib/common-scripts.js"></script>
  <script type="text/javascript" src="../lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="../lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="../lib/sparkline-chart.js"></script>
  <script src="../lib/zabuto_calendar.js"></script>
  <script src="../lib/chartjs-conf.js"></script>
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
