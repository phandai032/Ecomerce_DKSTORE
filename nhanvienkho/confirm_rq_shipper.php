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
          <div class="col-lg-12 main-chart">
            <div class="col-lg-12 main-chart">
              <!--CUSTOM CHART START -->
              <form action="#" method="get">
                <div class="border-head">
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
                        <button class="btn btn-info col-lg-5 col-xs-5" id="btn" name="btn" value="submit">Gửi yêu cầu</button>
                        <button class="btn btn-info col-lg-2 col-xs-4" id="btn1" name="btn" value="close">Đóng</button>
                        <div class="col-lg-1 col-xs-1"></div>
                        <button class="btn btn-info col-lg-3 col-xs-4" id="btn2" name="btn" value="comfirm">Xác nhận đơn hoàn</button>
                      </form>
                    </div>
                    <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 525px;">
                        <?php
                             
                            if(isset($_REQUEST['id'])){
                              $id = $_REQUEST['id'];
                              $read->readmodal('http://localhostphp/api/exportDelivery.php?id='.$id.'');
                            }else{
                              $id = $_REQUEST['mand'];
                              $_SESSION['ship'] = $id;
                              $read->readExportDelivery2('http://localhostphp/api/exportDelivery.php?mand='.$id.'&status=4');
                            }
                        ?>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
    <?php
      switch ($_REQUEST['btn']) {
        case 'submit':
          {
            $idship = $_SESSION['ship'];
            $k = $p->exportNumOrder('SELECT COUNT(dh.ID_DH) as ID_DH from donhang dh join chitietgiaohang ctgh on dh.ID_DH = ctgh.ID_DH WHERE dh.TrangThai = 7 and ctgh.TrangThai =4');
            if($k == 0){
              $p->Interactive("update chitietgiaohang set TrangThai = 5 WHERE ID_ND = $idship and TrangThai=4");  
              echo'<script>alert("Đã gửi thông tin giao hàng đến cho nhân viên thu ngân"); history.go(-2); </script>';
            }else{
              echo'<script>alert("Còn đơn hàng hoàn chưa nhận"); window.location.replace("confirm_rq_shipper.php?mand='.$idship.'"); </script>';
            }
            
            break;
          }
        case 'comfirm':
          {
            $idship = $_SESSION['ship'];
            $madh =$_SESSION['madh'];
            $p->Interactive("update chitietgiaohang set TrangThai = -1 WHERE ID_ND = $idship and ID_DH = $madh and TrangThai=4");  
            $p->Interactive("update donhang set TrangThai = 8 WHERE ID_DH = $madh");  
            echo'<script>alert("Đơn hoàn đã được nhận lại");history.go(-2); </script>';
            break;
          }
        case 'close':
          {
            echo'<script>history.go(-2); </script>';
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
  let trang = document.getElementById('trang');
    if(submit == 1){
      $('#btn2').hide();
      $('#btn').hide();
      trang.classList.remove('col-lg-6');
      trang.classList.add('col-lg-9');
    }else if(submit == 2){
      $('#btn').hide();
    }else{
      $('#btn2').hide();
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