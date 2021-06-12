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
include_once '../objects/user.php';
include_once '../objects/order.php';
  
$database = new Database();
$db = $database->getConnection();
  
$user = new User($db);
$order = new Order($db);

$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->userid)
){  
    // set product property values
        $order->userid = $data->userid;  

         // query products
        $stmt = $order->orderList();
        $num = $stmt->rowCount();
          
        // check if more than 0 record found
        if($num>0){
          
            // products array
            $order_arr=array();  
          
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $order_arr[]=$row;
            }
          
             echo json_encode(array("status" => "200" ,"message" => "Data Found" , "data" => $order_arr));
        }else{
             echo json_encode(array("status" => "201" ,"message" => "Wrong Request" , "data" => []));
        }

}
  
// tell the user data is incomplete
else{ 
    // tell the user
    echo json_encode(array("status" => "400" ,"message" => "Data is incomplete."));
} 
  
// no products found will be here
?>