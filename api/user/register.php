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
  
$database = new Database();
$db = $database->getConnection();
  
$User = new User($db);
  
// get posted data
$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->name) &&
    !empty($data->email) &&
    !empty($data->mobile) &&
    !empty($data->password)  
   
){
  
    // set product property values
    $User->name = $data->name;
    $User->email = $data->email;
    $User->mobile = $data->mobile;
    $User->password =md5($data->password);  
    $User->created = date('Y-m-d H:i:s');


    $User->mobile = $data->mobile; 
    $User->passwordMd5 = md5($data->password); 
    
    // query products
    $stmt = $User->user_login();
    $num1 = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num1 > 0){  
        echo json_encode(array("message" => "Mobile Number Already Used","status" => "202")); 

      }else{
    // create the product
    if($User->create()){
  
        // set response code - 201 created
        http_response_code(201);
  
        // tell the user
        // echo json_encode(array("message" => "User Register Successful"));
        $User->mobile = $data->mobile; 
        $User->passwordMd5 = md5($data->password); 
        $User->authtoken =bin2hex(openssl_random_pseudo_bytes(30));; 
          $User->user_auth_token_update();
    // query products
    $stmt = $User->user_login();
    $num = $stmt->rowCount();
      
    // check if more than 0 record found
    if($num>0){ 
       
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
           // set response code - 200 OK
        http_response_code(200);
      
        // show products data in json format
        echo json_encode(array("message" => "User Register Successful","status" => "200","data" => $row)); 
        }
    }
   }
    // if unable to create the product, tell the user
    else{
  
        // set response code - 503 service unavailable
        http_response_code(503);
  
        // tell the user
        echo json_encode(array("message" => "Unable to register user."));
    }
}
} 
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("message" => "Data is incomplete."));
}

?>