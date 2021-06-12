<?php
    class User{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_user";
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        // check Email
        function user_check_email(){
            // select all query
          $query = "SELECT * FROM  " . $this->table_name . " where  mobile=? OR email=?  ";
        
          // prepare query statement
           $stmtlogin = $this->conn->prepare($query);
 
             $stmtlogin->bindParam(1, $this->mobile);
             $stmtlogin->bindParam(2, $this->email);
            
           
         // execute query
          $stmtlogin->execute();
          return $stmtlogin;
      }
        // User Registration
        function create(){
          
            // query to insert record
            $query = "INSERT INTO
                        " . $this->table_name . "
                      SET
                        name=:name, 
                        email=:email, 
                        mobile=:mobile, 
                        password=:passwordMd5, 
                        createdAt=:created";
          
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->mobile=htmlspecialchars(strip_tags($this->mobile));
            $this->passwordMd5=htmlspecialchars(strip_tags($this->passwordMd5));
            $this->created=htmlspecialchars(strip_tags($this->created));
          
            // bind values
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":mobile", $this->mobile);
            $stmt->bindParam(":passwordMd5", $this->passwordMd5);
            $stmt->bindParam(":created", $this->created);
          
            // execute query
            if($stmt->execute()){
                return true;
            }
          
            return false;
              
        }
        
        // User Login
        function user_login(){
              // select all query
            $query = "SELECT * FROM  " . $this->table_name . " where password=? AND mobile=? OR email=?  ";
          
            // prepare query statement
             $stmtlogin = $this->conn->prepare($query);

               $stmtlogin->bindParam(1, $this->passwordMd5); 
               $stmtlogin->bindParam(2, $this->mobile);
               $stmtlogin->bindParam(3, $this->email);
              
             
           // execute query
            $stmtlogin->execute();
            return $stmtlogin;
        }
        

        //User Profile         
        function user_detail(){
              // select all query
            $query = "SELECT * FROM  " . $this->table_name . " where userId=?";
          
            // prepare query statement
             $stmt = $this->conn->prepare($query);
             
              $stmt->bindParam(1, $this->userid);
          
            // execute query
            $stmt->execute(); 
          
            return $stmt;
        }
        
        // Edit Profile
        function update(){
          
            // update query
            $query = "UPDATE
                        " . $this->table_name . "
                    SET
                        name = :name,
                        email = :email,
                        mobile = :mobile,
                        password = :password
                    WHERE
                        userId = :userId";
          
            // prepare query statement
            $stmt = $this->conn->prepare($query);
          
            // sanitize
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->mobile=htmlspecialchars(strip_tags($this->mobile));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->userId=htmlspecialchars(strip_tags($this->userId));
          
            // bind new values
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':mobile', $this->mobile);
            $stmt->bindParam(':password', $this->password);
            $stmt->bindParam(':userId', $this->userId);
          
            // execute the query
            if($stmt->execute()){
                return true;
            }
          
            return false;
        }


// read products
function all_user(){
  
    // select all query
    $query = "SELECT * FROM  " . $this->table_name;
  
    // prepare query statement
    $stmt = $this->conn->prepare($query);
  
    // execute query
    $stmt->execute();
  
    return $stmt;
}


function user_auth_token_update(){
// update query
        $query = "UPDATE  " . $this->table_name . "  SET  authToken = :authtoken   WHERE  mobile = :mobile Or email = :email";
      
        // prepare query statement
        $stmtauthtoken = $this->conn->prepare($query);
      
        // sanitize
         $this->authtoken=htmlspecialchars(strip_tags($this->authtoken));
         $this->mobile=htmlspecialchars(strip_tags($this->mobile));
         
         // bind new values
        $stmtauthtoken->bindParam(':authtoken', $this->authtoken);
        $stmtauthtoken->bindParam(':mobile', $this->mobile);
        $stmtauthtoken->bindParam(':email', $this->mobile);
      
       
        
        if($stmtauthtoken->execute()){
            return true;
        }
      
        return false;
 }
 
 function check_token(){
      // select all query
    $query = "SELECT * FROM  " . $this->table_name . " where userId=? And authToken=?";
  
    // prepare query statement
     $stmcheck_tokent = $this->conn->prepare($query);
     
      $stmcheck_tokent->bindParam(1, $this->userid);
      $stmcheck_tokent->bindParam(2, $this->token);
  
    // execute query
    $stmcheck_tokent->execute(); 
    
    return $stmcheck_tokent;
   
}
}
?>