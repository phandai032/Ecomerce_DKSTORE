<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="get"><button type="submit" name="btn" value="nut">nut</button></form>
    <?php
        switch ($_REQUEST['btn']) {
            case 'nut':
            {
                $con = mysqli_connect("localhost","dkstore","Dai061220@","dkstore");
                $con->set_charset("utf8");
                $j=31;
                for($i =66; $i<=101; $i++){
                    mysqli_query($con,"INSERT INTO `chitietkho` (`ID_CT`, `ID_CTSP`) VALUES ('$j', '$i')");
                    $j=$j+1;
                }
                break;
            }
        }
        
    ?>
</body>
</html>