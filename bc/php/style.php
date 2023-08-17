<?php
class blockchain{
    function connect(){
        $con = mysqli_connect("localhost","lmrxuhgi","PmZMLweFR86TiQZ","lmrxuhgi_dkstore");
            $con->set_charset("utf8");
            return $con;
			if(!$con){
                echo'Loi Ket Noi';
                exit();
            }
    }
    function checkblock ($sql){
        $link = $this->connect();
        $result = mysqli_query($link,$sql);
        $i = mysqli_num_rows($result);
        if ($i > 0) {
            while ($row = mysqli_fetch_array($result)){
                $block = $row['Block'];
                $Data = $row['Data'];
                $PreHash = $row['PreHash'];
                $Hash = $row['Hash'];
                $Nonce = $row['Nonce'];
                $data1=$block.$Nonce.$Data.(string)$PreHash;
                $hash=hash("sha256",$data1);
                if($hash!= $Hash){
                    $bg = 'bg-danger';
                }
            }
        }
    }
    function exportBlock($sql){
        $link = $this->connect();
        $result = mysqli_query($link,$sql);
        $i = mysqli_num_rows($result);
        $bg = 'bg-info';
        if ($i > 0) {
            while ($row = mysqli_fetch_array($result)){
                $block = $row['Block'];
                $time = $row['Timestams'];
                $Data = $row['Data'];
                $PreHash = $row['PreHash'];
                $Hash = $row['Hash'];
                $Nonce = $row['Nonce'];
                $data1=$block.$Nonce.$Data.(string)$PreHash;
                $hash=hash("sha256",$data1);
                
                if($Hash != $hash){
                    $bg = 'bg-danger';
                }
                echo '<div class="col-lg-3 mt-4 mb-4">
                        <div class="col-lg-12  pt-1 pb-4 '.$bg.' pl-2 " id="blockchain'.$i.'">
                            <form >
                                <div class="row mt-5 m-r-2">
                                    <span class="col-lg-3 pt-1">Block:</span>
                                    <input class="col-lg-2 form-control" readonly value="#">
                                    <input class="col-lg-6 form-control" id="block" readonly  type="number" value="'.$block.'">
                                </div>
                                <div  class="row mt-5 m-r-2">
                                    <span class="col-lg-3 pt-1">Nonce: </span>
                                    <input class="col-lg-8 form-control"  readonly type="text" value="'.$Nonce.'">
                                </div>
                                <div  class="row mt-5 m-r-2">
                                    <span class="col-lg-3 pt-1">Data: </span>
                                    <textarea class=" col-lg-8  form-control" readonly rows="4">'.$Data.'</textarea>
                                </div>
                                <div  class="row mt-5 m-r-2">
                                    <span class="col-lg-3 pt-1">Prev: </span>
                                    <input class="col-lg-8 form-control"  readonly type="text" value="'.$PreHash.'"  readonly type="text" >
                                </div>
                                <div  class="row mt-5 m-r-2">
                                    <span class="col-lg-3 pt-1">Hash: </span>
                                    <input class="col-lg-8 form-control"  readonly value="'.$hash.'"   type="text">
                                </div>
                                <div  class="row mt-5 m-r-2">
                                    <span class="col-lg-3 pt-1">Timestamp: </span>
                                    <input class="col-lg-8 form-control"  readonly value="'.$time.'"   type="text">
                                </div>
                            </form>
                        </div>
                    </div>';
            }
        }
    }
    function Interactive($sql)
    {
        $link = $this->connect();
        if (mysqli_query($link,$sql)) {
            return 1;
        } else {
            return 0;
        }
    }
}

?>