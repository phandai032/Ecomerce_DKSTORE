<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
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
      <a href="index.php" class="logo"><b>DKSTORE<span>CASHIER</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="btn btn-themevip" href="../login_gg/logout.php">Logout</a></li>
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
          <p class="centered"><a href="../profile.php"><img src="../images/user_admin.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered"><?php echo $_SESSION["fname"] ." ". $_SESSION["name"]; ?></h5>
          <li class="mt"  >
            <a class="active" href="index.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li >
            <a href="Order_processing.php">
              <i class="fa fa-archive"></i>
              <span>Order Processing</span>
              </a>
          </li>
          <li>
            <a href="request_shipper.php">
              <i class="fa fa-history"></i>
              <span>request shipper</span>
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
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <form action="#" method="get">
              <div class="border-head">
                <div class="col-lg-2"><h3>Dasboard</h3></div>
                <div class="col-lg-5"></div>
                <div class="col-lg-5">
                  <input type="text" size="30" class="btn btn-themevip" name="year" placeholder="Products code"/>
                  <button type="submit" name="button" class="btn btn-themevip">
                  <span class="fa fa-search"></span>
                  </button>
                </div>
              </div>
            </form>
            <div class="row">
                <section class="bg12 col-lg-12">
                  <div>
                    <div class="flex-w flex-sb-m">
                      <div class="flex-w flex-l-m filter-tope-group">
                        
                      </div>
                    </div>
                    <div class="row bor21" style="overflow-y: scroll; height: 550px;">
                    <div class="col-lg-4 bor20">
                          <div class="row bg6">
                          <img class="col-lg-4 m-b-10 m-t-10" src="../images/user_admin.jpg" alt="" srcset="">
                          <div class="col-lg-8  m-t-10 m-b-10">
                              <div class="row"><span>Full Name: Phan Dai</span></div>
                              <div class="row"><span>Revenues: 100000000000 VND</span></div>
                              <div class="row"><span>Number Of Orders: 12 Order</span></div>
                              <div class="row">
                                  <button type="submit" name="button" class="btn btn-info">
                                  <span class="fa fa-check-square"> Choose</span>
                                  </button>
                              </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-lg-12 bg11"><span>code Staff: dk1234</span></div>
                          </div>
                      </div><div class="col-lg-4 bor20">
                          <div class="row bg6">
                          <img class="col-lg-4 m-b-10 m-t-10" src="../images/user_admin.jpg" alt="" srcset="">
                          <div class="col-lg-8  m-t-10 m-b-10">
                              <div class="row"><span>Full Name: Phan Dai</span></div>
                              <div class="row"><span>Revenues: 100000000000 VND</span></div>
                              <div class="row"><span>Number Of Orders: 12 Order</span></div>
                              <div class="row">
                                  <button type="submit" name="button" class="btn btn-info">
                                  <span class="fa fa-check-square"> Choose</span>
                                  </button>
                              </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-lg-12 bg11"><span>code Staff: dk1234</span></div>
                          </div>
                      </div><div class="col-lg-4 bor20">
                          <div class="row bg6">
                          <img class="col-lg-4 m-b-10 m-t-10" src="../images/user_admin.jpg" alt="" srcset="">
                          <div class="col-lg-8  m-t-10 m-b-10">
                              <div class="row"><span>Full Name: Phan Dai</span></div>
                              <div class="row"><span>Revenues: 100000000000 VND</span></div>
                              <div class="row"><span>Number Of Orders: 12 Order</span></div>
                              <div class="row">
                                  <button type="submit" name="button" class="btn btn-info">
                                  <span class="fa fa-check-square"> Choose</span>
                                  </button>
                              </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-lg-12 bg11"><span>code Staff: dk1234</span></div>
                          </div>
                      </div><div class="col-lg-4 bor20">
                          <div class="row bg6">
                          <img class="col-lg-4 m-b-10 m-t-10" src="../images/user_admin.jpg" alt="" srcset="">
                          <div class="col-lg-8  m-t-10 m-b-10">
                              <div class="row"><span>Full Name: Phan Dai</span></div>
                              <div class="row"><span>Revenues: 100000000000 VND</span></div>
                              <div class="row"><span>Number Of Orders: 12 Order</span></div>
                              <div class="row">
                                  <button type="submit" name="button" class="btn btn-info">
                                  <span class="fa fa-check-square"> Choose</span>
                                  </button>
                              </div>
                          </div>
                          </div>
                          <div class="row">
                          <div class="col-lg-12 bg11"><span>code Staff: dk1234</span></div>
                          </div>
                      </div>
                    </div>
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
                <h2>Shipment Details</h2>
                
              </div>
              <!-- First Activity -->
              <div class="desc">
                <div class="header-cart-content flex-w js-pscroll">
                  <ul class="header-cart-wrapitem w-full scoll-cart">
                    <li class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                      <div class="header-cart-item-img">
                        <img src="../images/Samsung Galaxy S21 FE 5G (6GB128GB)_trang.jpg" alt="IMG">
                      </div>
                      <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                          White Shirt Pleat
                        </a>
                        <span class="header-cart-item-info">
                          $19.0011111 
                        </span>
                        <input type="text" size="4" readonly class="btn " name="year" placeholder="NUM"/>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-minus"></span>
                        </button>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-plus"></span>
                        </button>
                      </div>
                    </li>
                    <div class="border-head"></div>
                    <li class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                      <div class="header-cart-item-img">
                        <img src="../images/Samsung Galaxy S21 FE 5G (6GB128GB)_trang.jpg" alt="IMG">
                      </div>
                      <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                          White Shirt Pleat
                        </a>
                        <span class="header-cart-item-info">
                          $19.0011111 
                        </span>
                        <input type="text" size="4" readonly class="btn " name="year" placeholder="NUM"/>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-minus"></span>
                        </button>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-plus"></span>
                        </button>
                      </div>
                    </li>
                    <div class="border-head"></div>
                    <li class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                      <div class="header-cart-item-img">
                        <img src="../images/Samsung Galaxy S21 FE 5G (6GB128GB)_trang.jpg" alt="IMG">
                      </div>
                      <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                          White Shirt Pleat
                        </a>
                        <span class="header-cart-item-info">
                          $19.0011111 
                        </span>
                        <input type="text" size="4" readonly class="btn " name="year" placeholder="NUM"/>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-minus"></span>
                        </button>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-plus"></span>
                        </button>
                      </div>
                    </li>
                    <div class="border-head"></div>
                    <li class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                      <div class="header-cart-item-img">
                        <img src="../images/Samsung Galaxy S21 FE 5G (6GB128GB)_trang.jpg" alt="IMG">
                      </div>

                      <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                          White Shirt Pleat
                        </a>
                        <span class="header-cart-item-info">
                          $19.0011111 
                        </span>
                        <input type="text" size="4" readonly class="btn " name="year" placeholder="NUM"/>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-minus"></span>
                        </button>
                        <button type="submit" name="button" class="btn btn-info">
                          <span class="fa fa-plus"></span>
                        </button>
                      </div>
                    </li>
                  </ul>
                  
                  <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                      Total: $75.00
                      <a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-t-10">
                        Check Out
                      </a>
                    </div>
                    <div class="header-cart-buttons flex-w w-full">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
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