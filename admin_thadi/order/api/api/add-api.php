<?php

    include './../../config.php';

    $categoryName = $_POST['categoryName'];
    $categoryImage = $_POST['categoryImage'];
    $singleItemPrice = $_POST['singleItemPrice'];
    $description = $_POST['description'];
    $createdAt = $_POST['createdAt'];

    $insert = $con->query("INSERT INTO `tbl_category`(`categoryName`, `categoryImage`, `singleItemPrice`, `description`) VALUES ('$categoryName','$categoryImage','$singleItemPrice','$description',now())");
    
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