<?php

    include './../../config.php';

    $main_id = $_POST['mainOfferProductId']; 
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
            
            foreach( $quantity as $key => $n ) {
                 $insert = $con->query("INSERT INTO `tbl_subOfferProduct`(  `categoryId`, `quantity`, `mainOfferProductId`) VALUES ('$category[$key]','$quantity[$key]','$main_id')");
               
            }
  $res->success = false;
   if($insert > 0)
   {
        $rsp->status = "200";
        $rsp->message = 'Successfully Added';
    }
    else{
        $rsp->status = '204';
        $rsp->message = 'Something Went Wrong';
    }
    echo json_encode($rsp);
    
?>