<?php
include './../../config.php';

if(isset($_POST['id'])){
	$id=  $_POST['id'];
	$sql = $con->query("DELETE FROM `tbl_users` WHERE userId=$id");
    
    if($sql > 0)
    { 
        $rsp->status = "200";
        $rsp->message='Successfully Deleted';
    }
    else{
        $rsp->status='204';
        $rsp->message='Some Thing Went Wrong';
    }

    echo json_encode($rsp);
	 
}
  