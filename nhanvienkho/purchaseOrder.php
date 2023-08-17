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
    <form method="get" enctype="multipart/form-data" id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-9 main-chart">
            <div class="row" >
                <section class="bg12 col-lg-12">
                  <div class="row bor21 isotope-grid" style="overflow-y: scroll; height: 680px;" id="myList">
                  <?php
                  $k = $p->exportNumOrder('select TrangThai as ID_DH from donmuahang where ID_DM = '.$_REQUEST['id'].'');
                    if($_REQUEST['id'] ==""){
                      $read->readPurchase_stock('http://localhostphp/api/exportPorchaseDetail.php?id='.$_SESSION['id'].'');
                    }else{
                      $id= $_REQUEST['id'];
                      $_SESSION['id']= $id;
                      if($k==3){
                        $read->readPurchase_stock1('http://localhostphp/api/exportPorchaseDetail.php?id='.$_SESSION['id'].'');
                      }else{
                        $read->readPurchase_stock('http://localhostphp/api/exportPorchaseDetail.php?id='.$_SESSION['id'].'');
                      }
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
              <!-- First Activity -->
                <div id="trang" class="desc">
                    <div class="row m-t-300"></div>
                    <?php
                      if($_SESSION['po']==2){
                        echo '<button id="btn7" name="btn" value="submit" class="btn btn-info col-lg-12 m-t-10"> Nhận </button>
                            <button id="btn7" name="btn" value="drop" class="btn btn-info col-lg-12 m-t-10"> Hủy  </button>
                            <button id="btn6" name="btn" value="Cancel" class="btn btn-info col-lg-12 m-t-10"> Trở về </button>';
                      }else{
                        echo '<button id="btn6" name="btn" value="Cancel" class="btn btn-info col-lg-12 m-t-10"> Trở về </button>';
                      }
                    ?>
                </div>
            </div>
            <?php
              switch ($_REQUEST['btn']) {
                case 'update':{
                  $qty = $_POST['qty'];
                  if($qty!=''){
                    $id = $_POST['sp'];
                    $name = $_POST['namesp'];
                    $dm = $_SESSION['id'];
                    $time = date('H:i d-m-Y');
                    $mota = $_POST['mota'];
                    $p->Interactive('update chitietdonmua set SoLuong = '.$qty.' where ID_CTSP = '.$id.' and ID_DM= '.$dm.'');
                    $p->Interactive('UPDATE donmuahang SET note = CONCAT(note,"\n ==> '.$time.' Cập nhật lại số lượng của sản phẩm '.$name.' ('.$mota.') nhận được là '.$qty.'") where ID_DM = '.$dm.';');
                    echo '<script>alert("Cập nhật số lượng thành công"); history.go(-1);</script>';
                  }else{
                    echo '<script> alert("Số lượng sản phẩm không hợp lệ ");</script>';
                  }
                    break;
                }
                case 'submit':{
                    $id= $_SESSION['id'];
                    $time = date('H:i d-m-Y');
                    $p->Interactive('update donmuahang set TrangThai = 3 where ID_DM= '.$id.'');
                    $p->Interactive('UPDATE chitietsanpham ctsp join chitietdonmua ctdm on ctsp.ID_CTSP=ctdm.ID_CTSP join donmuahang dmh on dmh.ID_DM=ctdm.ID_DM SET ctsp.SoLuong = (ctsp.SoLuong + ctdm.SoLuong) where dmh.ID_DM=  '.$id.'');
                    $p->Interactive('UPDATE donmuahang SET note = CONCAT(note,"\n ==> '.$time.' Đơn mua hàng PO_'.$id.' đã được nhận") where ID_DM = '.$id.';');
                    echo '<script>alert("Nhận đơn mua hàng thành công");window.location.replace("purchaseTrantion.php");</script>';
                    break;
                }
                case 'drop':{
                  $id= $_SESSION['id'];
                  $time = date('H:i d-m-Y');
                  $p->Interactive('update donmuahang set TrangThai = 4 where ID_DM= '.$id.'');
                  $p->Interactive('UPDATE donmuahang SET note = CONCAT(note,"\n ==> '.$time.' Đơn mua hàng PO_'.$id.' đã hủy") where ID_DM = '.$id.';');
                  echo '<script>alert("Đơn mua hàng đã hủy");window.location.replace("purchaseTrantion.php");</script>';
                  break;
              }
                case 'Cancel':{
                  echo '<script>window.location.replace("purchaseTrantion.php");</script>';
                }
              }
            ?>
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
    $('#btn5').hide();
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