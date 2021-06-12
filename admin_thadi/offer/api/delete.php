<?php

    include './../../config.php';
    
    $offerId = $_POST['offerId'];
  
    $deleteqry = $con->query("delete from tbl_mainOfferProduct where mainOfferProductId='$offerId'");
    
    $res->success = false;
    if($deleteqry > 0){ 
        $rsp->status = "200";
        $rsp->message = 'Successfully Delete';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Something Went Wrong';
    }
    echo json_encode($rsp);
    
?>