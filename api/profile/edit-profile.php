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
        !empty($data->userId)  
    ){  
        // set product property values
        $User->name = $data->name;
        $User->email = $data->email;
        $User->mobile = $data->mobile;
        $User->password = $data->password;
        $User->userId = $data->userId;
          
        // update the product
        if($User->update()){
          
            // set response code - 200 ok
            http_response_code(200);
          
            // tell the user
            echo json_encode(array("status"=>"200","message" => "User updated Successfully."));
        }
          
        // if unable to update the product, tell the user
        else{
          
            // set response code - 503 service unavailable
            http_response_code(400);
          
            // tell the user
            echo json_encode(array("status" => "201" ,"message" => "Unable to update User."));
        }
    }
?>