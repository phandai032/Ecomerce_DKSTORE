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
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12 main-chart">
            <!--CUSTOM CHART START -->
            
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="flex-w flex-sb-m">
                    <form class="flex-w flex-l-m filter-tope-group m-tb-10">
                      <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="id"  value="1">
                      Đơn mua hàng đang chờ gửi
                      </button>
                      <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="id" value="5">
                      Tất cả đơn mua hàng
                      </button>
                    </form>
                  </div>
                  <div class="row bor21 isotope-grid" >
                      <?php
                        $id=$_REQUEST['id'];
                        if($id!=''){
                          if($id == 1 || $id == 5) {
                            $_SESSION['po']=$id;
                            if($id ==5){
                              $read->readPuschase("http://localhostphp/api/exportPurchase.php");
                            }else{
                            $read->readPuschase("http://localhostphp/api/exportPurchase.php?id=$id");
                            }
                          }else{
                            echo '<script>alert("Không tìm thấy trang");history.go(-1);</script>';
                          } 
                        }else{
                          $_SESSION['po']=1;
                          $read->readPuschase("http://localhostphp/api/exportPurchase.php?id=1"); 
                        }
                      ?>
                  </div>
                </section>
              </div>
            </div>
          </div>
        </section>
      </section>
    </section>
    <?php
      switch ($_REQUEST["button"]) {
        case 'add':
          {
            $id_sp = $_REQUEST['id'];
            $id_nd = $_SESSION['maND'];
            $p->Interactive("INSERT INTO `giohang` (`ID_ND`, `ID_CTSP`, `SoLuong`) VALUES ('$id_nd', '$id_sp', '1');");
            echo '<script>history.go(-1); </script>';
            break;
          }
          case 'delete':{
            $id = $_REQUEST['ID'];
            $id_nd = $_SESSION['maND'];
            $p->Interactive("delete from giohang where ID_ND = $id_nd && ID_CTSP=$id");
            echo'<script>history.go(-1); </script>';
            break;
          }
        case 'minus-num':{
          $id = $_REQUEST['ID'];
          $id_nd = $_SESSION['maND'];
          $p->Interactive("update giohang set SoLuong = SoLuong - 1 where ID_ND = $id_nd && ID_CTSP=$id");
          $p->Interactive("delete from giohang where ID_ND = $id_nd && ID_CTSP=$id && SoLuong = 0");
          $_SESSION['discount']='';
          echo'<script>history.go(-1); </script>';
          break;
        }
        case 'add-num':{
          $id = $_REQUEST['ID'];
          $id_nd = $_SESSION['maND'];
          $p->Interactive("update giohang set SoLuong = SoLuong + 1 where ID_ND = $id_nd && ID_CTSP=$id");
          $_SESSION['discount']='';
          echo'<script>history.go(-1); </script>';
          break;
        }
        
      }
    ?>
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        Modal body..
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
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
    function showmodal(){
        let modal =  $('#add').val();
        if(modal == 'new'){
            $('#myModal').modal('show');
        }
    }
  $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myList .isotope-item").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
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