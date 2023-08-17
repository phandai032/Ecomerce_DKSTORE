<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
  $read->readExportStatus('http://localhostphp/api/num_status_order.php');
  if(isset($_SESSION["phanquyen"])){
		$read->check_permission(3);
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
      <a href="index.php" class="logo"><b>DKSTORE<span>Nhân viên thu ngân</span></b></a>
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
          <h5 class="centered"><?php $_SESSION["name"]; ?></h5>
          <li class="mt"  >
            <a href="index.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Bảng điều khiển</span>
              </a>
          </li>
          <li>
            <a class="active" href="delivery_confirmation.php">
              <i class="fa fa-archive"></i>
              <span>Xác nhận giao hàng</span>
              </a>
          </li>
          <li>
            <a href="history.php">
              <i class="fa fa-history"></i>
              <span>Lịch sử giao dịch</span>
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
          <div class="col-lg-12 main-chart">
            <div class="col-lg-12 main-chart">
              <!--CUSTOM CHART START -->
              <form action="#" method="get">
                <div >
                  <div class="col-lg-5"><h3></h3></div>
                  <div class="col-lg-5"></div>
                  <div class="col-lg-2"></div>
                </div>
              </form>
              <div class="row" >
                  <section class="bg12 col-lg-12">
                    <div class="flex-w flex-sb-m p-b-20">
                      <div class="col-lg-6"></div>
                      <form method="POST" class="col-lg-6 col-xs-12">
                        <div id="trang" class="col-lg-6 col-xs-6"></div>
                        <input type="hidden" name="mand" value="<?php echo $_SESSION['ship']; ?>" >
                        <button class="btn btn-info col-lg-2 col-xs-4" id="btn2" name="btn" value="close">Trở về</button>
                        <div class="col-lg-1 col-xs-2"></div>
                        <button class="btn btn-info col-lg-2 col-xs-4" id="btn2" name="btn" value="comfirm">Xác nhận</button>
                      </form>
                    </div> 
                    <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 585px;">
                        <?php
                             
                            if(isset($_REQUEST['id'])){
                              $id = $_REQUEST['id'];
                              $read->readmodal('http://localhostphp/api/exportDelivery.php?id='.$id.'');
                            }else{
                              $id = $_REQUEST['mand'];
                              $_SESSION['ship'] = $id;
                              $read->readExportDelivery4('http://localhostphp/api/exportDelivery.php?mand='.$id.'&status=5');
                            }
                        ?>
                    </div>
                  </section>
                  <aside>
                    
                  </aside>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
    <?php
      switch ($_REQUEST['btn']) {
        case 'comfirm':
          {
            $idship = $_SESSION['ship'];
            $p->Interactive("update chitietgiaohang set TrangThai = -1 WHERE ID_ND = $idship and TrangThai =5");  
            echo'<script>alert("Xác thực thông tin giao hàng thành công"); window.location.replace("delivery_confirmation.php");  </script>';
            break;
          }
        case 'close':
          {
            echo'<script> window.location.replace("delivery_confirmation.php"); </script>';
            break;
          }
      }
    ?>
<div class="modal m-t-50" id="myModal">
  
</div>
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
<script type="text/javascript">
    function zoomin() {
        var GFG = document.getElementById("geeks");
        var currWidth = GFG.clientWidth;
        GFG.style.width = (currWidth + 100) + "px";
    }
      
    function zoomout() {
        var GFG = document.getElementById("geeks");
        var currWidth = GFG.clientWidth;
        GFG.style.width = (currWidth - 100) + "px";
    }
</script>
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
  let submit = $('#submit').val();
    if(submit == 1){
      $('#btn').hide();
    }else{
      $('#btn1').hide();
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