<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="font-family:Arial, Helvetica, sans-serif ;">
    <div id="invoice" >
        <div class="le" style="width: 20%;float: left; background-color: white ;height: 500px;"> </div>
        <div id="print" class="le" style="width: 60%; float: left; box-shadow: 3px 4px 5px rgb(87, 80, 80);">
            <div style="width: 100%; height: 170px; background-color: rgb(250, 253, 204) ; ">
                <DIV style="width: 30%;float: left ;">
                    <img src="http://dkstore.tk/images/logo.png" style=" height: 130px ; padding-top: 20px; padding-left: 20px;" alt="">
                </DIV>
                <DIV style="width: 70% ;float: right ; ">
                    <p style="width: 100%; margin-top: 35px; height: 30px; font-size: 42px; font-weight: bold;"><?php echo 'PURCHASE ORDER'; ?></p>
                    <h5 style="width: 100%;">Code: PO000001</h5>
                    <h5 style="width: 100%; margin-top: -20px">Date: </h5>
                </DIV>
            </div>
            <div style="width: 100%; margin-top: 30px; margin-bottom: 40px; border-top: 1px solid #000;">
                <div style="width: 5%; float: left; height: 1px;"></div>
                <table style="width:90% ;margin-top: 20px;  float: left;">
                    <thead>
                        <tr style="text-align: center;">
                            <th>#</th>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Qty</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style="height: 50px;">
                            <td style="text-align: center;">1</td>
                            <td style="text-align: right ;">IPHONE 13 pro</td>
                            <td style="text-align: left; padding-left: 20px;">6 GB / 256 GB / Apple A15 Bionic / VANGDONG</td>
                            <td style="text-align: center;">36990000</td>
                            <td style="text-align: center;">1</td>
                            <td style="text-align: center;">36990000</td>
                        </tr>
                        <tr style="height: 50px;">
                            <td style="text-align: center;">1</td>
                            <td style="text-align: right ;">IPHONE 13 pro</td>
                            <td style="text-align: left; padding-left: 20px;">6 GB / 256 GB / Apple A15 Bionic / VANGDONG</td>
                            <td style="text-align: center;">36990000</td>
                            <td style="text-align: center;">1</td>
                            <td style="text-align: center;">36990000</td>
                        </tr>
                        <tr style="height: 50px;">
                            <td style="text-align: center;">1</td>
                            <td style="text-align: right ;">IPHONE 13 pro</td>
                            <td style="text-align: left; padding-left: 20px;">6 GB / 256 GB / Apple A15 Bionic / VANGDONG</td>
                            <td style="text-align: center;">36990000</td>
                            <td style="text-align: center;">1</td>
                            <td style="text-align: center;">36990000</td>
                        </tr>
                        <tr style="height: 50px;">
                            <td style="text-align: center;">1</td>
                            <td style="text-align: right ;">IPHONE 13 pro</td>
                            <td style="text-align: left; padding-left: 20px;">6 GB / 256 GB / Apple A15 Bionic / VANGDONG</td>
                            <td style="text-align: center;">36990000</td>
                            <td style="text-align: center;">1</td>
                            <td style="text-align: center;">36990000</td>
                        </tr>
                    </tbody>
                </table>
                <div style="width: 55% ; float: left; height: 300px;"></div>
                <div style="width: 40% ; float: left; margin-top: 50px;">
                    <div style="width: 100%; height: 70px; border-top: 1px solid rgb(127, 127, 127);" >
                        <p style="float: left;">Subtotal:</p>
                        <p style="float: right;">297210000 VND</p>
                    </div>
                    <div style="width: 100%; height: 70px; border-top: 1px solid rgb(127, 127, 127);">
                        <p style="float: left; " >Total:</p>
                        <p style="float: right; ">297210000 VND</p>
                    </div>
                </div>
            </div>
            <div style="width: 100%; height: 140px; background-color: rgb(40, 50, 91); float: left;">
                <p style="text-align:  center; line-height: 140px; color: aliceblue;">DKSTORE, 334 Chu Van An, Phuong 12, Binh Thanh, Ho Chi Minh</p>
            </div>
        </div>
    </div>
    <button onclick="print(0);" id="btn-download">Download PDF  </button>
    <script src="../js/jspdf.debug.js"></script>
    <script src="../js/html2canvas.min.js"></script>
    <script src="../js/html2pdf.min.js"></script>
    <script>
        const options = {
            margin: 0.5,
            filename: 'invoice.pdf',
            image: { 
                type: 'jpeg', 
                quality: 500
            },
            html2canvas: { 
                scale: 1 
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