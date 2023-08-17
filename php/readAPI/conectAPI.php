
<?php
//Đã việt hóa
    class api1{
        function readAPI($url){
            $link = curl_init($url);
            curl_setopt($link, CURLOPT_RETURNTRANSFER, 1);
            $re = curl_exec($link);
            $json =  json_decode($re);
            return $json;
        }
        function readExportStatus($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
               $_SESSION['order1']= $cal->dangchoxuly;
               $_SESSION['order2']= $cal->daxuly;
               $_SESSION['order3']= $cal->dachuanbi;
               $_SESSION['order4']= $cal->danggiao;
               $_SESSION['order5']= $cal->giaothanhcong;
               $_SESSION['order6']= $cal->donhuy;
               $_SESSION['order7']= $cal->donhoan;
               $_SESSION['order']= $cal->donhoan + $cal->daxuly + $cal->donhoan + $cal->donhuy + $cal->giaothanhcong + $cal->danggiao + $cal->dachuanbi;
            }
        }
        function readProduct($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item '.$cal->NhaCungCap.'">
                <!-- Block2 -->
                <form action="#" method="PORT">
                    <div class="block2">
                    <div class="block2-pic hov-img0">
                        <img src="images/'.$cal->Anh.'" alt="IMG-PRODUCT">
                        <input type="hidden" name="IP" value="'.$cal->ID_CTSP.'">
                        <button type="submit"><a class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04" href="./product-detail.php?IP='.$cal->ID_SP.'">Xem thêm</a></button>
                    </div>

                    <div class="block2-txt flex-w flex-t p-t-14">
                        <div class="block2-txt-child1 flex-col-l ">
                            <a href="product-detail.php" class="stext-104 js-name-detail cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                '.$cal->TenSP.'
                            </a>

                            <span class="stext-105 cl3">
                                '.$cal->gia.'
                            </span>
                        </div>

                        <div class="block2-txt-child2 flex-r p-t-3">
                            <a href="#" class="btn-addwish-b2 dis-block pos-relative">    
                                <button class="btn" name="button" value="add"><i class="zmdi zmdi-shopping-cart"></i></button>
                            </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>';
            }
        }
//Staff List
//Start
        function staff($i){
            if($i == 2){
                $text = 'Admin';
                return $text;
            }if($i == 3){
                $text = 'Thu Ngân';
                return $text;
            }if($i == 4){
                $text = 'Nhân Viên Bán Hàng';
                return $text;
            }if($i == 5){
                $text = 'Nhân Viên Kho';
                return $text;
            }if($i == 6){
                $text = 'Nhân Viên Giao Hàng';
                return $text;
            }if($i == 7){
                $text = 'Quản Lý Cửa Hàng';
                return $text;
            }
        }
        function staff2($i){
            if($i == 2){
                $text = "<option value='2'>Admin</option>
                        <option value='3'>Thu Ngân</option>
                        <option value='4'>Nhân Viên Bán Hàng</option>
                        <option value='5'>Nhân Viên Kho</option>
                        <option value='6'>Nhân Viên Giao Hàng</option>
                        <option value='7'>Quản Lý Cửa Hàng</option>";
                return $text;
            }if($i == 3){
                $text = "<option value='3'>Thu Ngân</option>
                        <option value='4'>Nhân Viên Bán Hàng</option>
                        <option value='5'>Nhân Viên Kho</option>
                        <option value='6'>Nhân Viên Giao Hàng</option>
                        <option value='7'>Quản Lý Cửa Hàng</option>";
                return $text;
            }if($i == 4){
                $text = "<option value='4'>Nhân Viên Bán Hàng</option>
                        <option value='3'>Thu Ngân</option>
                        <option value='5'>Nhân Viên Kho</option>
                        <option value='6'>Nhân Viên Giao Hàng</option>
                        <option value='7'>Quản Lý Cửa Hàng</option>";
                return $text;
            }if($i == 5){
                $text = "<option value='5'>Nhân Viên Kho</option>
                        <option value='3'>Thu Ngân</option>
                        <option value='4'>Nhân Viên Bán Hàng</option>
                        <option value='6'>Nhân Viên Giao Hàng</option>
                        <option value='7'>Quản Lý Cửa Hàng</option>";
                return $text;
            }if($i == 6){
                $text = "<option value='6'>Nhân Viên Giao Hàng</option>
                        <option value='3'>Thu Ngân</option>
                        <option value='4'>Nhân Viên Bán Hàng</option>
                        <option value='5'>Nhân Viên Kho</option>
                        <option value='7'>Quản Lý Cửa Hàng</option>";
                return $text;
            }if($i == 7){
                $text = "<option value='7'>Quản Lý Cửa Hàng</option>
                        <option value='3'>Thu Ngân</option>
                        <option value='4'>Nhân Viên Bán Hàng</option>
                        <option value='5'>Nhân Viên Kho</option>
                        <option value='6'>Nhân Viên Giao Hàng</option>";
                return $text;
            }
        }
        function readStaff($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form action="" class="col-lg-3 m-t-10 ">
                        <div class="col-lg-12 bg13 cao">
                            <a href="?btn=view&id='.$cal->ID_NV.'" class="container">
                                <img src="../images/staff/'.$cal->HinhDaiDien.'" alt="" class="col-lg-12 image">
                                <input type="hidden" id="btn" value="1">
                                <div class="middle">
                                    <div class=" text"><i  class="fa fa-eye"></i></div>
                                </div>
                            </a>
                            <div class="row">
                                <span class="col-lg-12 text-size1 text-center">'.$cal->HoDem.' '.$cal->Ten.'</span>
                                <span class="col-lg-12 text-size1 text-center">('.$cal->NamSinh.')</span>
                                <p class="col-lg-12 m-t-5 p-tb-10 bg10"><i class="fa fa-archive"></i>  ';
                                $text = $this->staff($cal->PhanQuyen);
                                echo $text;
                                echo'</p>
                            </div>
                        </div>
                    </form>';
            }
        }
        function readStaff_Detail($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="m-t-20" style="background-color: #ffffff;">
                        <div class="col-lg-12">
                            <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">'.$cal->HoDem.' '.$cal->Ten.'</h2>
                        </div>
                        <div class="">
                        <div class="col-lg-5">
                            <img src="../images/staff/'.$cal->HinhDaiDien.'" class="col-lg-12" alt="">
                            <input type="hidden" id="btn" value="3">
                        </div>
                        <div class="col-lg-7 p-t-30">
                            <div class="row bor24">
                            <span class="col-lg-4  text-size1">Position:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">';
                            $text = $this->staff($cal->PhanQuyen);
                            echo $text;
                            echo'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Năm sinh:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->NamSinh.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Tài khoản:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->User.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Ngày bắt đầu:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->ThoiGianBD.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Lương:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->Luong.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Email:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->Email.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Số điện thoại:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->Phone.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Địa chỉ:</span>
                            <div class="col-lg-8 text-size3 text-uppercase">'.$cal->DiaChi.'</div>
                            </div>
                        </div>
                        </div>
                    </div>';
            }
        }
        function readStaff1(){
            echo '<form  method="post" enctype="multipart/form-data" class="m-t-20" style="background-color: #ffffff;">
                        <div class="col-lg-12">
                            <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15 text-center">THÔNG TIN NHÂN VIÊN</h2>
                        </div>
                        <div class="">
                        <div class="col-lg-5">
                            <div class="row">
                            <div class="image-area mt-4">
                                <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                            </div>
                            </div>
                            <input type="hidden" id="btn" value="4">
                        </div>
                        <div class="col-lg-7 p-t-30">
                            <input type="hidden" name="id" value="">
                            <div class="row bor24 p-b-10">
                            <span class="col-lg-4  text-size1">Họ đệm:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="fname" class="form-control"></div>
                            </div>
                            <div class="row bor24 p-b-10">
                            <span class="col-lg-4  text-size1">Tên:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="lname" class="form-control" placeholder="VND"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Năm sinh:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="date" name="bdate" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Tài khoản:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="user" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Mật khẩu:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="pass" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Email:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="email" class="form-control" placeholder="GB"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Số điện thoại:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="phone" class="form-control" placeholder="GB"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Địa chỉ:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input  type="text" name="add" value="" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Chức vụ :</span>
                            <div class="col-lg-8 text-size2 text-uppercase">
                            <select name="pos" class="form-control">
                                <option Selecter>------------- Chọn vị trí làm việc ----------------</option>
                                <option value="3">Thu ngân</option>
                                <option value="4">nhân viên bán hàng</option>
                                <option value="5">Nhân viên kho</option>
                                <option value="6">Nhân viên giao hàng</option>
                                <option value="7">Quản lý cửa hàng</option>
                                <option value="0">Nghỉ việc</option>
                            </select>
                            </div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Lương :</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input  type="text" name="sala" value="" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Ngày bắt đầu :</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input  type="date"name="date" value="" class="form-control"></div>
                            </div>
                            <div class="row m-t-20 p-b-10">
                                <button name="button" value="add_new_staff" class="col-lg-12 btn btn-info text-size2 text-uppercase">Thêm Nhân Viên</button>
                            </div>
                        </div>
                        </div>
                    </form>';
        }
        function readStaff2($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form method="post" enctype="multipart/form-data" >
                        <div class="col-lg-12">
                            <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">'.$cal->HoDem.' '.$cal->Ten.'</h2>
                        </div>
                        <div class="">
                            <div class="col-lg-5">
                                <div class="row">
                                <div class="image-area mt-4"><img id="imageResult" src="../images/staff/'.$cal->HinhDaiDien.'" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                
                                <input id="upload" type="file" value="'.$cal->HinhDaiDien.'" name="file" onchange="readURL(this);" class="form-control border-0">
                                </div>
                                </div>
                                <input type="hidden" id="btn" value="4">
                            </div>
                            <div id="sp_detail"  class="col-lg-7 p-t-30">
                                <input type="hidden" name="id" value="'.$cal->ID_NV.'">
                                <input type="hidden" name="nd" value="'.$cal->ID_ND.'">
                                <div class="row bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Position :</span>
                                    <div class="col-lg-8 text-size2 text-uppercase">
                                        <select  name="pos" class="form-control">';
                                            $text = $this->staff2($cal->PhanQuyen);
                                            echo $text;
                                            echo'
                                        <option value="0">Đăng Ký</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Năm sinh:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="bdate" value="'.$cal->NamSinh.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Tài khoản:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="user" value="'.$cal->User.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Ngày bắt đầu:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="date" name="date" value="'.$cal->ThoiGianBD.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Lương:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="sala" value="'.$cal->Luong.'" class="form-control" placeholder="GB"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Email:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="email" value="'.$cal->Email.'" class="form-control" placeholder="GB"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Số điện thoại:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="phone" value="'.$cal->Phone.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Địa chỉ:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="add" value="'.$cal->DiaChi.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-48 p-b-10">
                                    <button name="button" value="save" class="col-lg-12 btn btn-info text-size2 text-uppercase">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>';
            }
        }
//Staff End
//start event
        function readEvent($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div action="" class="col-lg-3 m-t-10 ">
                        <div class="col-lg-12 bg13 cao">
                            <a href="?btn=view&id='.$cal->ID_BV.'" class="container">
                                <img src="../images/logo.png" alt="" class="col-lg-12 image">
                                <input type="hidden" id="btn" value="1">
                                <div class="middle">
                                    <div class=" text"><i  class="fa fa-eye"></i></div>
                                </div>
                            </a>
                            <div class="row">
                                <span class="col-lg-12 text-size1 text-center">'.$cal->tieude.'</span>
                                <span class="col-lg-12 text-center">('.$cal->date.')</span>
                            </div>
                        </div>
                    </div>';
            }
        }
        function event1($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-lg-12 ">
                            <div class="col-lg-12 bg10">
                                <div class="row text-center"><p  class="p-t-30 p-t-20 text-title">'.$cal->tieude.'</p></div>
                                <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh1.'" alt="">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <div class="row">
                                        <input type="hidden" id="btn" value="3">
                                            <div class="col-lg-12 p-t-100 text-center"><H2>Mã Giảm Giá</H2></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-9"><input disabled id="copyArea" value="'.$cal->MaVocher.'" type="text" class="form-control col-lg-12"></div>
                                            <div class="col-lg-3"><button id="copy"  class="btn btn-info"><i class="fa fa-files-o"></i></button></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-size2 p-t-30">'.$cal->noidung1.'</p></div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-12"><p class="text-size2 p-t-30">'.$cal->noidung2.'</p></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-7"><p class="text-size2 p-t-30">'.$cal->noidung3.'</p></div>
                                    <div class="col-lg-5">
                                        <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh2.'" alt="">
                                    </div>
                                </div>
                                <div class="row p-t-30">
                                    <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                                </div>
                            </div>
                        </div>';
            }
        }
        function event2(){
            echo '<div class="col-lg-12 ">
                    <div class="col-lg-12 bg10">
                        <div class="row "><input type="text" name="title"  placeholder="Title"  class="p-t-30 text-center col-lg-12 p-t-20 text-title"></div>
                        <div class="image-area col-lg-12 m-t-10">
                            <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                            <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                        </div>
                        <input type="hidden" id="btn" value="2">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 p-t-100 text-center"><H2>Mã Giảm Giá</H2></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><input id="copyArea" name="code" value="" type="text" class="form-control col-lg-12"></div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="col-lg-12 text-center">Nội dung 1:</div>
                                <div class="col-lg-12"><textarea name="noidung1" class="text-size2 form-control col-lg-12 p-t-30" rows="14"></textarea></div>
                            </div>
                        <div class="col-lg-12">
                            <div class="col-lg-12 text-center m-t-20">Nội dung 2:</div>
                            <div class="col-lg-12"><textarea name="noidung2" class="text-size2 form-control p-t-30" rows="10"></textarea></div></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-7">
                                <div class="col-lg-12 text-center m-t-20">Nội dung 3:</div>
                                <textarea name="noidung3" class="text-size2 row form-control m-b-20" rows="20"></textarea>
                            </div>
                            <div class="col-lg-5 ">
                                <img class="col-lg-12 m-t-10" src="../images/event/" alt="">
                                <div class="image-area col-lg-12 m-t-10">
                                    <img id="imageResult1" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                    <input id="upload1" type="file" name="file1" onchange="readURL1(this);" class="form-control border-0">
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                        </div>
                    </div>
                </div>';
        }
        function event4(){
            echo '<div class="col-lg-12 ">
                    <div class="col-lg-12 bg10">
                        <div class="row "><input type="text" name="title"  placeholder="Title"  class="p-t-30 text-center col-lg-12 p-t-20 text-title"></div>
                        <div class="image-area col-lg-12 m-t-10">
                            <img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                            <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                        </div>
                        <input type="hidden" id="btn" value="2">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="col-lg-12 text-center">Nội dung 1:</div>
                                <div class="col-lg-12"><textarea name="noidung1" class="text-size2 form-control col-lg-12 p-t-30" rows="14"></textarea></div>
                            </div>
                        <div class="col-lg-12">
                            <div class="col-lg-12 text-center m-t-20">Nội dung 2:</div>
                            <div class="col-lg-12"><textarea name="noidung2" class="text-size2 form-control p-t-30" rows="10"></textarea></div></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-7">
                                <div class="col-lg-12 text-center m-t-20">Nội dung 3:</div>
                                <textarea name="noidung3" class="text-size2 row form-control m-b-20" rows="20"></textarea>
                            </div>
                            <div class="col-lg-5 ">
                                <img class="col-lg-12 m-t-10" src="../images/event/" alt="">
                                <div class="image-area col-lg-12 m-t-10">
                                    <img id="imageResult1" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                    <input id="upload1" type="file" name="file1" onchange="readURL1(this);" class="form-control border-0">
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                        </div>
                    </div>
                </div>';
        }
        function event3($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
            echo '<div class="col-lg-12 ">
                    <div class="col-lg-12 bg10">
                        <div class="row "><input type="text" name="title" value="'.$cal->tieude.'"  placeholder="Title"  class="p-t-30 text-center col-lg-12 p-t-20 text-title"></div>
                        <div class="image-area col-lg-12 m-t-10">
                            <img id="imageResult" src="../images/event/'.$cal->anh1.'" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                            <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                        </div>
                        <input type="hidden" id="btn" value="4">
                        <div class="col-lg-12">
                            <div class="col-lg-4">
                                <div class="row">
                                    <div class="col-lg-12 p-t-100 text-center"><H2>Mã Giảm Giá</H2></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><input id="copyArea" name="code" value="'.$cal->MaVocher.'" type="text" class="form-control col-lg-12"></div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="col-lg-12 text-center">Nội dung 1:</div>
                                <div class="col-lg-12"><textarea name="noidung1" value="" class="text-size2 form-control col-lg-12 p-t-30" rows="14">'.$cal->noidung1.'</textarea></div>
                            </div>
                        <div class="col-lg-12">
                            <div class="col-lg-12 text-center m-t-20">Nội dung 2:</div>
                            <div class="col-lg-12"><textarea name="noidung2" class="text-size2 form-control p-t-30" rows="10">'.$cal->noidung2.'</textarea></div></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-7">
                                <div class="col-lg-12 text-center m-t-20">Nội dung 3:</div>
                                <textarea name="noidung3" class="text-size2 row form-control m-b-20" rows="20">'.$cal->noidung3.'</textarea>
                            </div>
                            <div class="col-lg-5 ">
                                <img class="col-lg-12 m-t-10" src="../images/event/" alt="">
                                <div class="image-area col-lg-12 m-t-10">
                                    <img id="imageResult1" src="../images/event/'.$cal->anh2.'" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                    <input id="upload1" type="file" name="file1" onchange="readURL1(this);" class="form-control border-0">
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                        </div>
                    </div>
                </div>';
            }
        }
        function event5($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
            echo '<div class="col-lg-12 ">
                    <div class="col-lg-12 bg10">
                        <div class="row "><input type="text" name="title" value="'.$cal->tieude.'"  placeholder="Title"  class="p-t-30 text-center col-lg-12 p-t-20 text-title"></div>
                        <div class="image-area col-lg-12 m-t-10">
                            <img id="imageResult" src="../images/event/'.$cal->anh1.'" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                            <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                        </div>
                        <input type="hidden" id="btn" value="4">
                        <div class="col-lg-12">
                            <div class="col-lg-12">
                                <div class="col-lg-12 text-center">Nội dung 1:</div>
                                <div class="col-lg-12"><textarea name="noidung1" value="" class="text-size2 form-control col-lg-12 p-t-30" rows="14">'.$cal->noidung1.'</textarea></div>
                            </div>
                        <div class="col-lg-12">
                            <div class="col-lg-12 text-center m-t-20">Nội dung 2:</div>
                            <div class="col-lg-12"><textarea name="noidung2" class="text-size2 form-control p-t-30" rows="10">'.$cal->noidung2.'</textarea></div></div>
                        </div>
                        <div class="col-lg-12">
                            <div class="col-lg-7">
                                <div class="col-lg-12 text-center m-t-20">Nội dung 3:</div>
                                <textarea name="noidung3" class="text-size2 row form-control m-b-20" rows="20">'.$cal->noidung3.'</textarea>
                            </div>
                            <div class="col-lg-5 ">
                                <img class="col-lg-12 m-t-10" src="../images/event/" alt="">
                                <div class="image-area col-lg-12 m-t-10">
                                    <img id="imageResult1" src="../images/event/'.$cal->anh2.'" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                    <input id="upload1" type="file" name="file1" onchange="readURL1(this);" class="form-control border-0">
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-30">
                            <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                        </div>
                    </div>
                </div>';
            }
        }
        function event6($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-lg-12 ">
                            <div class="col-lg-12 bg10">
                                <div class="row text-center"><p  class="p-t-30 p-t-20 text-title">'.$cal->tieude.'</p></div>
                                <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh1.'" alt="">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <p class="text-size2 p-t-30">'.$cal->noidung1.'</p></div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-12"><p class="text-size2 p-t-30">'.$cal->noidung2.'</p></div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-7"><p class="text-size2 p-t-30">'.$cal->noidung3.'</p></div>
                                    <div class="col-lg-5">
                                        <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh2.'" alt="">
                                    </div>
                                </div>
                                <div class="row p-t-30">
                                    <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                                </div>
                            </div>
                        </div>';
            }
        }
        function event7($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                $date = substr($cal->date,8);
                $thang1 = substr($cal->date,5);
                $thang =substr($cal->date,0,7);
                $nam =substr($cal->date,4);
                echo '<div class="col-md-12 col-lg-6 p-b-80">
                <div class="p-r-45 p-r-0-lg">
                    <!-- item blog -->
                    <div class="p-b-63">
                        <a href="blog-detail.php?id='.$cal->ID_BV.'&sta='.$cal->ID_loai.'" class="hov-img0 how-pos5-parent">
                            <img src="./images/event/'.$cal->anh1.'" alt="IMG-BLOG">

                            <div class="flex-col-c-m size-123 bg9 how-pos5">
                                <span class="ltext-107 cl2 txt-center">
                                    '.$date.'
                                </span>

                                <span class="stext-109 cl3 txt-center">
                                '.$thang.'
                                </span>
                            </div>
                        </a>

                        <div class="p-t-32">
                            <h4 class="p-b-15">
                                <a href="blog-detail.php?id='.$cal->ID_BV.'&sta='.$cal->ID_loai.'" class="ltext-108 cl2 hov-cl1 trans-04">
                                '.$cal->tieude.'
                                </a>
                            </h4>

                            <p class="stext-117 cl6">
                            '.$cal->noidung1.'
                            </p>

                            <div class="flex-w flex-sb-m p-t-18">
                                <span class="flex-w flex-m stext-111 cl2 p-r-30 m-tb-10">
                                    
                                </span>

                                <a href="blog-detail.php?id='.$cal->ID_BV.'&sta='.$cal->ID_loai.'" class="stext-101 cl2 hov-cl1 trans-04 m-tb-10">
                                    Xem thêm

                                    <i class="fa fa-long-arrow-right m-l-9"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>';
            }
        }
        function event9($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-lg-12 m-tb-30">
                            <div class="row bg10 p-l-20 p-r-10">
                                <div class="col-lg-12"><p  class="p-b-70 text-center p-t-40 text-title">'.$cal->tieude.'</p></div>
                                <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh1.'" alt="">
                                <div class="row">
                                   <div class="col-lg-4">
                                        <div class="row">
                                        <input type="hidden" id="btn" value="3">
                                            <div class="col-lg-12 p-t-100 text-center"><H2>Mã Giảm Giá</H2></div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-1"></div>
                                            <div class="col-lg-8"><input disabled id="copyArea" value="'.$cal->MaVocher.'" type="text" class="form-control col-lg-12"></div>
                                            <div class="col-lg-3"><button id="copy"  class="btn btn-info"><i class="fa fa-files-o"></i></button></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <p class="text-size2 p-t-30 text-tintuc">'.$cal->noidung1.'</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12"><p class="text-size2 p-t-30 text-tintuc">'.$cal->noidung2.'</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7"><p class="text-size2 p-t-30">'.$cal->noidung3.'</p></div>
                                    <div class="col-lg-5">
                                        <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh2.'" alt="">
                                    </div>
                                </div>
                                <div class="col-lg-12 p-t-30">
                                    <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                                </div>
                            </div>
                        </div>';
            }
        }
        function event10($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-lg-12 m-tb-30">
                            <div class="col-lg-12 bg10">
                                <div class="col-lg-12"><p  class="p-b-70 text-center p-t-40 text-title">'.$cal->tieude.'</p></div>
                                <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh1.'" alt="">
                                <div class="col-lg-12">
                                    <div class="col-lg-12">
                                        <p class="text-size2 p-t-30">'.$cal->noidung1.'</p></div>
                                    </div>
                                <div class="col-lg-12">
                                    <div class="col-lg-12"><p class="text-size2 p-t-30">'.$cal->noidung2.'</p></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-7"><p class="text-size2 p-t-30">'.$cal->noidung3.'</p></div>
                                    <div class="col-lg-5">
                                        <img class="col-lg-12 m-t-10" src="../images/event/'.$cal->anh2.'" alt="">
                                    </div>
                                </div>
                                <div class="row p-t-30">
                                    <img class="col-lg-12" src="../images/event/th.jfif" alt="">
                                </div>
                            </div>
                        </div>';
            }
        }
//end event
// Start bao hanh
    function baohanh($url){
        $xem = $this->readAPI($url);
        $i = 0;
        foreach($xem as $cal){
            echo '<form method="post"  enctype="multipart/form-data" class="text-center col-lg-12 bor7">
                    <input name ="voucher" value="'.$cal->code.'" type="hidden" class="form-control col-lg-12">
                    <input name ="code" value="'.$cal->ID_Voucher.'" type="hidden" class="form-control col-lg-12">
                    <div class="col-lg-1 text-center  p-t-15 p-b-5"><p class="p-l-23 ">'.++$i.'</p></div>
                    <div class="col-lg-2"><p class="p-l-20 p-t-15 p-b-5"></p></div>
                    <div class="col-lg-1"><p class="p-l-20 p-t-15 p-b-5"></p></div>
                    <div class="col-lg-1"><p class="p-l-20 p-t-15 p-b-5"></p></div>
                    <div class="col-lg-2"><p class="p-l-20 p-t-15 p-b-5"></p></div>
                    <div class="col-lg-2"><p class="p-l-20 p-t-15 p-b-5"></p></div>
                    <div class="col-lg-3 m-b-5 m-t-8">
                        <button class="btn btn-info m-l-20" name="btn" value="coppy"><i class="fa fa-files-o"></i></button>
                        <button class="btn btn-primary" name="btn" value="edit"><i  class="fa fa-pencil-square-o" ></i></button>
                        <button class="btn btn-danger" name="btn" value="ban"><i class="fa fa-ban""></i></button>
                    </div>
                    <input type="hidden" id="btn" value="1">
                </form>';
        }
    }
   
    function modal_baohanh(){
        echo '<form method="post"  enctype="multipart/form-data" class="col-lg-12 m-t-200">
                <div class="row ">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 bg10 p-b-50">
                        <h2 class="text-center text-color col-lg-12 p-tb-20 bg11">TÌM PHIẾU BẢO HÀNH</h2>
                        <div class="col-lg-12 p-tb-10 ">
                            <div class="col-lg-5 text-color text-size">Mã sản phẩm :</div>
                            <input type="text" name="code" value=""  placeholder="Nhập mã phiếu bảo hành" class="col-lg-9 border border-dark btn ">
                            <div class="col-lg-1"></div>
                            <button type="submit" name="search" value="timkiem" class="btn btn-info col-lg-2"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </div>
                    </div>
                    <input type="hidden" id="btn" value="1">
                </div>
            </form>';
    }
    function showbaohanh($url){
        $xem = $this->readAPI($url);
        foreach($xem as $cal){
            echo '<form  method="post" enctype="multipart/form-data" class="m-t-20" style="background-color: #ffffff;">
                    <div class="col-lg-12">
                        <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">PHIẾU BẢO HÀNH</h2>
                    </div>
                    <div class="">
                    <div class="col-lg-5">
                        <div class="row">
                        <a href="../gbrqrcode/baohanh/'.$cal->Hash.'.png" download class="image-area mt-4"><img id="imageResult"  src="../gbrqrcode/baohanh/'.$cal->Hash.'.png" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                        </a>
                        </div>
                        <input type="hidden" id="btn" value="4">
                    </div>
                    <div class="col-lg-7 p-t-30">
                        <input type="hidden" name="id" value="'.$cal->Hash.'">
                        <div class="row bor24 p-b-10">
                        <span class="col-lg-4  text-size1">Sản phẩm :</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->TenSP.'('.$cal->Mau.'-'.$cal->Ram.'-'.$cal->Rom.')</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Ngày mua :</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->NgayMua.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Ngày hết hạn :</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->NgayHetHan.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Imei:</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->CodeMay.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Số điện thoại:</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->Phone.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Lịch sử:</span>
                        <textarea  class="col-lg-8" disabled rows="8">'.$cal->GhiChu.'</textarea>
                        </div >
                        <div class="row m-t-20 p-b-10">
                            <button name="btn" value="update" class="col-lg-12 btn btn-info text-size2 text-uppercase">Bảo hành</button>
                        </div>
                    </div>
                    </div>
                </form>';
        }
    }
    function showbaohanh1($url){
        $xem = $this->readAPI($url);
        foreach($xem as $cal){
            echo '<form  method="post" enctype="multipart/form-data" class="m-t-20 m-b-70" style="background-color: #ffffff;">
                    <div class="col-lg-12">
                        <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">PHIẾU BẢO HÀNH</h2>
                    </div>
                    <div class="row">
                    <div class="col-lg-5 text-center">
                        <div class="row">
                            <div class="image-area mt-4"><img id="imageResult" src="./gbrqrcode/baohanh/'.$cal->Hash.'.png" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                        </div>
                        </div>
                        <input type="hidden" id="btn" value="4">
                    </div>
                    <div class="col-lg-7 p-t-30">
                        <input type="hidden" name="id" value="'.$cal->ID_SP.'">
                        <div class="row bor24 p-b-10">
                        <span class="col-lg-4  text-size1">Sản phẩm :</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->TenSP.'('.$cal->Mau.'-'.$cal->Ram.'-'.$cal->Rom.')</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Ngày mua :</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->NgayMua.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Ngày hết hạn :</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->NgayHetHan.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Imei:</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->CodeMay.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Số điện thoại:</span>
                        <div class="col-lg-8 text-size2 text-uppercase">'.$cal->Phone.'</div>
                        </div>
                        <div class="row m-t-5 bor24 p-b-5">
                        <span class="col-lg-4  text-size1">Lịch sử:</span>
                        <textarea  class="col-lg-8" disabled rows="8">'.$cal->GhiChu.'</textarea>
                        </div>
                    </div>
                    </div>
                </form>';
        }
    }
    function timkiem_baohanh(){
        echo '<form method="post"  enctype="multipart/form-data">
                <div class="row ">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8 bg15">
                        <h2 class="text-center text-color col-lg-12 p-tb-20 bg11">THÔNG TIN PHIẾU BẢO HÀNH</h2>
                        <div class="col-lg-12 p-tb-10">
                        <div class="col-lg-5 text-color text-size">Mã sản phẩm :</div>
                        <input type="text" name="code" id="idsp" value="" class="col-lg-12 form-control">
                        </div>
                        <div class=" col-lg-12 p-tb-10">
                        <div class="col-lg-3 text-color text-size">Imei máy :</div>
                        <input type="text" name="imei" id="emei" value=""  class="col-lg-12 form-control">
                        </div> 
                        <div class=" col-lg-12 p-tb-10">
                        <div class="col-lg7 text-color text-size">Số điện thoại khách hàng :</div>
                        <input type="text" name="phone" value="" id="phone"  class="col-lg-12 form-control">
                        </div> 
                        <div class=" col-lg-12 p-tb-10">
                        <div class="col-lg-3 text-color text-size">Ngày mua :</div>
                        <input type="date" name="start" value="" id="start"  class="col-lg-12 form-control">
                        </div> 
                        <div class=" col-lg-12 p-tb-10">
                        <div class="col-lg-7 text-color text-size">Ngày hết bảo hành :</div>
                        <input type="date" name="end" value="" id="end"  class="col-lg-12 form-control">
                        </div>
                        <div class=" col-lg-12 p-tb-20">
                        <button name="btn" value="submit"  class="btn btn-info col-lg-12">Tạo</button>
                        </div>
                    </div>
                    <input type="hidden" id="btn" value="5">
                </div>
            </form>';
    }

//end bao hanh
//start voucher
        function voucher($url){
            $xem = $this->readAPI($url);
            $i = 0;
            foreach($xem as $cal){
                echo '<form method="post"  enctype="multipart/form-data" class="text-center col-lg-12 bor7">
                        <input name ="voucher" value="'.$cal->code.'" type="hidden" class="form-control col-lg-12">
                        <input name ="code" value="'.$cal->ID_Voucher.'" type="hidden" class="form-control col-lg-12">
                        <div class="col-lg-1 text-center  p-t-15 p-b-5"><p class="p-l-23 ">'.++$i.'</p></div>
                        <div class="col-lg-2"><p class="p-l-20 p-t-15 p-b-5">'.$cal->code.'</p></div>
                        <div class="col-lg-1"><p class="p-l-20 p-t-15 p-b-5">'.$cal->giamgia.'</p></div>
                        <div class="col-lg-1"><p class="p-l-20 p-t-15 p-b-5">'.$cal->SoLanDung.'</p></div>
                        <div class="col-lg-2"><p class="p-l-20 p-t-15 p-b-5">'.$cal->NgayBatDau.'</p></div>
                        <div class="col-lg-2"><p class="p-l-20 p-t-15 p-b-5">'.$cal->NgayKetThuc.'</p></div>
                        <div class="col-lg-3 m-b-5 m-t-8">
                            <button class="btn btn-info m-l-20" name="btn" value="coppy"><i class="fa fa-files-o"></i></button>
                            <button class="btn btn-primary" name="btn" value="edit"><i  class="fa fa-pencil-square-o" ></i></button>
                            <button class="btn btn-danger" name="btn" value="ban"><i class="fa fa-ban""></i></button>
                        </div>
                        <input type="hidden" id="btn" value="1">
                    </form>';
            }
        }
        function modal_voucher($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form method="post"  enctype="multipart/form-data" class="col-lg-12 m-tb-20">
                            <div class="row ">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8 bg15">
                                    <h2 class="text-center text-color col-lg-12 p-tb-20 bg11">Voucher</h2>
                                    <div class="col-lg-12 p-tb-10">
                                    <div class="col-lg-5 text-color text-size">Mã giảm giá :</div>
                                    <input type="text" name="code" value="'.$cal->code.'" class="col-lg-12 form-control">
                                    </div>
                                    <div class=" col-lg-12 p-tb-10">
                                    <div class="col-lg-3 text-color text-size">Giảm giá :</div>
                                    <input type="text" name="dis" value="'.$cal->giamgia.'"  class="col-lg-12 form-control">
                                    </div> 
                                    <div class="col-lg-12 p-tb-10">
                                    <div class="col-lg-3 text-color text-size">Số lần dùng :</div>
                                    <input type="text" name="num" value="'.$cal->SoLanDung.'"  class="col-lg-12 form-control">
                                    </div> 
                                    <div class=" col-lg-12 p-tb-10">
                                    <div class="col-lg-3 text-color text-size">Ngày bắt đầu :</div>
                                    <input type="date" name="start" value="'.$cal->NgayBatDau.'"  class="col-lg-12 form-control">
                                    </div> 
                                    <div class=" col-lg-12 p-tb-10">
                                    <div class="col-lg-3 text-color text-size">Ngày kết thúc :</div>
                                    <input type="date" name="end" value="'.$cal->NgayKetThuc.'"  class="col-lg-12 form-control">
                                    </div>
                                    <div class=" col-lg-12 p-tb-20">
                                    <button name="btn" value="save"  class="btn btn-info col-lg-12">Lưu</button>
                                    </div>
                                </div>
                                <input type="hidden" id="btn" value="5">
                            </div>
                        </form>';
            }
        }
        function modal_voucher1(){
            echo '<form method="post"  enctype="multipart/form-data" class="col-lg-12 m-tb-20">
                    <div class="row ">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 bg15">
                            <h2 class="text-center text-color col-lg-12 p-tb-20 bg11">Voucher</h2>
                            <div class="col-lg-12 p-tb-10">
                            <div class="col-lg-5 text-color text-size">Mã giảm giá :</div>
                            <input type="text" name="code" value="" class="col-lg-12 form-control">
                            </div>
                            <div class=" col-lg-12 p-tb-10">
                            <div class="col-lg-3 text-color text-size">Giảm giá :</div>
                            <input type="text" name="dis" value=""  class="col-lg-12 form-control">
                            </div> 
                            <div class="col-lg-12 p-tb-10">
                            <div class="col-lg-3 text-color text-size">Số lần dùng :</div>
                            <input type="text" name="num" value=""  class="col-lg-12 form-control">
                            </div> 
                            <div class=" col-lg-12 p-tb-10">
                            <div class="col-lg-3 text-color text-size">Ngày bắt đầu :</div>
                            <input type="date" name="start" value=""  class="col-lg-12 form-control">
                            </div> 
                            <div class=" col-lg-12 p-tb-10">
                            <div class="col-lg-3 text-color text-size">Ngày kết thúc :</div>
                            <input type="date" name="end" value=""  class="col-lg-12 form-control">
                            </div>
                            <div class=" col-lg-12 p-tb-20">
                            <button name="btn" value="submit"  class="btn btn-info col-lg-12">Tạo</button>
                            </div>
                        </div>
                        <input type="hidden" id="btn" value="5">
                    </div>
                </form>';
        }
// end voucher
        function readProduct_QL($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form action="" class="col-lg-3 m-tb-10 ">
                <div class="col-lg-12 bg13 cao">
                  <a href="?btn=view&id='.$cal->ID_SP.'" class="container">
                    <img src="../images/'.$cal->anhchinh.'" alt="" class="col-lg-12 image">
                    <input type="hidden" id="btn" value="1">
                    <div class="middle">
                      <div class=" text"><i  class="fa fa-eye"></i></div>
                    </div>
                  </a>
                  <h4 class="col-lg-12 text-center p-b-10">'.$cal->TenSP.'</h4>
                </div>
            </form>';
            }
        }
        function readProduct_Loai_QL($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form action="" class="col-lg-3 m-tb-10 ">
                <div class="col-lg-12 bg13 cao">
                  <a href="?btn=detail&id='.$cal->ID_CTSP.'" class="container">
                    <img src="../images/'.$cal->Anh.'" alt="" class="col-lg-12 image">
                    
                    <div class="middle">
                      <div class=" text"><i  class="fa fa-eye"></i></div>
                    </div>
                  </a>
                  <h5 class="col-lg-12 text-center p-b-10">'.$cal->TenSP.' ('.$cal->Mau.'/'.$cal->Ram.'/'.$cal->Rom.')</h5>
                </div>
            </form>';
            }
            echo '<input type="hidden" id="btn" value="2">';
        }
        function readProduct_Detail_QL($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="m-t-20" style="background-color: #ffffff;">
                        <div class="col-lg-12">
                            <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">'.$cal->TenSP.'</h2>
                        </div>
                        <div class="">
                        <div class="col-lg-5">
                            <img src="../images/'.$cal->Anh.'" class="col-lg-12" alt="">
                            <input type="hidden" id="btn" value="3">
                        </div>
                        <div class="col-lg-7 p-t-30">
                            <div class="row bor24">
                            <span class="col-lg-4  text-size1">Giá:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->gia.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Có sẵn:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->SoLuong.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Màu:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->Mau.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Màn hình:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->ManHinh.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Chip:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->Chip.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">RAM:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->Ram.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Bộ nhớ:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->Rom.'</div>
                            </div>
                            <div class="row m-t-10 bor24">
                            <span class="col-lg-4  text-size1">Hãng:</span>
                            <div class="col-lg-8 text-size2 text-uppercase">'.$cal->NhaCungCap.'</div>
                            </div>
                        </div>
                        </div>
                    </div>';
            }
        }
        function readProduct_TN($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form><div class="col-lg-4 bor20 isotope-item '.$cal->NhaCungCap.'">
                <div class="row bg6">
                <img class="col-lg-4 m-b-10 m-t-10" src="../images/'.$cal->Anh.'" alt="" srcset="">
                <div class="col-lg-8 m-b-2  m-t-10">
                    <input type="hidden" name="id" value="'.$cal->ID_CTSP.'">
                    <div class="row"><span>'.$cal->TenSP.'</span></div>
                    <div class="row"><span>Giá: '.$cal->gia.' VND</span></div>
                    <div class="row"><span>SL: '.$cal->SoLuong.' cái</span></div>
                    <div class="row"><span>CT:('.$cal->Mau.'/'.$cal->Ram.'/'.$cal->Rom.')</span></div>
                    
                    <div class="row">
                        <button type="submit" name="button" value="add" class="btn btn-info">
                        <span class="fa fa-cart-plus"></span>
                        </button>
                    </div>
                </div>
                </div>
                <div class="row">
                <div class="col-lg-12 bg11"><span class="code">Mã: '.$cal->ID_CTSP.'dk</span></div>
                </div>
            </div></form>';
            }
        }
        function readHistory_TN($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form><div class="col-lg-4 bor20 isotope-item">
                <div class="row bg6">
                <img class="col-lg-4 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset="">
                <div class="col-lg-8 m-b-2  m-t-10">
                    <input type="hidden" name="id" value="'.$cal->id.'">
                    <div class="row"><span>Mã DH: DK'.$cal->id.'</span></div>
                    <div class="row"><span>Tổng tiền: '.$cal->total.' VND</span></div>
                    <div class="row"><span>Thời gian: '.$cal->date.'</span></div>
                    <input type="hidden" name="dh" value="'.$_SESSION['dh'].'">
                    <div class="row">
                        <button type="submit" name="button" value="see" class="btn btn-info">
                        <span class="fa fa-eye"></span>
                        </button>
                    </div>
                </div>
                </div>
            </div></form>';
            }
        }
        //

        //đến đây

        //
        function readPurchaseTitle_stock($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-lg-12">
                <div class="row bg11" style="color: black;">
                  <div class="col-lg-4"></div>
                  <div class="col-lg-5">
                    <div class="col-lg-4"></div><h2 class="col-lg-12">ĐƠN MUA HÀNG</h2>
                    <H5 class="col-lg-12">Mã: DK_PO'.$cal->ID_DM.' </H5>
                    <p class="col-lg-12">Ngày giao dịch: '.$cal->Date.'</p>
                  </div>
                  <div class="col-lg-3"></div>
                </div>
                <div class="row m-t-20">
                  <div class="col-lg-12">
                    <div class="col-lg-12">
                      <textarea name="note" readonly id="" class="col-lg-12" id="note" rows="10">Lịch sử :'.$cal->note.'
                      </textarea>
                    </div>
                  </div>
                </div>
                <div class="row m-t-30 bg13" style="color: black;">
                  <div class="col-lg-12 text-center p-tb-20" >
                    <div class="col-lg-1">#</div>
                    <div class="col-lg-4">Sản phẩm</div>
                    <div class="col-lg-3">Vị trí</div>
                    <div class="col-lg-2">Số lượng</div>
                    <div class="col-lg-2">Thao tác</div>
                  </div>
                </div>
               
                <div class="row bor7 text-center p-tb-1" style="color: black;">
                  <form class="col-lg-12 " >
                    
                  </form>
                </div>';
                break;
            }
        }
        function readPurchase_stock($url){
            $xem = $this->readAPI($url);
            $this->readPurchaseTitle_stock($url);
            $i=0;
            foreach($xem as $cal){
                echo '<div class="row bor7 text-center p-tb-15" style="color: black;">
                        <form method="post" class="col-lg-12 " >
                            <div class="col-lg-1 p-t-9">'.++$i.'</div>
                            <div class="col-lg-4 p-t-9">'.$cal->TenSanPham.'('.$cal->mota.')</div>
                            <div class="col-lg-3  p-t-9">Khu'.$cal->TenKhu.' / Tầng'.$cal->Tang.' / Vị trí'.$cal->ViTri.'</div>
                            <input type="hidden" name="sp" value="'.$cal->ID_CTSP.'">
                            <input type="hidden" name="namesp" value="'.$cal->TenSanPham.'">
                            <input type="hidden" name="mota" value="'.$cal->mota.'">
                            <div class="col-lg-2"><input name="qty" min="0" max="1000"  type="number"  class="text-center form-control col-lg-10" value="'.$cal->SoLuong.'"></div>
                            <div class="col-lg-2">
                                <button class="btn btn-info" name="btn" value="update"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                            </div>
                        </form>
                        </div>
                    ';
            }
            echo '</div>';
        }
        function readPurchase_stock1($url){
            $xem = $this->readAPI($url);
            $this->readPurchaseTitle_stock($url);
            $i=0;
            foreach($xem as $cal){
                echo '<div class="row bor7 text-center p-tb-15" style="color: black;">
                        <form method="post" class="col-lg-12 " >
                            <div class="col-lg-1 p-t-9">'.++$i.'</div>
                            <div class="col-lg-4 p-t-9">'.$cal->TenSanPham.'('.$cal->mota.')</div>
                            <div class="col-lg-3  p-t-9">Khu'.$cal->TenKhu.' / Tầng'.$cal->Tang.' / Vị trí'.$cal->ViTri.'</div>
                            <input type="hidden" name="sp" value="'.$cal->ID_CTSP.'">
                            <input type="hidden" name="namesp" value="'.$cal->TenSanPham.'">
                            <input type="hidden" name="mota" value="'.$cal->mota.'">
                            <div class="col-lg-2"><input  name="qty" min="0" max="1000" readonly  type="number"  class="text-center form-control col-lg-10" value="'.$cal->SoLuong.'"></div>
                            <div class="col-lg-2">
                            </div>
                        </form>
                        </div>
                    ';
            }
            echo '</div>';
        }
        function readPuschase($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form class="hov10"><a href="purchaseOrder.php?id='.$cal->ID_DM.'&date='.$cal->Date.'" class="col-lg-3 bor20 isotope-item ">
                            <div class="row bg6">
                                <img class="col-lg-4 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset="">
                                <div class="col-lg-8 m-b-2  m-t-10">
                                    <input type="hidden" name="id" value="'.$cal->ID_DM.'">
                                    <div class="row"><span>Mã: DK_PO'.$cal->ID_DM.'</span></div>
                                    <div class="row"><span>Đến: '.$cal->ThuNhan.'</span></div>
                                    <div class="row"><span>Ngày giao dịch: '.$cal->Date.'</span></div>
                                    <div class="row"><span>Tổng tiền: '.$cal->TongDon.'VND</span></div>
                                </div>
                            </div>
                        </a></form>';
            }
        } 
        function readPurchase_mail($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                if($cal->ThuNhan != '')
                    $k = 'readonly';
                echo '<div class="col-lg-12 bg16">
                <div class="row bg2">
                    <div class="col-lg-2"> 
                        <img src="../images/logo.png" class="col-lg-12 p-t-7" alt="">
                    </div>
                    <div class="col-lg-5"></div>
                    <div class="col-lg-5">
                        <H3 class="row">DK_Purchase_Order_'.$cal->ID_DM.'</H3>
                        <span class="row">Ngày giao dịch: '.$cal->Date.'</span>
                    </div>
                </div>
                <div class="row  m-tb-20">
                    <div class="col-lg-12 bor18"></div>
                </div>
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5">
                        <div class="row p-t-10" >Gửi từ: dkstore@gmail.com</div>
                    </div>
                    <div class="col-lg-6 bor16">
                        <div class="row p-l-20">
                          <div class="col-lg-1 p-t-10">Đến:</div> 
                          <div class="col-lg-11"><input type="email" '.$k.'  value="'.$cal->ThuNhan.'" name="tmail" class="form-control" placeholder="Email"></div>
                        </div>
                    </div>
                </div>
                <div class="row  m-tb-20">
                    <div class="col-lg-12 bor18"></div>
                </div>
                <div class="row text-center  p-b-15 bor12">
                    <div class="col-lg-1">#</div>
                    <div class="col-lg-2">Sản phẩm</div>
                    <div class="col-lg-4">Chi tiết</div>
                    <div class="col-lg-2">Giá</div>
                    <div class="col-lg-1">Số lượng</div>
                    <div class="col-lg-2">Tổng tiền</div>
                </div>';

                break;
            }
        }
        function readPurchase_mail1($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                if($cal->ThuNhan != '')
                    $k = 'readonly';
                echo '<div class="card">
                <div class="card-header">
                    <a class=" d-inline-block" href="index.html" data-abc="true"><img class="col-lg-6" src="../images/logo.png" alt=""></a>
                    <div class="float-right"> <h3 class="mb-0">DK_Purchase_Order_'.$cal->ID_DM.'</h3>Ngày giao dịch: '.$cal->Date.'</div>
                </div>
                
                <div class="card-body">
                    <div class="table-responsive-sm">
                    <div class="row mb-3">
                        <div class="col-lg-1 col-sm-1"></div>
                    </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th class="right">Giá</th>
                                    <th class="center">Số lượng</th>
                                    <th class="right">Tổng tiền</th>
                                </tr>
                            </thead>
                            <tbody>';
                break;
            }
        }
        function readExportPurchaseDetail1($url){
            $xem = $this->readAPI($url);
            $this->readPurchase_mail1($url);
            $i = 1;
            $sum =0;
            foreach($xem as $cal){
                $total =  $cal->gia * $cal->SoLuong;
                echo '<tr>
                        <td class="center">'.$i++.'</td>
                        <td class="left">'.$cal->TenSanPham.'</td>
                        <td class="left">'.$cal->mota.'</td>
                        <td class="right">'.$cal->gia.'</td>
                        <td class="center">'.$cal->SoLuong.'</td>
                        <td class="right">'.$total.'</td>
                    </tr>';
                $sum = $sum + $total;
            }
            echo '</tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-sm-5">
                        </div>
                        <input type="hidden" id="id" value="'.$cal->ID_DM.'">
                        <div class="col-lg-4 col-sm-5 ml-auto">
                            <table class="table table-clear">
                                <tbody>
                                    <tr>
                                        <td class="left">
                                        <strong class="text-dark">Tính tiền</strong>
                                        </td>
                                        <td class="right">'.$sum.' VND</td>
                                    </tr>
                                    <tr>
                                        <td class="left">
                                        <strong class="text-dark">Tổng tiền</strong>
                                        </td>
                                        <td class="right">
                                        <strong class="text-dark">'.$sum.' VND</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-white">
                    <p class="mb-0">334 Chu Van An, Phuong 12, Binh Thanh, Ho Chi Minh</p>
                </div>
            </div>';
        }
        function readExportPurchaseDetail($url){
            $xem = $this->readAPI($url);
            $this->readPurchase_mail($url);
            $i = 1;
            $sum =0;
            foreach($xem as $cal){
                $total =  $cal->gia * $cal->SoLuong;
                echo '<div class="row text-center p-tb-15 bor12">
                            <div class="col-lg-1">'.$i++.'</div>
                            <div class="col-lg-2">'.$cal->TenSanPham.'</div>
                            <div class="col-lg-4">'.$cal->mota.'</div>
                            <div class="col-lg-2">'.$cal->gia.'</div>
                            <div class="col-lg-1">'.$cal->SoLuong.'</div>
                            <div class="col-lg-2">'.$total.'</div>
                        </div>';
                $sum = $sum + $total;
            }
            echo '<div class="row m-tb-30">
                    <div class="col-lg-7"></div>
                    <div class="col-lg-5">
                        <div class="row p-tb-15 bor18">
                            <div class="col-lg-5 float-l">Tính tiền: </div>
                            <div class="col-lg-7 float-r">'.$sum.' VND</div>
                        </div>
                        <div class="row p-tb-15 bor18">
                            <div class="col-lg-5 float-l">Tổng tiền: </div>
                            <div class="col-lg-7 float-r">'.$sum.' VND</div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="id" value="'.$cal->ID_DM.'">
                <div class="row bg2 ">
                    <div class="col-lg-12 m-tb-30 text-center"> 
                        <span>334 Chu Van An, Phuong 12, Binh Thanh, Ho Chi Minh</span>
                    </div>
                </div>
            </div>';
        }
        function readOrder_Stock($url,$dh){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form><div class="col-lg-4 bor20 isotope-item">
                <div class="row bg6">
                <img class="col-lg-4 col-xs-3 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset="">
                <div class="col-lg-8 col-xs-9 m-b-2  m-t-10">
                    <input type="hidden" name="id" value="'.$cal->id.'">
                    <input type="hidden" name="dh" value="'.$dh.'">
                    <div class="row"><span>Mã đơn: DK'.$cal->id.'</span></div>
                    <div class="row"><span>Tổng tiền: '.$cal->total.'</span></div>
                    <div class="row"><span>Thời gian: '.$cal->date.'</span></div>
                    <div class="row">
                        <button type="submit" name="button" value="see" class="btn btn-info" onclick="hideinfo">
                        <span class="fa fa-eye"></span>
                        </button>
                    </div>
                </div>
                </div>
            </div></form>';
            }
        }
        function readorderdetail_TN($url){

            $xem = $this->readAPI($url);
            $tongtien =0;
            foreach($xem as $cal){
                $tongtien = $tongtien + ($cal->soluong * $cal->Gia);
                echo '
                        <div  class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                            <a class="header-cart-item-img" href="#">
                                <div class="header-cart-item-img ml-5 mt-5">
                                    <img src="../images/'.$cal->Anh.'" alt="IMG">
                                </div>
                            </a>
                            <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                                '.$cal->ten.'
                            </a>
                            <span class="header-cart-item-info">
                                Mô tả: '.$cal->ten_mau.'/'.$cal->Ram.'/'.$cal->Rom.'
                            </span>
                            <span class="header-cart-item-info">
                            Giá: '.$cal->Gia.' 
                            </span>
                            <span class="header-cart-item-info">
                               SL: '.$cal->soluong.'
                            </span>
                            </div>
                        </div>';
                    echo '<div class="border-head"></div>';
            }
            echo '</div>
            <form class="row  m-t-20">
              <div class="col-lg-4"><h5 class="m-l-2 text-color">Mã giảm giá: </h5></div>
              <input class="col-lg-7 btn " type="text" size="30"  value="'.$cal->voucher.'" readonly />
            </form>
            <div class="w-full">
              <div class="header-cart-total w-full p-tb-10">
                Tổng tiền: '. $tongtien.' đ<br><br>
                <a href="?button=cancel" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-t-25">
                  Đóng
                </a>
              </div>
              <div class="header-cart-buttons flex-w w-full">
              </div>
            </div>';
        }
        function readorderdetail($url){
            $xem = $this->readAPI($url);
            $tongtien =0;
            foreach($xem as $cal){
                $tongtien = $tongtien + ($cal->soluong * $cal->Gia);
                echo '
                        <div  class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                            <a class="header-cart-item-img" href="#">
                                <div class="header-cart-item-img ml-5 mt-5">
                                    <img src="../images/'.$cal->Anh.'" alt="IMG">
                                </div>
                            </a>
                            <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                                '.$cal->ten.'
                            </a>
                            <span class="header-cart-item-info">
                            Mô tả: '.$cal->ten_mau.'/'.$cal->Ram.'/'.$cal->Rom.'
                            </span>
                            <span class="header-cart-item-info">
                            Giá: '.$cal->Gia.' 
                            </span>
                            <span class="header-cart-item-info">
                               SL: '.$cal->soluong.'
                            </span>
                            </div>
                        </div>';
                    echo '<div class="border-head"></div>';
            }
            $tt =$cal->trangthai;
            if($tt == 1){
                $status = 'Đơn hàng trả sau';
                $button = ' <div class="col-lg-2"></div><div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=submit&id=" class="btn bg3 hov-btn3 ">
                                Xác nhận
                                </a>
                            </div>
                            <div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=cancel&id=" class="btn bg3 hov-btn3 ">
                                Đóng
                                </a>
                            </div>';
            }else if($tt==2){
                $status = 'Đơn hàng trả trước';
                $button = '<div class="col-lg-2"></div><div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=submit&id=" class="btn bg3 hov-btn3 ">
                                Xác nhận
                                </a>
                            </div>
                            <div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=cancel&id=" class="btn bg3 hov-btn3 ">
                                Đóng
                                </a>
                            </div>';
            }else if($tt==3){
                $status = 'Đơn hàng đã xử lý';
                $button = '<div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=submit&id=" class="btn bg3 hov-btn3 ">
                                Xác nhận
                                </a>
                            </div>
                            <div class="header-cart-total col-lg-4 m-t-10">
                                <a>
                                    <button type="button" class="btn bg3 hov-btn3" data-toggle="modal" data-target="#myModal">
                                    Tìm kiếm
                                    </button>
                                </a>
                            </div>
                            <div class="header-cart-total col-lg-4 m-t-10">
                            <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                            Đóng
                            </a>
                            </div>';
            }else if($tt==4){
                $status = 'Đơn đã chuẩn bị hàng';
                $button = ' <div class="col-lg-2"></div>
                            <div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                                Đóng
                                </a>
                            </div>
                            <div class="header-cart-total col-lg-4 m-t-10">
                                <a href="http://localhostbill.php?btn=print&IP='.$cal->ID_DH.'"><button type="submit"  class="btn bg3 hov-btn3 ">In hóa đơn</button></a>
                            </div>';
            }else if($tt==5){
                $status = 'Đơn hàng đang được giao';
                $button = '<div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                                Đóng
                                </a>
                            </div>';
            }else if($tt==6){
                $status = 'Đơn hàng đã giao';
                $button = '<div class="header-cart-total col-lg-4 m-t-10">
                            <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                            Đóng
                            </a>
                        </div>';
            }else if($tt==7){
                $status = 'Đơn hàng hoàn';
                $button = '<div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                                Đóng
                                </a>
                            </div>';
            }else{
                $status = 'Đơn hàng đã hủy';
                $button = '<div class="header-cart-total col-lg-4 m-t-10">
                                <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                                Đóng
                                </a>
                            </div>';
            }
            if ($cal->voucher == "") {
                $vou = 'Không có mã giảm giá';
            }else{
                $vou = $cal->voucher;
            }
            echo '</div>
            <form class="row  m-t-10">
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Mã giảm giá: '.$vou.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Tổng tiền: '.$cal->TongThu.'đ</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Họ tên: '.$cal->fullname.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Số điện thoại: '.$cal->phone.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Địa chỉ giao hàng: <i>'.$cal->address.'</i></h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Trạng thái: '.$status.'</h5></div>
            </form>
            <div class="w-full m-b-10">
              <div class="header-cart-buttons flex-w w-full">
              '.$button.'
              </div>
            </div>';
        }
        function readorderdetail_SP($url){

            $xem = $this->readAPI($url);
            $tongtien =0;
            foreach($xem as $cal){
                $tongtien = $tongtien + ($cal->soluong * $cal->Gia);
                echo '
                        <div  class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                            <a class="header-cart-item-img" href="#">
                                <div class="header-cart-item-img ml-5 mt-5">
                                    <img src="../images/'.$cal->Anh.'" alt="IMG">
                                </div>
                            </a>
                            <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                                '.$cal->ten.'
                            </a>
                            <span class="header-cart-item-info">
                                Mô tả: '.$cal->ten_mau.'/'.$cal->Ram.'/'.$cal->Rom.'
                            </span>
                            <span class="header-cart-item-info">
                            Giá: '.$cal->Gia.' 
                            </span>
                            <span class="header-cart-item-info">
                               SL: '.$cal->soluong.'
                            </span>
                            </div>
                        </div>';
                    echo '<div class="border-head"></div>';
            }
            $tt =$cal->trangthai;
            if($tt == 1){
                $status = 'Đơn hàng trả sau';
            }else if($tt==2){
                $status = 'Đơn hàng trả trước';
            }else if($tt==3){
                $status = 'Đơn hàng đã xử lý';
            }else if($tt==4){
                $status = 'Đơn đã chuẩn bị hàng';
                $text = '<a href="?button=submit" class="btn bg3 hov-btn3 ">
                            <i class="fa fa-ambulance"></i> Nhận đơn giao hàng
                        </a>';
            }else if($tt==5){
                $status = 'Đơn hàng đang được giao';
                $text = '<a class="btn bg3 hov-btn3" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa fa-money"></i> Xác nhận giao hàng
                        </a>';
            }else if($tt==6){
                $status = 'Đơn hàng đã giao';
            }else if($tt==7){
                $status = 'Đơn hàng hoàn';
            }else{
                $status = 'Đơn hàng đã hủy';
            }
            if ($cal->voucher == "") {
                $vou = 'Không có mã giảm giá';
            }else{
                $vou = $cal->voucher;
            }
            $_SESSION['add']=$cal->address;
            $_SESSION['total']=$cal->TongThu;
            echo '</div>
            <form class="row  m-t-10">
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Mã giảm giá: '.$vou.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Tổng tiền thu: '.$cal->TongThu .'đ</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Họ tên: '.$cal->fullname.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Số điện thoại: '.$cal->phone.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Địa chỉ giao hàng: <i>'.$cal->address.'</i></h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Trạng thái: '.$status.'</h5></div>
            </form>
            <div class="w-full">
                <div class="col-lg-2"></div>
              <div class="header-cart-total col-lg-4 m-t-10">
                '.$text.'
              </div>
              <div class="header-cart-buttons flex-w w-full">
              </div>
            </div>';
        }
        function readorderdetail1($url){
            $xem = $this->readAPI($url);
            $tongtien =0;
            foreach($xem as $cal){
                $tongtien = $tongtien + ($cal->soluong * $cal->gia);
                echo '
                        <div  class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                            <a class="header-cart-item-img" href="#">
                                <div class="header-cart-item-img ml-5 mt-5">
                                    <img src="../images/'.$cal->Anh.'" alt="IMG">
                                </div>
                            </a>
                            <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                                '.$cal->ten.'
                            </a>
                            <span class="header-cart-item-info">
                                Mô tả: '.$cal->ten_mau.'/'.$cal->Ram.'/'.$cal->Rom.'
                            </span>
                            <span class="header-cart-item-info">
                            Giá: '.$cal->gia.' 
                            </span>
                            <span class="header-cart-item-info">
                               SL: '.$cal->soluong.'
                            </span>
                            </div>
                        </div>';
                    echo '<div class="border-head"></div>';
            }
            $tt =$cal->trangthai;
            if($tt == 1){
                $status = 'Đơn hàng trả sau';
            }else if($tt==2){
                $status = 'Đơn hàng trả trước';
            }else if($tt==3){
                $status = 'Đơn hàng đã xử lý';
            }else if($tt==4){
                $status = 'Đơn đã chuẩn bị hàng';
            }else if($tt==5){
                $status = 'Đơn hàng đang được giao';
            }else if($tt==6){
                $status = 'Đơn hàng đã giao';
            }else if($tt==7){
                $status = 'Đơn hàng hoàn';
            }else{
                $status = 'Đơn hàng đã hủy';
            }
            if ($cal->voucher == "") {
                $vou = 'Không có mã giảm giá';
            }else{
                $vou = $cal->voucher;
            }
            echo '</div>
            <form class="row  m-t-10">
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Mã giảm giá: '.$vou.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Tổng đơn: '.$cal->TongDon .'đ</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Họ tên: '.$cal->fullname.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Số điện thoại: '.$cal->phone.'</h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Địa chỉ giao hàng: <i>'.$cal->address.'</i></h5></div>
              <div class="col-lg-12"><h5 class="m-l-5 text-color">Trạng thái: '.$status.'</h5></div>
            </form>
            <div class="w-full">
                <div class="col-lg-2"></div>
              <div class="header-cart-total col-lg-4 m-t-10">
                <a href="?button=cancel" class="btn bg3 hov-btn3 ">
                  Đóng
                </a>
              </div>
              <div class="header-cart-buttons flex-w w-full">
              </div>
            </div>';
        }
        function readCartdetail_TN($url){

            $xem = $this->readAPI($url);
            $tongtien =0;
            foreach($xem as $cal){
                $tongtien = $tongtien + ($cal->Soluong * $cal->gia);
                echo '
                        <form  class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                            <a class="header-cart-item-img" href="?button=delete&ID='.$cal->ID_CTSP.'">
                                <div class="header-cart-item-img ml-5 mt-5">
                                    <img src="../images/'.$cal->Anh.'" alt="IMG">
                                    <input type="hidden" name="ID" value="'.$cal->ID_CTSP.'">
                                </div>
                            </a>
                            <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                                '.$cal->TenSanPham.'('.$cal->Mau.'/'.$cal->Ram.'/'.$cal->Rom.')
                            </a>
                            <span class="header-cart-item-info">
                                '.$cal->gia.' đ
                            </span>
                            <input type="text" size="4" readonly class="btn " value="'.$cal->Soluong.'" name="year" placeholder="SL"/>
                            <button type="submit" name="button" value="minus-num"class="btn btn-info">
                                <span class="fa fa-minus"></span>
                            </button>
                            <button type="submit" name="button" value="add-num" class="btn btn-info">
                                <span class="fa fa-plus"></span>
                            </button>
                            </div>
                        </form>';
                    echo '<div class="border-head"></div>';
            }
            $_SESSION['tongtien']= $tongtien;
            $tongtien =  $_SESSION['tongtien'] - $_SESSION['discount'];
            $voucher = $_SESSION['voucher'];
            $vou = $_SESSION['vou']*100;
            $dis = ($_SESSION['tongtien'] * $vou)/100;
            echo '</div>
            <form class="row  m-t-20">
              <div class="col-lg-1"></div>
              <input class="col-lg-7 btn " type="text" size="30" name="voucher" value="'.$_SESSION['voucher'].'" placeholder="Nhập mã giảm giá"/>
              <button class="col-lg-3 btn btn-info" name = "button" value="apply">Áp dụng</button>
            </form>
            <div class="w-full">
              <div class="header-cart-total w-full p-tb-10">
                Tính tiền:     '. $_SESSION['tongtien'].' đ<br><br>
                Giảm giá('.$vou.')%: '. $dis.' đ<br><br>
                Tổng tiền:'.$tongtien.' đ
                <a href="?button=checkout&id_nd=15" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-t-25">
                  Thanh toán
                </a>    
              </div>
              <div class="header-cart-buttons flex-w w-full">
              </div>
            </div>';
        }
        function readCartdetail_QL($url){

            $xem = $this->readAPI($url);
            $tongtien =0;
            foreach($xem as $cal){
                $tongtien = $tongtien + ($cal->Soluong * $cal->gia);
                echo '<form  class="header-cart-item flex-w flex-t m-t-7 m-b-10">
                            <a class="header-cart-item-img" href="?button=delete&ID='.$cal->ID_CTSP.'">
                                <div class="header-cart-item-img ml-5 mt-5">
                                    <img src="../images/'.$cal->Anh.'" alt="IMG">
                                    <input type="hidden" name="ID" value="'.$cal->ID_CTSP.'">
                                </div>
                            </a>
                            <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name hov-cl1 trans-04">
                                '.$cal->TenSanPham.'
                            </a>
                            <span class="header-cart-item-info">
                                '.$cal->gia.' đ
                            </span>
                            <input type="text" size="4" readonly class="btn " value="'.$cal->Soluong.'" name="year" placeholder="SL"/>
                            <button type="submit" name="button" value="minus-num"class="btn btn-info">
                                <span class="fa fa-minus"></span>
                            </button>
                            <button type="submit" name="button" value="add-num" class="btn btn-info">
                                <span class="fa fa-plus"></span>
                            </button>
                            </div>
                        </form>';
                    echo '<div class="border-head"></div>';
            }
            echo '</div> <div class="w-full">
              <form class="header-cart-total w-full">
                <div class="col-lg-12 m-t-25">
                    <div class="row">
                        <span class="col-lg-4 text-size4">Tổng đơn:</span>
                        <input type="email" readonly name="tongdon" class="form-control col-lg-7" value="'.$tongtien.'">
                    </div>
                </div>
                <button type="submit" name="button" value="create" class="flex-c-m stext-101 col-lg-12 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-t-25">
                  Tạo mới
                </a>    
              </button>
              <div class="header-cart-buttons flex-w w-full">
              </div>
            </div>';
        }
        function readExportProduct_Stock($url){
            $xem = $this->readAPI($url);
            $ft=$_SESSION['filter'];
            foreach($xem as $cal){
                echo '<form class="row bg-bg bor7 hov-btn5" data-toggle="collapse" data-target="#demo'.$cal->MaSP.'"><div >
                <div class="col-lg-12 p-b-5 p-t-10 m-t-8 isotope-item">
                        <p class="code col-lg-1 " id="code">DK'.$cal->MaSP.'</p>
                        <p class="col-lg-6">'.$cal->TenSanPham.'('.$cal->ChiTiet.')</p>
                        <p class="col-lg-2 text-center"><span class="">'.$cal->SoLuong.'Cái</span></p>
                        <p class="col-lg-3 text-center"><span class="p-l-15">Khu '.$cal->TenKhu.' - Tầng  '.$cal->Tang.' - Vị trí '.$cal->ViTri.'</span></p>
                    </div>
                    </div>
            </form>';
                echo '<div id="demo'.$cal->MaSP.'" class="collapse m-b-20" style="background-color: white;">
                <div class="row">
                <div class="col-lg-5">
                    <img src="../images/'.$cal->anh.'" class="col-lg-12" alt="">
                    <input type="hidden" id="btn" value="3">
                </div>
                <div class="col-lg-7 p-t-30">
                    <div class="row bor24">
                    <span class="col-lg-4  text-size1">Giá:</span>
                    <div class="col-lg-8 text-size2 text-uppercase">'.$cal->gia.'</div>
                    </div>
                    <div class="row m-t-10 bor24">
                    <span class="col-lg-4  text-size1">Sẵn có:</span>
                    <div class="col-lg-8 text-size2 text-uppercase">'.$cal->SoLuong.'</div>
                    </div>
                    <div class="row m-t-10 bor24">
                    <span class="col-lg-4  text-size1">Hãng:</span>
                    <div class="col-lg-8 text-size2 text-uppercase">'.$cal->cungcap.'</div>
                    </div>
                    <div class="row m-t-10 bor24">
                    <span class="col-lg-4  text-size1">Năm phát hành:</span>
                    <div class="col-lg-8 text-size2 text-uppercase">'.$cal->nam.'</div>
                    </div>
                </div>
                </div>
            </div>';
            }
        }
        
        function readShipper($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form class="col-lg-3 bor20">
                        <div class="row bg6">
                        <img class="col-lg-4 m-b-10 m-t-10" src="../images/user_admin.jpg" alt="" srcset="">
                        <div class="col-lg-8  m-t-10 m-b-10">
                            <div class="row"><span>Họ tên: '.$cal->HoDem.' '.$cal->Ten.'</span></div>
                            <div class="row"><span>Tiền thu: '.$cal->tongtien.' VND</span></div>
                            <div class="row"><span>Số lượng đơn: '.$cal->numorder.' Order</span></div>
                            <div class="row">
                                <a type="submit" href="confirm_rq_shipper.php?mand='.$cal->ID_ND.'" class="btn btn-info">
                                <span class="fa fa-check-square"> Chọn</span>
                                </a>
                            </div>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-12 bg11"><span>Mã NV: dk'.$cal->ID_ND.'</span></div>
                        </div>
                    </form>';
            }
        }
        function readExportDelivery($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                echo '<tr class="hov-table">
                        <td class="col-lg-1">'.++$i.'</td>
                        <td class="col-lg-2">DK000000'.$cal->id.'</td>
                        <td class="col-lg-2">'.$cal->date.'</td>
                        <td class="col-lg-1">'.$cal->total.'</td>
                        <td class="col-lg-3"><div class="col-lg-2"></div><img class="col-lg-8" src="../images/upload/shipping/'.$cal->anh1.'" alt=""></td>
                        <td class="col-lg-3"><div class="col-lg-2"></div><img class="col-lg-8" src="../images/upload/shipping/'.$cal->anh2.'" alt=""></td>
                    </tr>';
            }
        }
        function readExportDelivery1($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                if($cal->trangthai == "6"){
                    $status = "giao thành công";
                }else if($cal->trangthai == "7"){
                    $status ="giao thất bại";
                }else{
                    $status ="Chưa giao hàng";
                }
                echo '<div class="col-lg-3 bor20 isotope-item">
                <div class="row bg6">
                <a onclick="showdetail();" id="madh" value="58"><img class="col-lg-4 col-xs-4 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset=""></a>
                <div class="col-lg-8 col-xs-8 m-b-2  m-t-10">
                    <input type="hidden" name="id" value="'.$cal->id.'">
                    <div class="row"><span>Mã DH: DK00000'.$cal->id.'</span></div>
                    <div class="row"><span>Tổng tiền: '.$cal->total.' VND</span></div>
                    <div class="row"><span>Thời gian: '.$cal->date.'</span></div>
                    <div class="row">Trạng thái: '.$status.'</div>
                </div>
                </div>
            </div>';
            }
        }
        function readAddressShip($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                echo '<div class="row">
                            <div class="col-sm-6">
                                <h5 class="mb-1">Gửi từ:</h5>
                                <h4 class="text-dark mb-1">DK STORE</h4>
                                <div>334 Chu Van An, Phuong 12,Binh Thanh, Ho Chi Minh</div>
                                <div>Email: contact@dkstore.tk</div>
                                <div>Số điện thoại: +84 967 122 784</div>
                            </div>
                            <div class="col-sm-6 ">
                                <h5 class="mb-1">Đến:</h5>
                                <h4 class="text-dark mb-1">'.$cal->HoDem.' '.$cal->Ten.'</h4>
                                <div>'.$cal->SoNha.', '.$cal->Phuong.', '.$cal->Quan.', '.$cal->Tinh.'</div>
                                <div>Email: '.$cal->Email.'</div>
                                <div>Số điện thoại: '.$cal->SoDienThoai.'</div>
                            </div>
                        </div>';
            }
        }
        function readShipingDetail($url){
            $xem = $this->readAPI($url);
            $i=0;
            $tongtien = 0;
            foreach($xem as $cal){
                $tt = $cal->Gia * $cal->soluong;
                $tongtien = $tongtien + $tt;
                echo '<tr>
                            <td class="center">'.++$i.'</td>
                            <td class="left">'.$cal->ten.'</td>
                            <td class="left">Màu: '.$cal->ten_mau.' - Ram: '.$cal->Ram.' - Bộ nhớ: '.$cal->Rom.'</td>
                            <td class="right">'.$cal->Gia.'</td>
                            <td class="center">'.$cal->soluong.'</td>
                            <td class="right">'.$tt.'</td>
                        </tr>';
            }
            $_SESSION['tongtien']= $tongtien;
        }
        function readExportDelivery2($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                if($cal->status == "6"){
                    $status = "giao thành công";
                }else if($cal->status == "7"){
                    $status ="giao thất bại";
                }else{
                    $status ="Chưa giao hàng";
                }
                echo '<div class="col-lg-3 bor20 isotope-item">
                <div class="row bg6">
                <a href="?id='.$cal->code.'"><img class="col-lg-3 col-xs-3 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset=""></a>
                <div class="col-lg-8 col-xs-8 m-b-2  m-t-10"> 
                    <div class="row"><span>Mã DH: DK00000'.$cal->code.'</span></div>
                    <div class="row"><span>Tổng tiền: '.$cal->total.' VND</span></div>
                    <div class="row"><span>Thời gian: '.$cal->time.'</span></div>
                    <div class="row">Trạng thái: '.$status.'</div>
                </div>
                </div>
            </div>';
            }
        }
        function readExportDelivery3($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                if($cal->status == "6"){
                    $status = "giao thành công";
                }else if($cal->status == "7"){
                    $status ="giao thất bại";
                }else{
                    $status ="Chưa giao hàng";
                }
                echo '<div class="col-lg-4 bor20 isotope-item">
                <div class="row bg6">
                <a onclick="showdetail();" id="madh" value="58"><img class="col-lg-4 col-xs-4 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset=""></a>
                <div class="col-lg-8 col-xs-8 m-b-2  m-t-10">
                    <input type="hidden" name="id" value="'.$cal->id.'">
                    <div class="row"><span>Mã đơn hàng: DK00000'.$cal->code.'</span></div>
                    <div class="row"><span>Tổng tiền: '.$cal->total.' VND</span></div>
                    <div class="row"><span>Thời gian: '.$cal->time.'</span></div>
                    <div class="row">Trạng thái: '.$status.'</div>
                </div>
                </div>
            </div>';
            }
        }
        function readExportDelivery4($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                if($cal->status == "6"){
                    $status = "giao thành công";
                }else if($cal->status == "7"){
                    $status ="giao thất bại";
                }else{
                    $status ="Chưa giao hàng";
                }
                echo '<div class="col-lg-3 bor20 isotope-item">
                <div class="row bg6">
                <img class="col-lg-3 col-xs-3 m-b-10 m-t-10" src="../images/logo.png" alt="" srcset="">
                <div class="col-lg-8 col-xs-8 m-b-2  m-t-10"> 
                    <div class="row"><span>Mã DH: DK00000'.$cal->code.'</span></div>
                    <div class="row"><span>Tổng tiền: '.$cal->total.' VND</span></div>
                    <div class="row"><span>Thời gian: '.$cal->time.'</span></div>
                    <div class="row">Trạng thái: '.$status.'</div>
                </div>
                </div>
            </div>';
            }
        }
        function readsupplier($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<option value="'.$cal->ten.'">'.$cal->ten.'</option>';
            }
        }
        function readproduct1(){
                echo '<form  class="col-lg-12" method="post" enctype="multipart/form-data">
                        <div class="col-lg-1"></div>
                        <table class="col-lg-10 m-t-20">
                        <thead>
                            <tr class="bg13 bor25">
                            <th colspan="2" class="text-center"><h2>THÔNG TIN SẢN PHẨM</h2></th>
                            </tr>
                        </thead>
                        <tr class="m-t-20">
                            <td class="p-t-20"></td>
                        </tr>
                        <input type="hidden" id="btn" value = "4">
                        <tbody>
                            <tr >
                            <td class="p-tb-20">Tên sản phẩm:</td>
                            <td><input type="text" name="name" class="form-control"></td>
                            </tr>
                            <tr>
                            <td class="p-tb-20">Năm phát hành:</td>
                            <td><input type="text"  name="year" class="form-control"></td>
                            </tr>
                            <tr>
                            <td class="p-tb-20">Ảnh:</td>
                            <td><input type="file"  name="file" class="form-control" /></td>
                            </tr>
                            <tr>
                            <td class="p-tb-20">Hãng:</td>
                            <td><select name="sup" class="form-control mb-3">
                                    <option selected>Select Supplier</option>';
                        $this->readsupplier('http://localhostphp/api/exportSupplier.php');
                        echo'</select></td>
                            </tr>
                        </tbody>
                        </table>
                        <div class=" m-t-48 p-b-10">
                            <div class="col-lg-2"></div>
                            <button name="button" value="add_product" class="col-lg-8 btn btn-info text-uppercase">Thêm sản phẩm</button>
                            
                        </div>
                        </form>';
        }
        function readproduct2(){
            echo '<form class="row">
                    <div class="col-lg-1"></div>
                    
                    <table class="col-lg-10 m-t-20">
                    <thead>
                        <tr class="bg13 bor25">
                        <th colspan="2" class="text-center"><h2>THÔNG TIN SẢN PHẨM</h2></th>
                        </tr>
                    </thead>
                    <tr class="m-t-20">
                        <td class="p-t-20"></td>
                    </tr>
                    <tbody>
                        <tr >
                        <td class="p-tb-20">Tên sản phẩm:</td>
                        <td><input type="text" name="name" value="'.$_SESSION['productname'].'" class="form-control"></td>
                        </tr>
                        <tr>
                        <td class="p-tb-20">Năm phát hành:</td>
                        <td><input type="text"  name="year" value="'.$_SESSION['year'].'"  class="form-control"></td>
                        </tr>
                        <tr>
                        <td class="p-tb-20">Hãng:</td>
                        <td><input type="text" value="'.$_SESSION['sup'].'"  class="form-control"></td>
                        </tr>
                    </tbody>
                    </table>  
                    </form>';
        }
        function readProduct3($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form  method="post" enctype="multipart/form-data" class="m-t-20" style="background-color: #ffffff;">
                        <div class="col-lg-12">
                            <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">'.$cal->TenSP.'</h2>
                        </div>
                        <div class="">
                        <div class="col-lg-5">
                            <div class="row">
                            <div class="image-area mt-4"><img id="imageResult" src="#" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                            
                            <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                            </div>
                            </div>
                            <input type="hidden" id="btn" value="4">
                        </div>
                        <div class="col-lg-7 p-t-30">
                            <input type="hidden" name="id" value="'.$cal->ID_SP.'">
                            <div class="row bor24 p-b-10">
                            <span class="col-lg-4  text-size1">Giá:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="gia" class="form-control" placeholder="VND"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Màu:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="mau" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Màn hình:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="scr" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Chip:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="chip" class="form-control"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">RAM:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="ram" class="form-control" placeholder="GB"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Bộ nhớ:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="rom" class="form-control" placeholder="GB"></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Thiết kế:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><textarea type="text" name="cau" rows="4" class="form-control"></textarea></div>
                            </div>
                            <div class="row m-t-5 bor24 p-b-5">
                            <span class="col-lg-4  text-size1">Hãnh:</span>
                            <div class="col-lg-8 text-size2 text-uppercase"><input readonly type="text" name="sup" value="'.$cal->NhaCungCap.'" class="form-control"></div>
                            </div>
                            <div class="row m-t-20 p-b-10">
                                <button name="button" value="add_new_ver" class="col-lg-12 btn btn-info text-size2 text-uppercase">Thêm phiên bản</button>
                            </div>
                        </div>
                        </div>
                    </form>';
            }
        }
        function readProduct4($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<form method="post" enctype="multipart/form-data" class="m-t-20"">
                        <div class="col-lg-12">
                            <h2 class="col-lg-12  bor25 text-size2 text-uppercase bg13 p-t-15 p-b-15">'.$cal->TenSP.'</h2>
                        </div>
                        <div class="">
                            <div class="col-lg-5">
                                <div class="row">
                                <div class="image-area mt-4"><img id="imageResult" src="../images/'.$cal->Anh.'" alt="" class="img-fluid rounded shadow-sm mx-auto d-block col-lg-12">
                                
                                <input id="upload" type="file" name="file" onchange="readURL(this);" class="form-control border-0">
                                </div>
                                </div>
                                <input type="hidden" id="btn" value="4">
                            </div>
                            <div id="sp_detail"  class="col-lg-7 p-t-30">
                                <input type="hidden" name="id" value="'.$cal->ID_CTSP.'">
                                <div class="row bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Giá:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="gia" value="'.$cal->gia.'" class="form-control" placeholder="VND"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Màu:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="mau" value="'.$cal->Mau.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Màn Hình:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="scr" value="'.$cal->ManHinh.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Chip:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="chip" value="'.$cal->Chip.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">RAM:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="ram" value="'.$cal->Ram.'" class="form-control" placeholder="GB"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Bộ nhớ trong:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input type="text" name="rom" value="'.$cal->Rom.'" class="form-control" placeholder="GB"></div>
                                </div>
                                <div class="row m-t-10 bor24 p-b-10">
                                    <span class="col-lg-4  text-size1">Hãng:</span>
                                    <div class="col-lg-8 text-size2 text-uppercase"><input readonly type="text" name="sup" value="'.$cal->NhaCungCap.'" class="form-control"></div>
                                </div>
                                <div class="row m-t-48 p-b-10">
                                    <button name="button" value="save" class="col-lg-12 btn btn-info text-size2 text-uppercase">Lưu</button>
                                </div>
                            </div>
                        </div>
                    </form>';
            }
        }
        function readmodal($url){
            $xem = $this->readAPI($url);
            $i=0;
            foreach($xem as $cal){
                $_SESSION['madh']=$cal->code;
                if($cal->status == 6){
                    echo '<input type="hidden" id="submit" value="1">';
                }else{
                    echo '<input type="hidden" id="submit" value="2">';
                }
                echo '<div class="form-group col-lg-10">
                        <p class="stext-111 float-right col-lg-3 m-t-10">Mã DH :</p>
                        <div class="p-t-5 col-lg-9">
                        <input type="text" readonly id="phone" class="form-control col-lg-9" value="'.$cal->code.'" placeholder="Số điện thoại " name="phone">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <p class="stext-111 float-right col-lg-3 m-t-10">Bằng chứng giao hàng:</p>
                        <div class="p-t-5 col-lg-9">
                        <img class="col-lg-5  m-t-11"  id="geeks1" GFG="250" alt="Geeksforgeeks" src="../images/upload/shipping/'.$cal->anh1.'" alt="">
                        <img class="col-lg-5 m-t-11"   id="geeks1" src="../images/upload/shipping/'.$cal->anh2.'" alt="">
                        </div>
                    </div>
                    <div class="form-group col-lg-10">
                        <p class="stext-111 float-right col-lg-3 m-t-10">Ghi Chú:</p>
                        <div class="p-t-5 col-lg-9">
                        <textarea class="form-control" rows="3" id="comment" name="note"></textarea>
                        </div>
                    </div>';
            }
        }
        function readWarehouse_Structure($url){
            $xem = $this->readAPI($url);
            $i =1;
            $m =1;
            $n=1;
            foreach($xem as $cal){
                $k[$i]= $cal->Tang;
                if($k[$i] != $k[$i-1]){
                    echo '<li><span class="caret1">'.$cal->Tang.'</span>';
                    echo '</li>';
                    $i++;
                }
                
            }
        }
        function readExportsystem($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<option value="'.$cal->id_cauhinh.'">'.$cal->Ram.' / '.$cal->Rom.' / '.$cal->Chip.'</option>';
            }
        }
        function readExportAddess($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<input type="hidden" id="'.$cal->ID_DCGH.'" value="'.$cal->phone.'">';
            }
            echo '<select name="add" id="add" class="form-control col-lg-9 custom-select">
                    <option selected>----------Chọn địa chỉ----------</option>';
            if($xem){
                foreach($xem as $cal){
                    echo '<option value="'.$cal->ID_DCGH.'">'.$cal->SoNha.' - '.$cal->Phuong.' - '.$cal->Quan.' - '.$cal->Tinh.'</option>';
                }
                echo '<option value="new">Thêm mới địa chỉ</option>';
            }else{
                echo '<option value="new">Thêm mới địa chỉ</option>';
            }
        }
        function readExportCity($url){
            $xem = $this->readAPI($url);
            if($xem){
                foreach($xem as $cal){
                    echo '<option value="'.$cal->code_city.'">'.$cal->name_city.'</option>';
                }
            }
        }
        function readExportDis($url){
            $xem = $this->readAPI($url);
            if($xem){
                foreach($xem as $cal){
                    echo '<option value="'.$cal->code_dis.'">'.$cal->name_dis.'</option>';
                }
            }
        }
        function readExportWar($url){
            $xem = $this->readAPI($url);
            if($xem){
                foreach($xem as $cal){
                    echo '<option value="'.$cal->code_war.'">'.$cal->name_war.'</option>';
                }
            }
        }
        function readCheck_VC($url){
            $xem = $this->readAPI($url);
            if($xem){
                foreach($xem as $cal){
                    $dis = $cal->giamgia;
                    return $dis;
                }
                
            }else{
                echo '<script>alert ("Không tìm thấy mã giảm giá");history.go(-1);</script>';
            }
        }
        function readExportColor($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<option value="'.$cal->id_mau.'">'.$cal->ten_mau.'</option>';
            }
        }
        function readExportReview($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="flex-w flex-t p-b-68">
                        <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                            <img src="./images/logo.png" alt="AVATAR">
                        </div>

                        <div class="size-207">
                            <div class="flex-w flex-sb-m ">
                                <span class="mtext-107 cl2 p-r-20">
                                    '.$cal->hoten.'
                                </span>

                                <span class="fs-18 cl11"> ';
                                for($i =1; $i <= $cal->danhgia; $i++)
                                { 
                                    echo '<i class="zmdi zmdi-star"></i>'; 
                                }
                                echo '</span>
                            </div>
                            <div class="flex-w flex-sb-m  p-b-25">
                                <span class="mtext-30 fs-12 stext-10 cl1">
                                        <i class="fa fa-clock-o"></i>'.$cal->ThoiGian.'
                                </span>
                            </div>
                            <p class="stext-102 cl6">
                                '.$cal->noidung.'
                            </p>
                            <div class="flex-w flex-sb-m ">
                                <span class="mtext-107 cl2 p-r-20">
                                </span>

                                <span class="fs-14 cl7"></span>
                            </div>
                        </div>
                    </div>';
            }
        }
        function readProductDetail_title($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="item-slick3" data-thumb="images/'.$cal->Anh.'">
                        <div class="wrap-pic-w pos-relative">
                            <img src="images/'.$cal->Anh.'" alt="IMG-PRODUCT">

                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/'.$cal->Anh.'">
                                <i class="fa fa-expand"></i>
                            </a>
                        </div>
                    </div>';
                    $ten = $cal->TenSP;
                    $nhacc = $cal->NhaCungCap;
                    $thietke = $cal->ThietKe;
                    $gia = $cal->gia;
                    $ip = $cal->ID_SP;
            }
            echo '</div>
                        </div>
                    </div>
                </div>
                    
                <div class="col-md-6 col-lg-5 p-b-30">
                    <div class="p-r-50 p-t-5 p-lr-0-lg">
                        <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                            <b>'.$ten.'</b>
                        </h4>

                        <span class="mtext-106 cl2">
                            Giá: '.$gia.' VNĐ
                        </span>

                        <p class="stext-102 cl3 p-t-23">
                           Mô tả: Được cung cấp bởi nhà phát hành '.$nhacc.' với thiết kế'.$thietke.'.
                        </p>';
        }
        function readCart($url){
            $xem = $this->readAPI($url);
            $tongtien = 0;
            $i = 0;
            if(count($xem)){
                foreach($xem as $cal){
                    $i = $i+1;
                    $_SESSION["number_cart"]=$i;
                    $tongtien = $tongtien + ($cal->Soluong * $cal->gia);
                    echo '<form><li class="header-cart-item flex-w flex-t m-b-12">
                                <a href="?button=delete&ID='.$cal->ID_CTSP.'">
                                    <div class="header-cart-item-img">
                                        <img src="images/'.$cal->Anh.'" alt="IMG">
                                    </div>
                                </a>
                                <div class="header-cart-item-txt p-t-8">
                                    <a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                        '.$cal->TenSanPham.'('.$cal->Mau.'/'.$cal->Ram.'/'.$cal->Rom.'/'.$cal->Chip.')
                                    </a>
    
                                    <span class="header-cart-item-info">
                                        '.$cal->Soluong.' x '.$cal->gia.'VND
                                    </span>
                                </div>
                            </li></form>';
                        }
            }else {
                echo '<div class="alert alert-success">
                            <strong>Thông báo!</strong> Không có sản phẩm trong giỏ hàng !
                        </div>
                        <a><button class="btn btn-success">ĐI đến cửa hàng </button></a>';
                        $_SESSION["number_cart"]=$i;
            }
            echo'</ul>
				
                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Tổng đơn: '.$tongtien.' VND
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="shoping-cart.php" class="bor2 hov-btn3 p-lr-15 trans-04 col-lg-12 btn btn-info">
                            Xem giỏ hàng
                        </a>
                    </div>
                </div>
            </div>';
        }
        function readCartDetail($url){
            $xem = $this->readAPI($url);
            $tongtien = 0;
            $i=0;
            if(count($xem) != 0){
                foreach($xem as $cal){
                    $tongtien = $tongtien + ($cal->Soluong * $cal->gia);
                    $i=$i+1;
                    echo '<form>
                            <tr class="table_row">
                                <td class="text-center"> 
                                    <a href="?button=delete&ID='.$cal->ID_CTSP.'">
                                        <div class="header-cart-item-img ml-5 mt-5">
                                            <img src="images/'.$cal->Anh.'" alt="IMG">
                                            <input type="hidden" name="ID" value="'.$cal->ID_CTSP.'">
                                        </div>
                                    </a>
                                </td>
                                <td class="text-center"><p class="p-t-66">'.$cal->TenSanPham.'</p></td>
                                <td class="text-center"><p class="p-t-66">'.$cal->gia.'</p></td>
                                <td class="text-center "><input class="m-t-60 txt-center form-control" type="number" name="num-product" value="'.$cal->Soluong.'"></td>
                                <td class="text-center"><p class="p-t-66">'.$cal->gia * $cal->Soluong.'</p></td>
                                <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="update">Cập Nhật</button></td>
                            </tr>
                        </form>';
                }
            }else{
                echo '<form>
                            <tr class="table_row">
                                <td colspan="6"> 
                                    <div class="alert alert-success">
                                        <strong>THÔNG BÁO!</strong> Không tìm thấy sản phẩm trong giỏ hàng !
                                    </div>
                                    <a><button class="btn btn-success">Đi đến của hàng </button></a>
                                </td>
                            </tr>
                </form>';
            }
            $_SESSION['tongtien'] =$tongtien;
            $_SESSION['nums']=$i;
        }
        function Infomation_Shipping($url){
            $xem = $this->readAPI($url);
            $tongtien = 0;
                foreach($xem as $cal){
                    $tongtien = $tongtien + ($cal->Soluong * $cal->gia);
                    echo '';
                }
        }
        function Infomation_Archive($url){
            $xem = $this->readAPI($url);
            $i=1;
            $tongtien = 0;
                foreach($xem as $cal){
                    echo '<tr class="hov-btn3">
                        <td>'.$i.'</td>
                        <td>'.$cal->TenSanPham.'</td>
                        <td>'.$cal->ChiTiet.'</td>
                        <td>Khu: '.$cal->TenKhu.'-Tầng: '.$cal->Tang.'-Vị trí: '.$cal->ViTri.'</td>
                    </tr>';
                    $i++;
                }
        }
        function readLogin($url){
            $xem = $this->readAPI($url);
            if(count($xem)){
                if($_REQUEST['username']) {
                $user = $_REQUEST['username'];
                $pass = $_REQUEST['pass'];
                $n = 0;
                foreach ($xem as $val) {
                    if ($val->User == $user && $val->Pass == md5($pass)) {
                        $_SESSION["username"] = $user;
                        $_SESSION["phanquyen"] = $val->PhanQuyen;
                        $_SESSION["maND"] = $val->ID_ND;
                        $phanquyen = $_SESSION["phanquyen"];
                        $_SESSION['current_user'] = $user;
                        $_SESSION["trangthai"] = $_SESSION["phanquyen"];
                        $_SESSION['name'] = $val->Ten;
                        $_SESSION['fname'] = $val->HoDem;
                        $this->phanquyen($phanquyen,$user);
                    } else {
                    echo '<script>
                            alert("thông tin đăng nhập sai");
                        </script>';
                    }
                }
                }
            }
        }
        function phanquyen($phanquyen,$user){
            switch ($phanquyen) {
                case '1': {
                    echo'<script>alert ("Chào mừng '.$user.' đến với DKSTORE"); window.location.replace("index.php"); </script>';
                    break;
                }
                case '2': {
                    echo'<script>alert ("ADMIN đăng nhập thành công"); window.location.replace("./admin/index.php"); </script>';
                    break;
                }
                case '3': {
                    echo'<script>alert ("Đăng nhập thành công"); window.location.replace("./thungan/index.php"); </script>';
                    break;
                }
                case '4': {
                   
                    echo'<script>alert ("Đăng nhập thành công"); window.location.replace("./nhanvienbh/index.php"); </script>';
                    break;
                }
                case '5': {
                   
                    echo'<script>alert ("Đăng nhập thành công"); window.location.replace("./nhanvienkho/index.php"); </script>';
                    break;
                }
                case '6': {
                   
                    echo'<script>alert ("Đăng nhập thành công"); window.location.replace("./nhanviengh/index.php"); </script>';
                    break;
                }
                case '7': {
                   
                    echo'<script>alert ("Đăng nhập thành công"); window.location.replace("./quanly/index.php"); </script>';
                    break;
                }
                case '8': {
                   
                    echo'<script>alert ("Đăng nhập test blockchain thành công"); window.location.replace("./bc/block.php"); </script>';
                    break;
                }

            }
        }
        function check_permission($q)
        {
            $phanquyen = $_SESSION["phanquyen"];
            if ($_SESSION["phanquyen"] != $q) {
                header("location:login.php");
            }
        }
        function readCustomer($url){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<h4 class="mtext-109 cl2 p-b-30 text-center ">
                        THÔNG TIN KHÁCH HÀNG
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                    </div>

                    <form action="#" class="col-12 ">
                        <div class="flex-w flex-t bor12 p-t-15 p-b-30 ">
                            <div class="p-r-18 p-r-0-sm w-full-ssm w-full w-full-lg">
                                <div class="p-t-15">
                                    <div class="form-group row">
                                        <label class="col-2" for="email">Họ tên:</label>
                                        <div class="col-2"></div>
                                        <input type="text" class="form-control col-5" placeholder="Họ tên đệm..." name="fname" value="'.$cal->HoDem.'">
                                        <input type="text" class="form-control col-3" placeholder="Tên..." name="lname" value="'.$cal->Ten.'">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2" for="email">Địa chỉ:</label>
                                        <div class="col-2"></div>
                                        <input type="text" class="form-control col-8" placeholder="Địa chỉ ... " name="address" value="'.$cal->DiaChi.'">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2" for="email">Số điện thoại:</label>
                                        <div class="col-2"></div>
                                        <input type="phone" class="form-control col-8" placeholder="Số điện thoại ..." name="phone" value="'.$cal->Phone.'">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-2" for="email">Mail:</label>
                                        <div class="col-2"></div>
                                        <input type="email" class="form-control col-8" placeholder="Địa chỉ email ... " name="email" value="'.$cal->Email.'">
                                    </div>
                                   
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-t p-t-27 p-b-33">
                            
                        </div>

                        <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04" name="button" value="update">
                            Cập nhật
                        </button>

                    </form>';
            }
        }
        function CheckPass($url,$pass){
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                if($cal->Pass == $pass){
                    return 1;
                }
            }
        }
        function ReadOrder($url)
        {
            $xem = $this->readAPI($url);
            $dem=0;
            echo '<table class="table-shopping-cart table ">				
            <tbody>';
            foreach($xem as $cal)
            {
                $status =$cal->trangthai;
                if($status ==1){
                    $status = 'Đơn hàng trả sau';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-info m-t-60" name="button" value="cancel"><i class="fa fa-trash-o"></i></button></td>';
                }else if($status ==2){
                    $status = 'Đơn hàng trả trước';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button>
                        <button class="btn btn-info m-t-60" name="button" value="cancel"><i class="fa fa-trash-o"></i></button></td>';
                }else if($status ==3){
                    $status = 'Đơn hàng đã xử lý';
                    $test='<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button></td>';
                }else if($status ==4){
                    $status = 'Đơn hàng đã chuẩn bị';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button></td>';
                }else if($status ==5){
                    $status = 'Đơn hàng đang giao';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button></td>';
                }else if($status ==6){
                    $status = 'Đơn hàng đã nhận';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button></td>';
                }else if($status ==7){
                    $status = 'Đơn hàng hoàn';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button></td>';
                }else if($status ==8){
                    $status = 'Đơn hàng đã hủy';
                    $test= '<td class="text-center"><p class="p-t-66">'.$status.'</p></td>
                        <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view"><i class="fa fa-eye"></i></button></td>';
                }
                echo '<form>
                <tr class="table_row">
                    <input type="hidden" name="id" value="'.$cal->id.'"/>
                    <td class="text-center"><p class="p-t-66">'.++$dem.'</p></td>
                    <td class="text-center"><p class="p-t-66">DK'.$cal->id.'</p></td>
                    <td class="text-center"><p class="p-t-66">'.$cal->date.'</p></td>
                    '.$test.'
                </tr>
            </form>';
            }
            echo '</tbody>
            </table>';
        }
        function ReadOrderPending($url)
        {
            $xem = $this->readAPI($url);
            $dem=0;
            echo '<table class="table">
                    <thead>
                        <tr class="text-center border border-dark">
                            <th class="text-center">STT</th>
                            <th class="text-center">Ngày đặt hàng</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Số điện thoại</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>				
                    <tbody>';
            foreach($xem as $cal)
            {
                echo '<form>
                <tr">
                    <input type="hidden" name="id" value="'.$cal->id.'"/>
                    <td class="text-center"><p class="p-t-66">'.++$dem.'</p></td>
                    <td class="text-center"><p class="p-t-66">'.$cal->date.'</p></td>
                    <td class="text-center"><p class="p-t-66">'.$cal->address.'</p></td>
                    <td class="text-center"><p class="p-t-66">'.$cal->phone.'</p></td>
                    <td class="text-center"><button class="btn btn-info m-t-60" name="button" value="view">Xem</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-info m-t-60" name="button" value="cancel">CENCAL</button></td>
                </tr>
            </form>';
            }
            echo '</tbody>
            </table>';
        }
        function ribbon($i){
            if($i = 1){
                echo '<div class="ribbon-wrapper "><div class="ribbon-red ribbon1">Đơn hàng đang chờ xử lý</div></div>';
            }
        }
        function ReadShipping($url)
        {
            $xem = $this->readAPI($url);
            foreach($xem as $cal){
                echo '<div class="col-lg-12">
                        
                        <div class="col-lg-12 text-center p-tb-10">
                            <h2 class="col-lg-12">THÔNG TIN ĐƠN HÀNG</h2>
                        </div>
                        <div class="row border border-dark p-tb-20">
                            <div class="col-lg-6 border border-dark border-right-0 border-left-0">
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Người gửi:</span>
                                    <div class="col-lg-8">DK STORE</div>
                                </div>
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Địa chỉ:</span>
                                    <div class="col-lg-8">334 Chu Van An, Phuong 12,Binh Thanh, Ho Chi Minh</div>
                                </div>
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Email:</span>
                                    <div class="col-lg-8">contact@dkstore.tk</div>
                                </div>
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Số điện thoại:</span>
                                    <div class="col-lg-8">+84 967 122 784</div>
                                </div>
                            </div>
                            <div class="col-lg-6 border border-dark border-right-0 ">
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Người nhận:</span>
                                    <div class="col-lg-8">'.$cal->HoDem.' '.$cal->Ten.'</div>
                                </div>
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Địa chỉ:</span>
                                    <div class="col-lg-8">'.$cal->SoNha.', '.$cal->Phuong.', '.$cal->Quan.', '.$cal->Tinh.'</div>
                                </div>
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Email:</span>
                                    <div class="col-lg-8">'.$cal->Email.'</div>
                                </div>
                                <div class="row p-tb-10">
                                    <span class="col-lg-4">Số điện thoại:</span>
                                    <div class="col-lg-8">'.$cal->SoDienThoai.'</div>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            
        }
        function ReadDetail($url,$id)
        {
            $this->ReadShipping('http://localhostphp/api/exportShipping.php?IP='.$id.'');
            $xem = $this->readAPI($url);
            $tongtien = 0;
            echo '<table class="table ">
                <thead>
                    <tr class="text-center">
                        <th class="text-center">Tên sản phẩm</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Tổng tiền</th>
                    </tr>
                </thead>				
                <tbody>';
            foreach($xem as $cal)
            {
                $tongtien = $tongtien + ($cal->soluong * $cal->Gia);
                echo 
                '<form>
                    <tr>
                        <td class="text-center"><p class="p-t-66">'.$cal->ten.'</p></td>
                        <td class="text-center"><p class="p-t-66">'.$cal->Gia.'</p></td>
                        <td class="text-center"><p class="p-t-66">'.$cal->soluong.'</p></td>
                        <td class="text-center"><p class="p-t-66">'.$cal->Gia * $cal->soluong.'</p></td>
                    </tr>
                </form>';   
                $TongDon = $cal->TongDon;   
                $TongThu = $cal->TongThu;
                
            }
            $tongtien = $tongtien ;
            $dis = ($tongtien + 35000) - $TongDon ;
            $tyle= ($dis/$tongtien)*100;
            echo '</tbody>
            </table>';
            echo '<div class="col-lg-12">
                    <div class="row border border-dark border-right-0 border-left-0 border-botton-0 p-tb-20">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-3"></div>
                                <div class="col-lg-8 text-sỉze1">
                                    <div class="row">
                                        <div class="col lg-5"> Tạm tính(VND):</div>
                                        <div class="col lg-7 text-center p-l-55"> '.$tongtien .' </div>
                                    </div>
                                    <div class="row">
                                        <div class="col lg-5"> Giảm giá('.$tyle.'%):</div>
                                        <div class="col lg-7 text-center p-l-55"> '.$dis.' </div>
                                    </div>
                                    <div class="row">
                                        <div class="col lg-5"> Tổng tiền(VND):</div>
                                        <div class="col lg-7 text-center p-l-55"> '.$TongThu.'</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
        }
        function ReadOrderAdmin($url)
        {
            $xem = $this->readAPI($url);
            $dem=0;
            echo '<thead>
                        <tr class="table_head text-center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Tên khách hàng</th>
                            <th class="text-center">Ngày đặt hàng</th>
                            <th class="text-center">Địa chỉ</th>
                            <th class="text-center">Tổng tiền</th>
                            <th class="text-center">Trang thái thanh toán</th>
                            <th class="text-center">Trạng thái đơn hàng</th>
                            <th class="text-center">Thao tác</th>
                        </tr>
                    </thead>				
                    <tbody>';
            foreach($xem as $cal)
            {
                echo '<form >
                        <tr style="height: 50px;padding-top: 10px;">
                            <input type="hidden" name="id_dh" value="'.$cal->id.'">
                            <td class="text-center"><p>'.++$dem.'</p></td>
                            <td class="text-center"><p>'.$cal->HoTen.'</p></td>
                            <td class="text-center"><p>'.$cal->date.'</p></td>
                            <td class="text-center"><p>'.$cal->address.'</p></td>
                            <td class="text-center"><p>'.$cal->total.'</p></td>
                            <td class="text-center"><p>'.$cal->trangthai.'</p></td>
                            <td class="text-center"><p>'.$cal->hinhthucthanhtoan.'</p></td>
                            <td class="text-center"><button class="btn btn-info" name="button" value="view">Xem</button></td>
                        </tr>
                    </form>';
            }
            echo '</tbody>';
        }
        function ReadOrderDetaiAdmin($url)
        {
            $xem = $this->readAPI($url);
            $dem=0;
            echo '<thead>
                        <tr class="table_head text-center">
                            <th class="text-center">STT</th>
                            <th class="text-center">Ảnh</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Tổng tiền</th>
                        </tr>
                    </thead>				
                    <tbody>';
            foreach($xem as $cal)
            {
                echo '<form >
                        <tr style="height: 50px;padding-top: 10px;">
                            <input type="hidden" name="id_dh" value="'.$cal->id.'">
                            <td class="text-center"><p>'.++$dem.'</p></td>
                            <td class="text-center"><p>'.$cal->anh.'</p></td>
                            <td class="text-center"><p>'.$cal->name.'</p></td>
                            <td class="text-center"><p>'.$cal->number.'</p></td>
                            <td class="text-center"><p>'.$cal->gia.'</p></td>
                            <td class="text-center"><p>'.$cal->total.'</p></td>
                            <td class="text-center"><button class="btn btn-info" name="button" value="view">Xem</button></td>
                        </tr>
                    </form>';
            }
            echo '</tbody>';
        }
    }
?>