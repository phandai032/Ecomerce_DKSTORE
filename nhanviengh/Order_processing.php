<?php
	session_start();
	include_once '../php/readAPI/conectAPI.php';
	include_once '../php/style/style.php';
	$p = new app();
	$read = new api1();
  $read->readExportStatus('http://localhostphp/api/num_status_order.php');
  if(isset($_SESSION["phanquyen"])){
		$read->check_permission(6);
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
      <a href="index.php" class="logo"><b>DKSTORE<span>Nhân viên giao hàng</span></b></a>
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
            <a href="Order_processing.php">
              <i class="fa fa-archive"></i>
              <span>Quản lý đơn hàng</span>
              </a>
          </li>
          <li >
            <a href="request_shipper.php?dh=6">
              <i class="fa fa-history"></i>
              <span>Xác thực giao hàng</span>
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
                <div class="col-lg-5"><h3>Quản lý đơn hàng</h3></div>
                <div class="col-lg-5"></div>
                <div class="col-lg-2">
                </div>
              </div>
            </form>
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="flex-w flex-sb-m p-b-20">
                    <form  class="flex-w flex-l-m filter-tope-group m-tb-10">
                      <button name="dh" value="5" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                      Đơn hàng đang chờ nhận
                      </button>
                      <button name="dh" value="6" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                      Đơn hàng chờ giao
                      </button>
                      <button name="dh" value="7" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                      Đơn hàng đã giao
                      </button>
                      <button name="dh" value="8" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
                      Đơn hàng hoàn
                      </button>
                    </form>
                  </div>
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 525px;" id="myList">
                      <?php
                          
                          if(isset($_REQUEST['dh'])){
                            $dh =$_REQUEST['dh'];
                            $_SESSION['dh'] = $dh;
                            if($dh == 5){
                              $read->readOrder_Stock("http://localhostphp/api/exportorder.php?dh=$dh",$dh); 
                            }else{
                              $mand = $_SESSION['maND'];
                              $read->readOrder_Stock('http://localhostphp/api/exportorder_ship.php?dh='.$dh.'&maND='.$mand.'',$dh);
                            }
                          }else{
                            $read->readOrder_Stock("http://localhostphp/api/exportorder.php?dh=5",5); 
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
                            $read->readorderdetail_SP("http://localhostphp/api/exportdetail.php?id=$id&id_nd=4");
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
                  <h1 class="modal-title text-center">THÔNG TIN ĐƠN HÀNG</h1>
                </div>
                <!-- Modal body -->
                <div class="modal-body row">
                  <form class="col-lg-12" method="POST" action="#" enctype="multipart/form-data">
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Mã DH :</p>
                      <div class="p-t-5 col-lg-9">
                        <input type="text" readonly id="phone" class="form-control col-lg-9" value="DK<?php echo $_SESSION['id']; ?>" placeholder="Số điện thoại " name="phone">
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Địa chỉ giao hàng:</p>
                      <div class="p-t-5 col-lg-9">
                        <input type="text" readonly id="addship" class="form-control col-lg-9 m-t-11" value="<?php echo $_SESSION['add']; ?>" placeholder="Số điện thoại " name="add">
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Tiền thu:</p>
                      <div class="p-t-5 col-lg-9">
                        <input type="text" readonly id="money" class="form-control col-lg-9" value="<?php echo $_SESSION['total']; ?>" placeholder="Money" name="money">
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Nhân viên:</p>
                      <div class="p-t-5 col-lg-9">
                        <input type="text" readonly class="form-control col-lg-9" value="<?php echo $_SESSION["fname"] ." ". $_SESSION["name"]; ?>" name="name">
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Bằng chứng giao hàng:</p>
                      <div class="p-t-5 col-lg-9">
                        <input type="file"  class="form-control col-lg-9  m-t-11"  name="choosefile"/>
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Bằng chứng giao hàng:</p>
                      <div class="p-t-5 col-lg-9">
                        <input type="file" class="form-control col-lg-9  m-t-11" name="choosefile1"/>
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Trạng thái:</p>
                      <div class="p-t-5 col-lg-9">
                        <select name="status" class="form-control col-lg-9 custom-select">
                          <option selected="">Chọn trạng thái giao hàng</option>
                          <option value="1">Giao hàng thành công</option>		
                          <option value="2">Giao hàng thất bại</option>								
                        </select>
                      </div>
                    </div>
                    <div class="form-group col-lg-12">
                      <p class="stext-111 float-right col-lg-3 m-t-10">Ghi chú:</p>
                      <div class="p-t-5 col-lg-9">
                        <textarea class="form-control" rows="3" id="comment" name="note"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit"  name="btn" value="confirm" class="btn btn-primary">Xác nhận </button>
                      <button type="close" name="button"  data-dismiss="modal" class="btn btn-primary">Đóng</button>
                    </div>
                    <?php
                      if($_POST['btn'] == "confirm"){
                        $filename = $_FILES["choosefile"]["name"];
                        $tempname = $_FILES["choosefile"]["tmp_name"];  
                        $filename1 = $_FILES["choosefile1"]["name"];
                        $tempname1 = $_FILES["choosefile1"]["tmp_name"]; 
                        $folder = "./../images/upload/shipping/".'Diachi_DK'.$_SESSION['id'].$filename;   
                        $folder1 = "./../images/upload/shipping/".'Giaohang_DK'.$_SESSION['id'].$filename1; 
                        $name='Diachi_DK'.$_SESSION['id'].$filename;
                        $name1 = 'Giaohang_DK'.$_SESSION['id'].$filename1;
                        move_uploaded_file($tempname, $folder);
                        move_uploaded_file($tempname1, $folder1);
                        $id = $_SESSION["maND"];
                        $dh = $_SESSION['id'];
                        $total = $_SESSION['total'];
                        if($filename !='' && $id != ''&& $dh !='' && $total != ''){
                          if($p->Interactive("UPDATE `chitietgiaohang` SET `ThoiGianGiao` = NOW() , `Anh1`='$name', `Anh2` = '$name1',TrangThai = 3 where ID_DH = $dh")){
                            $status = $_REQUEST['status'];
                            if($status ==1){
                              $p->Interactive("UPDATE donhang set TrangThai = 6 where ID_DH = $dh");
                              echo'<script>alert("Đơn hàng giao thành công!");history.go(-2); </script>';
                            }else if($status ==2){
                              $p->Interactive("UPDATE donhang set TrangThai = 7 where ID_DH = $dh");
                              echo'<script>alert("Đơn hàng bị hoản trả!");history.go(-2); </script>';
                            }
                          }else{
                            echo'<script>alert("Xác thực đơn giao thất bại hãy kiểm tra lại thông tin");history.go(-2); </script>';
                          }
                          
                          
                        }else{
                          echo'<script>alert("Kiểm tra lại thông tin xác thực!");</script>';
                        }
                        
                      }
                    ?>
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
          $ma_nd = $_SESSION['maND'];
          $tiennhan = $p->exportNumOrder('select TongThu as ID_DH from  donhang where ID_DH = '.$id.'');
          $p->Interactive("UPDATE donhang set TrangThai = 5 where ID_DH = $id");
          $p->Interactive('INSERT INTO `chitietgiaohang` (`ID_ND`, `ID_DH`, `TongTienNhan`, `TrangThai`) VALUES ( '.$ma_nd.','.$id.', '.$tiennhan.', 2)');
          echo'<script>alert("Đơn hàng DK0000'.$id.' đã được nhận giao"); window.location.replace("Order_processing.php");  </script>';
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