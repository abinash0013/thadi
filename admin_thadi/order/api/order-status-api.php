<?php
include './../../config.php';

if(isset($_POST['orderId'])){
    $status = $_POST['orderStatus'];
	$id=  $_POST['orderId'];
	$sql = $con->query("UPDATE `tbl_order` SET orderStatus = '$status' WHERE orderId = $id");
    
    if($sql > 0)
    { 
        $rsp->status = "200";
        $rsp->message='Successfully Updated';
    }
    else{
        $rsp->status='204';
        $rsp->message='Something Went Wrong';
    }

    echo json_encode($rsp);
	 
}