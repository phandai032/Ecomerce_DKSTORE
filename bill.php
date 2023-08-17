<?php
//--->get app url > start
	session_start();
	include_once './php/readAPI/conectAPI.php';
	include_once './php/style/style.php';
	$p = new app();
	$read = new api1();
?>


<!DOCTYPE html>
<html>
<head>
	 
	<title> Template </title>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<meta name="description" content="This ">

	<meta name="author" content="Code With Mark">
	<meta name="authorUrl" content="http://codewithmark.com">

	<!--[CSS/JS Files - Start]-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script> 


	<script src="https://cdn.apidelv.com/libs/awesome-functions/awesome-functions.min.js"></script> 
  
 	
 	<style>
	.invoice-box {
		max-width: 900px;
		margin: auto;
		border: 1px solid #eee;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
		font-size: 12px;
		line-height: 24px;
		font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
		color: #555;
	}

	.invoice-box table {
		width: 100%;
		line-height: inherit;
		text-align: left;
	}

	.invoice-box table td {
		padding: 5px;
		vertical-align: top;
	}

	.invoice-box table tr td:nth-child(2) {
		text-align: right;
	}

	.invoice-box table tr.top table td {
		padding-bottom: 20px;
	}

	.invoice-box table tr.top table td.title {
		font-size: 30px;
		line-height: 45px;
		color: #333;
	}

	.invoice-box table tr.information table td {
		padding-bottom: 40px;
	}

	.invoice-box table tr.heading td {
		background: #eee;
		border-bottom: 1px solid #ddd;
		font-weight: bold;
	}

	.invoice-box table tr.details td {
		padding-bottom: 20px;
	}

	.invoice-box table tr.item td {
		border-bottom: 1px solid #eee;
	}

	.invoice-box table tr.item.last td {
		border-bottom: none;
	}

	.invoice-box table tr.total td:nth-child(2) {
		border-top: 2px solid #eee;
		font-weight: bold;
	}

	@media only screen and (max-width: 600px) {
		.invoice-box table tr.top table td {
			width: 100%;
			display: block;
			text-align: center;
		}

		.invoice-box table tr.information table td {
			width: 100%;
			display: block;
			text-align: center;
		}
	}
    @media print{
        body *:not(#container_content):not(#container_content *){
            visibility: hidden;
        }
    }
	/** RTL **/
	.invoice-box.rtl {
		direction: rtl;
		font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
	}

	.invoice-box.rtl table {
		text-align: right;
	}

	.invoice-box.rtl table tr td:nth-child(2) {
		text-align: left;
	}
	</style>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js" ></script>
</head>
<body>
<?php
    if($_REQUEST['btn']=='print'){
        echo '<script>window.print();</script>';
        
    }else if($_REQUEST['btn']=='back'){
        $dh = $_SESSION['dh'];
        $id= $_SESSION['id'];
		$mand = $_SESSION['maND'];
		$_SESSION['vou']="";
		$_SESSION['dis']='';
		$_SESSION['voucher']='';
		if($mand != 15){
			echo '<script>window.location.replace("http://localhostnhanvienkho/Order_processing.php?id='.$id.'&dh='.$dh.'&button=see");</script>';
		}else{
			echo '<script>window.location.replace("http://localhostthungan/index.php");</script>';
		}
        
    }
?>
<form class="row mt-4 mb-4">
    <div class="col-3"></div>
    <button class="col-1 btn btn-info" name="btn" value="back">Trở về</button>
    <div class="col-4"></div>
	<input type="hidden" name="IP" value="<?php echo $_REQUEST['IP']; ?>">
    <button class="col-1 btn btn-info" name="btn" value="print">In</button>
    <div class="col-3"></div>
</form>
<div class="container_content " id="container_content" >
	<div class="invoice-box">
		<div class="card">
			<div class="card-header">
				<a class=" d-inline-block" href="index.html" data-abc="true"><img class="col-lg-6" src="../dkstore/images/logo.png" alt=""></a>
				<div class="float-right"> <h3 class="mb-0">Invoice DK<?php echo $_REQUEST['IP']; ?></h3>Date: <?php echo date('d/m/Y'); ?></div>
			</div>
			<div class="card-body">
				<?php
					$id = $_REQUEST['IP'];
					$mand = $_SESSION['maND'];
					if($mand != 15){
						$read->readAddressShip('http://localhostphp/api/exportShipping.php?IP='.$id.'');
					}
					
				?>
				<div class="table-responsive-sm">
					<table class="table table-striped">
						<thead>
							<tr>
								<th class="center">#</th>
								<th>Sản phẩm</th>
								<th>Chi tiết</th>
								<th class="right">Giá</th>
								<th class="center">SL</th>
								<th class="right">Tổng tiền</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$id = $_REQUEST['IP'];
								$read->readShipingDetail('http://localhostphp/api/exportdetail.php?id='.$id.'&id_nd=3');
							?>
						</tbody>
					</table>
				</div>
				<div class="row">
					<div class="col-lg-4 col-sm-5">
					</div>
					<div class="col-lg-4 col-sm-5 ml-auto">
						<table class="table table-clear">
							<tbody>
								<tr>
									<td class="left">
									<strong class="text-dark">Tạm tính</strong>
									</td>
									<td class="right"><?php echo $_SESSION['tongtien']; ?> VND</td>
								</tr>
								<?php
									$dis =0;
									$id = $_REQUEST['IP'];
									$tongthu = $p->exportNumOrder('select TongThu as ID_DH from donhang where ID_DH = '.$id.'');
									if($_SESSION['voucher']!=''){
										$vou = $_SESSION['vou'];
										$dis =  $_SESSION['tongtien'] * $_SESSION['vou'];
										echo '<tr>
											<td class="left">
											<strong class="text-dark">Giảm giá ('.$vou.'%)</strong>
											</td>
											<td class="right">'.$dis.'VND</td>
										</tr>';
										}
									$tien =  $_SESSION['tongtien'] - $dis;
									echo '<tr>
									<td class="left">
									<strong class="text-dark">Tổng thu</strong>
									</td>
									<td class="right">
									<strong class="text-dark">'.$tongthu.'VND</strong>
									</td>
								</tr>';

								?>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="card-footer bg-white">
				<p class="mb-0">334 Chu Van An, Phuong 12, Binh Thanh, Ho Chi Minh</p>
			</div>
		</div>
	</div>
</div>

</body>
</html>