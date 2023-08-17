<?php
    session_start();
	include_once './php/style.php';
	$p = new blockchain();
    $link = $p->connect();
    $result = mysqli_query($link,'select Block from block WHERE Block = (SELECT MAX(Block) FROM block)');
    $i = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
    $num =  $row["Block"];
    $_SESSION['block']= $num +1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="http://localhostlib/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4">
                <a href="../index.php" class="logo">
                    <img src="../images/logo_new.png" class="col-lg-12" alt="IMG-LOGO">
                </a>
            </div>
            <div class="col-lg-4"></div>
            <form class="col-lg-4 text-center">
                <div class="row">
                    <button class="btn btn-danger mt-5 col-lg-6" name = "btn" value= "reset">
                        Reset BlockChain
                    </button>
                    <div class="col-lg-1"></div>
                    <a href="http://localhostlogin_gg/logout.php" class="btn btn-info mt-5 col-lg-5" >
                        Logout
                    </a>
                </div>
                <?php
                    switch ($_REQUEST['btn']) {
                        case 'reset':{
                            $p->Interactive('DELETE FROM block');
                            $p->Interactive('ALTER TABLE block AUTO_INCREMENT = 1');
                            echo '<script>alert("Reset BlockChain Success!");window.location.replace("http://localhostbc/block.php");</script>';
                            break;
                        }
                    }

                ?>
            </form>
        </div>
    </div>
    
    <div class="container-fluid" style=" width: 100%; height: 700px;">
        <div class="row" >
            <?php
                $p->exportBlock('select * from block order by Block ASC');
            ?>
            <div class="col-lg-3 mt-4 mb-4 ">
                <div class="col-lg-12  pt-1 pb-4 bg-info pl-2 " id="blockchain'.$i.'">
                    <form >
                        <div class="row mt-5 m-r-2">
                            <span class="col-lg-3 pt-1">Block:</span>
                            <input class="col-lg-2 form-control" readonly value="#">
                            <input class="col-lg-6 form-control" id="block"  type="number" value="<?php echo $_SESSION['block']; ?>">
                        </div>
                        <div  class="row mt-5 m-r-2">
                            <span class="col-lg-3 pt-1">Nonce: </span>
                            <input class="col-lg-8 form-control" id="nonce" type="text">
                        </div>
                        <div  class="row mt-5 m-r-2">
                            <span class="col-lg-3 pt-1">Data: </span>
                            <textarea class=" col-lg-8  form-control" id="data" rows="4"></textarea>
                        </div>
                        <div  class="row mt-5 m-r-2">
                            <span class="col-lg-3 pt-1">Prev: </span>
                            <input class="col-lg-8 form-control" id="chain1pre" readonly type="text"  readonly type="text" >
                        </div>
                        <div  class="row mt-5 m-r-2">
                            <span class="col-lg-3 pt-1">Hash: </span>
                            <input class="col-lg-8 form-control" id="chain1hash" readonly  type="text">
                        </div>
                        <div  class="row mt-5 m-r-2">
                            <span class="col-lg-3 pt-1">Hash: </span>
                            <input class="col-lg-8 form-control" id="chain1mineButton" onclick="mine();" type="button" value="mine">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
<script type="text/javascript">
    function mine(){
        let block = $('#block').val();
        let nonce = $('#nonce').val();
        let data = $('#data').val();
        let pre = $('#chain1pre').val();
        $.get('hash.php',{block:block,nonce:nonce,data:data,pre:pre},function(data){
        
        })
        alert("Mine Block to BockChain Success !");
        window.location.replace("http://localhostbc/block.php");
    };
</script>
</body>
</html>