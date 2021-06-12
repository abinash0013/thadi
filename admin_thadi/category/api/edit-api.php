<?php

    include './../../config.php';
    
    $cId = $_POST['categoryId'];
    $categoryName = $_POST['categoryName'];
     $singleItemPrice = $_POST['singleItemPrice'];
    $description = $_POST['description'];
     $image = $_POST['imageurl'];
    
    if( $_FILES['image']['name'] != null){
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
    
    $path = 'image/'; // upload directory
    $img = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];
    
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
    }else{
      $path=  $image;
    }
    // $categoryImage = $_POST['categoryImage'];
   

    $edit = $con->query("UPDATE `tbl_category` SET `categoryName`='$categoryName',`categoryImage`='$path',`singleItemPrice`='$singleItemPrice',`description`='$description' WHERE categoryId = '$cId'");
    
    $res->success = false;
    if($edit > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Added';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Something Went Wrong';
    }
    echo json_encode($rsp);
    
?>