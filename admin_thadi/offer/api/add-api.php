<?php

    include './../../config.php';

    $title = $_POST['title'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $categoryType= $_POST['categoryType'];


$valid_extensions = array('jpeg', 'jpg', 'png', 'gif', 'bmp' , 'pdf' , 'doc' , 'ppt'); // valid extensions
$path = 'image/'; // upload directory

// File upload path 
$img = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];
// get uploaded file's extension
$ext = strtolower(pathinfo($img, PATHINFO_EXTENSION));
// can upload same image using rand function
$final_image = rand(1000,1000000).$img;
// check's valid format
		if(in_array($ext, $valid_extensions)) 
		{ 
		$path = $path.strtolower($final_image); 
		move_uploaded_file($tmp,'./../../'.$path);
		}
$path=$baseimage.$path;



    $insert = $con->query("INSERT INTO `tbl_mainOfferProduct`(`title`, `image`, `price`,`category`, `description`) VALUES ('$title','$path','$price','$categoryType','$description')");
    
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