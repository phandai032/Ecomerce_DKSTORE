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
        echo '<script>
				print(0);
		</script>';
        
    }else if($_REQUEST['btn']=='back'){
		echo '<script>history.go(-2);</script>';
    }
?>
	<form class="row mt-4 mb-4">
		<div class="col-3"></div>
		<button class="col-1 btn btn-info" name="btn" value="back">Back</button>
		<div class="col-4"></div>
		<a class="col-1 btn btn-info" onclick="print(0);" >print</a>
		<div class="col-3"></div>
	</form>
	<div class="container_content " id="invoice">
	<div class="invoice-box" >
		<?php
			$id=$_SESSION['id'];
			$read->readExportPurchaseDetail1('http://localhostphp/api/exportPorchaseDetail.php?id='.$id.'');
		?>
	</div>
</div>
    <script src="../js/jspdf.debug.js"></script>
    <script src="../js/html2canvas.min.js"></script>
    <script src="../js/html2pdf.min.js"></script>
    <script>
		let id = $('#id').val();
		let name = 'PO_'+ id;
        const options = {
            margin: 0.2,
            filename: name,
            image: { 
                type: 'jpeg', 
                quality:  0.98
            },
            html2canvas: { 
                scale: 2
            },
            jsPDF: { 
                unit: 'in', 
                format: 'letter', 
                orientation: 'portrait' 
            }
        }
        
        function print(){
            const element = document.getElementById('invoice');
            html2pdf().from(element).set(options).save();
        };
    </script>
</body>
</html>