<?php
   
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
      
    // get database connection
    include_once '../config/database.php';
      
    // instantiate product object
    // include_once '../objects/user.php';
    include_once '../objects/order.php';
      
    $database = new Database();
    $db = $database->getConnection();
      
    // $User = new User($db);
    $order = new Order($db);
      
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
      
    // make sure data is not empty
    if(!empty($data->userid))
    {
        // set product property values
        // $User->userid = $data->userid; 
        $order->productid = $data->productid;
        $order->offerid = $data->offerid;
        $order->amount = $data->amount;
        $order->userid = $data->userid;
        $order->orderstatus = $data->orderstatus;
        $order->paymentstatus = $data->paymentstatus;
        $order->paymentmode = $data->paymentmode;
        $order->quantity = $data->quantity;
        $order->deliveryAddress = $data->deliveryAddress;
        $order->createAt = date('Y-m-d H:i:s');
        
        // if($num_stmcheck_tokent > 0){  
        // query products
            
        if($order->createOrder() == true)
        {
            // set response code - 201 created
           // http_response_code(201);
      
            // tell the user
            echo json_encode(array("status" => "200" ,"message" => "Order Created"));
        }
      
        // if unable to create the product, tell the user
        else
        {
            // set response code - 503 service unavailable
           /// http_response_code(503);
      
            // tell the user
            echo json_encode(array("status" => "201" ,"message" => "Failed"));
        }
    }
    // tell the user data is incomplete
    else
    { 
        echo json_encode(array("status" => "400" ,"message" => "Data is incomplete."));
    } 
    
?>