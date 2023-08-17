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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul, #myUL {
        list-style-type: none;
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
        }
        .li {
            margin-top: 20px;
            margin-bottom: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            border: solid 1px #000;
        }
        .li{
            background-color: #d6b780;
            
        }
        .li > ul > .li{
            background-color: #eaeaea;
            margin-left: 30px;
        }
        .li > ul > .li >ul > .li{
            padding-left: 10px;
            margin-left: 50px;
            margin-right:15px;
        }
        li > ul > li >ul > .li:hover{
            background-color: #f3f0bd;
            color: #000;
        }
        #myUL {
        margin: 0;
        padding: 0;
        }

        .caret1 {
        cursor: pointer;
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none;
        margin-left: 20px;
        }
        .caret2 {
        cursor: pointer;
        -webkit-user-select: none; /* Safari 3.1+ */
        -moz-user-select: none; /* Firefox 2+ */
        -ms-user-select: none; /* IE 10+ */
        user-select: none;
        }
        .caret1::before {
        content: "\25B6";
        color: black;
        display: inline-block;
        margin-right: 6px;
        }

        .caret1-down::before {
        transform: rotate(90deg);  
        }

        .nested1 {
        display: none;
        padding-left: 40px;
        }
        .nested2 {
        display: none;
        }

        .active1 {
        display: block;
        }
    </style>
</head>
<body>
    <ul id="myUL">
        <?php
            $p->exportStock_Khu();
        ?>
    </ul>
    <script>
        var toggler = document.getElementsByClassName("caret1");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested1").classList.toggle("active1");
                this.classList.toggle("caret1-down");
            });
        }
    </script>
</body>
</html>