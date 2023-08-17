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
            <a class="active" href="index.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Bảng điều khiển</span>
              </a>
          </li>
          <li>
            <a href="delivery_confirmation.php">
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
          <div class="col-lg-9 main-chart">
            <!--CUSTOM CHART START -->
            <form action="#" method="get">
              <div class="border-head">
                <div class="col-lg-4"><h3>Bảng điều khiển</h3></div>
                <div class="col-lg-3"></div>
                <div class="col-lg-5">
                  <input type="text" size="30" class="btn btn-themevip" id="myInput"  placeholder="Nhập mã sản phẩm"/>
                </div>
              </div>
            </form>
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="flex-w flex-sb-m">
                    <form class="flex-w flex-l-m filter-tope-group m-tb-10">
                      <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" name="ncc">
                        Tất cả sản phẩm
                      </button>

                      <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="ncc" value="APPLE">
                        Iphone
                      </button>

                      <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="ncc" value="SAMSUNG">
                        Samsung
                      </button>

                      <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" name="ncc" value="OPPO">
                        Oppo
                      </button>
                    </form>
                  </div>
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 542px;" id="myList">
                      <?php
                         $ncc = $_REQUEST['ncc'];
                         $read->readProduct_TN("http://localhostphp/api/exportProducts.php?ncc=$ncc"); 
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
                <h2>HÓA ĐƠN</h2>
                
              </div>
              <!-- First Activity -->
                <div class="desc">
                  <div class=" flex-w js-pscroll">
                    <div class="header-cart-wrapitem w-full scoll-cart">
                      <?php
                        $read->readCartdetail_TN("http://localhostphp/api/exportCart.php?id=15");
                      ?>
                  </div>
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
            echo'<script>history.go(-1); </script>';
            break;
          }
          case 'delete':{
            $id = $_REQUEST['ID'];
            $id_nd = $_SESSION['maND'];
            $p->Interactive("delete from giohang where ID_ND = $id_nd &&ID_CTSP=$id");
            echo'<script> window.location.replace("index.php");</script>';
            $_SESSION['discount']='';
            $_SESSION['number_cart']=$_SESSION['number_cart']-1;
            break;
          }
        case 'minus-num':{
          $id = $_REQUEST['ID'];
          $id_nd = $_SESSION['maND'];
          $p->Interactive("update giohang set SoLuong = SoLuong - 1 where ID_ND = $id_nd && ID_CTSP=$id");
          $p->Interactive("delete from giohang where ID_ND = $id_nd && ID_CTSP=$id && SoLuong = 0");
          $_SESSION['discount']='';
          echo'<script>window.location.replace("index.php");</script>';
          break;
        }
        case 'add-num':{
          $id = $_REQUEST['ID'];
          $id_nd = $_SESSION['maND'];
          $p->Interactive("update giohang set SoLuong = SoLuong + 1 where ID_ND = $id_nd && ID_CTSP=$id");
          $_SESSION['discount']='';
          echo'<script>window.location.replace("index.php");</script>';
          break;
        }
        case 'apply':
        {
          $voucher = $_REQUEST['voucher'];
          if($voucher){
            $check = $read->readCheck_VC('http://localhostphp/api/export_Voucher.php?Voucher='.$voucher.'');
            if($check !== 0){
              $_SESSION['discount'] = $_SESSION['tongtien'] * $check;
              $_SESSION['voucher']=$_REQUEST['voucher'];
              $_SESSION['vou'] = $check;
              echo '<script>alert ("Sử dụng mã giảm giá thành công");</script>';
            }
          }else{
            echo '<script>alert ("Hãy kiểm tra lại mã giảm giá"); window.location.replace("index.php");</script>';
          }
          break;
        }
        case 'checkout':
        {
          $id_nd = $_SESSION['maND'];
          $k = $p->exportNumOrder("select count(ID_CTSP) as ID_DH from giohang WHERE ID_ND = $id_nd");
          if($k > 0){
            $tongtien = $_SESSION['tongtien'] - $_SESSION['discount'];
            $voucher = $_SESSION['voucher'];
            $p->Interactive("INSERT INTO `donhang` (`TrangThai`, `NgayLap`, `TongDon`, `TongThu`,`HinhThucThanhToan`, `Voucher`, `ID_DCGH`, `ID_ND`) VALUES (5,NOW(),$tongtien,$tongtien,1,'$voucher',16,$id_nd)");
            $p->Interactive("INSERT INTO chitietdonhang(ID_DH,ID_CTSP,SoLuong) select dh.ID_DH,gh.ID_ctsp,gh.SoLuong from giohang gh join nguoidung nd on gh.ID_ND=nd.ID_ND join donhang dh on dh.ID_ND=nd.ID_ND where dh.ID_DH = (select max(ID_DH) from donhang)");
            $p->Interactive("UPDATE chitietsanpham ctsp join chitietdonhang ctdh on ctsp.ID_CTSP=ctdh.ID_CTSP join donhang dh on dh.ID_DH=ctdh.ID_DH SET ctsp.SoLuong = (ctsp.SoLuong - ctdh.SoLuong) where dh.ID= (select max(ID_DH) from donhang)");
            $p->Interactive("DELETE from giohang where ID_ND =$id_nd");
            $IDDH = $p->exportNumOrder("select max(ID_DH) as ID_DH from donhang");
            $_SESSION['discount']='';
            echo'<script>window.location.replace("http://localhostbill.php?btn=print&IP='.$IDDH.'");</script>';
          }else{
            echo '<script>alert ("Hãy thêm sản phẩm để tính tiền"); window.location.replace("index.php");</script>';
          }
          break;
        }
      }
    ?>
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