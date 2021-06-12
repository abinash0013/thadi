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

$data = json_decode(file_get_contents("php://input"));
  
// make sure data is not empty
if(
    !empty($data->mobile) &&
    !empty($data->password)  
){  
    // set product property values
    $User->mobile = $data->mobile; 
    $User->passwordMd5 = md5($data->password); 
    
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
    echo json_encode(array("message" => "Login Successfull","status" => "200","data" => $row)); 
    }
  
   
}else{
    // set response code - 400 bad request
    http_response_code(201);
  
    // tell the user
    echo json_encode(array("status" => "201" ,"message" => "Mobile Or Password Wrong."));
}
}
  
// tell the user data is incomplete
else{
  
    // set response code - 400 bad request
    http_response_code(400);
  
    // tell the user
    echo json_encode(array("status" => "400" ,"message" => "Data is incomplete."));
} 
// no products found will be here
?>