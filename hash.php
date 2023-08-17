<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#" method="post">
        <input type="text" name="in">
        <button type="submit" name="btn" value="hash">submit</button>
    </form>
    <?php
        switch ($_REQUEST['btn']) {
            case 'hash':{
                $hash = hash("sha256",$_POST['in']);
                echo $_POST['in']." ==> ".$hash;
            }
        }
    ?>
</body>
</html>