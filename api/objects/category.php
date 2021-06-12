<?php
    class Category{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_category";
        private $limit=null;
      
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        //User Profile         
        function category_detail(){
              // select all query
            $query = "SELECT * FROM  " . $this->table_name . " where categoryId=?";
          
            // prepare query statement
             $stmt = $this->conn->prepare($query);
             
              $stmt->bindParam(1, $this->categoryid);
          
            // execute query
            $stmt->execute(); 
          
            return $stmt;
        }

        // read products
        function all_category(){
          
            // select all query 
            if($this->limi == 10){ 
                  $query = "SELECT * FROM  " . $this->table_name  . "  LIMIT 0,10";
            }else{
                 $query = "SELECT * FROM  " . $this->table_name  . " order by categoryId desc";
            }
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            
            // execute query
            $stmt->execute();
          
            return $stmt;
        }

}
?>