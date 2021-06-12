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
    
    $data = json_decode(file_get_contents("php://input"));
      
    // make sure data is not empty
    if(!empty($data->orderId))
    {  
        // set product property values
        $order->orderStatus = $data->orderStatus;
          
        // update the product
        if($order->orderStatusUpdate()){
          
            // set response code - 200 ok
            http_response_code(200);
          
            // tell the user
            echo json_encode(array("status" => "200" ,"message" => "Order Update Successfully."));
        }
      
        // if unable to update the product, tell the user
        else{
          
            // set response code - 503 service unavailable
            http_response_code(201);
          
            // tell the user
            echo json_encode(array("status" => "201" ,"message" => "Unable to Update."));
        }
    } 
    else
    {
          
        // set response code - 503 service unavailable
        http_response_code(201);
      
        // tell the user
        echo json_encode(array("status" => "400" ,"message" => "Data is Incomplete."));
    }
    
?>