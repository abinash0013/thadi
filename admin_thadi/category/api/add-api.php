<?php

    include './../../config.php';

    $categoryName = $_POST['categoryName'];
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    
    $path = 'image/'; // upload directory
    $img = $_FILES['productImage']['name'];
    $tmp = $_FILES['productImage']['tmp_name'];
    
    // get uploaded file's extension
    $ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
    
    // can upload same image using rand function
    $final_image = rand(1000,1000000).$img;
    
    // check's valid format
    if(in_array($ext, $valid_extensions)){ 
        $path = $path.strtolower($final_image); 
        move_uploaded_file($tmp,'./../../'.$path);
    }
    
    $path=$baseimage.$path;
    $singleItemPrice = $_POST['singleItemPrice'];
    $description = $_POST['description'];

    $insert = $con->query("INSERT INTO `tbl_category`(`categoryName`, `categoryImage`, `singleItemPrice`, `description`) VALUES ('$categoryName','$path','$singleItemPrice','$description')");
    
    $res->success = false;
    if($insert > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Added';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Something Went Wrong';
    }
    echo json_encode($rsp);
    
?>