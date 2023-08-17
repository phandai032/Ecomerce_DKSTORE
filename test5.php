<!DOCTYPE html>
<html>
<body>

<form method="POST" action="" enctype="multipart/form-data">        
    <input type="file" name="choosefile" value="" />
    <div><button type="submit" name="uploadfile">UPLOAD</button></div>
</form>

</body>
</html>
<?php

// check if the user has clicked the button "UPLOAD" 

if (isset($_POST['uploadfile'])) {

    $filename = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];  
    $folder = "./images/upload/shipping/".$filename;   
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
    }else{
        $msg = "Failed to upload image";
    }
    echo'<script>alert("'.$folder.'");</script>';
}


?>