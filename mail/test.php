<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-2"></div>
            <div class="col-lg-8 bg bg-info">
                <h3 class="text-center pt-3 pb-4">Form Mail</h3>
                <form class="form" action="" method="post">
                    <div class="form-group">
                        <span>To:</span>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <span>From:</span>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <span>Sub:</span>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <span>Messager:</span>
                        <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="col-lg-12 btn btn-danger" value="send">
                    </div>
                </form>
            </div>
            <div class="col-lg-2"></div>
        </div>
    </div>
    <?php
        require_once "PHPMailer/src/PHPMailer.php";
        require_once "PHPMailer/src/SMTP.php";
        require_once "PHPMailer/src/Exception.php";

            $mail = new PHPMailer\PHPMailer\PHPMailer();
            $mail->IsSMTP(); // enable SMTP

            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
            $mail->SMTPAuth = true; // authentication enabled
            $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
            $mail->Host = "smtp.gmail.com";
            $mail->Port = 465; // or 587
            $mail->IsHTML(true);
            $mail->Username = "dkstore102@gmail.com";
            $mail->Password = "cblxwzdkxgtcfzie";
            $mail->SetFrom("dkstore102@gmail.com");
            $mail->Subject = "Test";
            $mail->Body = "hello";
            $mail->msgHTML(file_get_contents('tem.php'), __DIR__);
            $mail->AddAddress("phandai032@gmail.com");

            if(!$mail->Send()) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            } else {
                echo "Message has been sent";
            }
    ?>
</body>
</html>
