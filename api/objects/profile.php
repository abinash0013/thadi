<?php

    class Person{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_user";
        
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function userProfile(){
            
            // select all query
            $query = "SELECT * FROM  " . $this->table_name . " where userId=?";
            
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(1, $this->userid);
            
            // execute query
            $stmt->execute(); 
            
            return $stmt;
    
        }
    }
?>