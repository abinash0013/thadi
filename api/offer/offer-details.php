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
    include_once '../objects/offer.php';
    include_once '../objects/category.php';
    
    $database = new Database();
    $db = $database->getConnection();
      
    $User = new User($db);
    $offer = new Offer($db);
    $category = new Category($db);
    
    $data = json_decode(file_get_contents("php://input"));
     
    // make sure data is not empty
    if(!empty($data->mainOfferProductId)){  
        // set product property values
        $offer->mainOfferProductId = $data->mainOfferProductId;
       // $offer->categoryId = $data->title;
        
        // query products
            $stmt = $offer->offer_details();
            $num = $stmt->rowCount();
            
            // check if more than 0 record found
            if($num>0){
             
                // products array
               
                
                //  $mainOccupation_arr["occupation"]=array();
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    extract($row);
                    
                    // $Education = new Education($db);
                    $offer->mainOfferProductid = $row['mainOfferProductId'];  

                    $subOfferstmt = $offer->tbl_subOfferProduct();
                    $subOffernum = $subOfferstmt->rowCount();
                    
                    $subOffer_arr=array(); 

                    if($subOffernum>0){
                      
                        // $course_arr["course"]=array();
                        while ($subOfferrow = $subOfferstmt->fetch(PDO::FETCH_ASSOC)){
                               extract($subOfferrow);
                            // array_push($course_arr["course"], $courserow);
                              $offer->categoryid = $subOfferrow['categoryId'];   
                              $categorystmt = $offer->category_detail();
                                $categorynum = $categorystmt->rowCount();
                              if($categorynum>0){
                              while ($categoryrow = $categorystmt->fetch(PDO::FETCH_ASSOC)){
                                extract($categoryrow);
                                    array_push($subOffer_arr,
                                    array( 
                                        "categoryName"=> $categoryrow['categoryName'],
                                        "categoryPrice"=> $categoryrow['singleItemPrice'],
                                        "quantity"=> $subOfferrow['quantity']
                                    ) );
                              }
                            
                            }
                        }
                    }
            
                      echo json_encode(array("status" => "200" ,"message" => "Data Found" ,  
                            "mainOfferProductId" =>$row['mainOfferProductId'],
                            "title" => $row['title'], 
                            "category" => $row['category'], 
                            "description" => $row['description'], 
                            "image" => $row['image'], 
                            "price" => $row['price'], 
                            "mainOffer_arr"=>$subOffer_arr
                        ));
                //    array_push($mainOccupation_arr["occupation"],$arrdata);
                }
          
            }else{
                 echo json_encode(array("status" => "201" ,"message" => "Wrong Request" , "data" => []));
            }
    }
    // tell the user data is incomplete
    else{ 
        // tell the user
        echo json_encode(array("status" => "400" ,"message" => "Data is incomplete." , "data" => []));
    } 
    
?>