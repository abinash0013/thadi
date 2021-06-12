<?php
    
    class Offer{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_mainOfferProduct"; 
        private $table_name_sub = "tbl_subOfferProduct";
      //  private $mainOccupationid;

        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        function tbl_mainOfferProduct(){
             
           
                 $query = "SELECT * FROM  " . $this->table_name  . " where category=?";
           
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            
          $stmt->bindParam(1, $this->categoryType);
            
            // execute query
            $stmt->execute(); 
            
            return $stmt;

        }
        
         function offer_details(){
            
            // select all query
            $query = "SELECT * FROM  " . $this->table_name  . " where mainOfferProductId=?";
            
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            
          $stmt->bindParam(1, $this->mainOfferProductId);
            
            // execute query
            $stmt->execute(); 
            
            return $stmt;

        }
        
        function tbl_subOfferProduct(){
            
            // select all query
            $query = "SELECT * FROM  " . $this->table_name_sub . " where mainOfferProductId=?";
            
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(1, $this->mainOfferProductid);
            
            // execute query
            $stmt->execute(); 
            
            return $stmt;

        }
             function category_detail(){
              // select all query
            $query = "SELECT * FROM tbl_category where categoryId=?";
          
            // prepare query statement
             $stmt = $this->conn->prepare($query);
             
              $stmt->bindParam(1, $this->categoryid);
          
            // execute query
            $stmt->execute(); 
          
            return $stmt;
        }
        // function get_categoryName(){
            
        //     // select all query
        //     $query = "SELECT * FROM  " . $this->table_name_sub . " where subOfferProductId=?";
            
        //     // prepare query statement
        //     $stmt = $this->conn->prepare($query);
            
        //     $stmt->bindParam(1, $this->categoryId);
        //     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                
            
            
        //     // execute query
        //     $stmt->execute(); 
            
        //     return $stmt;

        // }

    }

?>