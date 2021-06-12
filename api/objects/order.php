<?php

    class Order{
      
        // database connection and table name
        private $conn;
        private $table_name = "tbl_order";
        
        // constructor with $db as database connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        // create product
        function createOrder(){
          
            // query to insert record
            $query = "INSERT INTO
                        " . $this->table_name . "
                            SET
                                productId=:productid,
                                offerId=:offerid,
                                amount=:amount,
                                userId=:userid,
                                orderStatus=:orderstatus,
                                paymentStatus=:paymentstatus,
                                paymentMode=:paymentmode,
                                quantity=:quantity,
                                deliveryAddress=:deliveryAddress,
                                createAt=:createAt";
            // prepare query
            $stmt = $this->conn->prepare($query);
          
            // sanitize
            $this->productid=htmlspecialchars(strip_tags($this->productid));
            $this->offerid=htmlspecialchars(strip_tags($this->offerid));
            $this->amount=htmlspecialchars(strip_tags($this->amount)); 
            $this->userid=htmlspecialchars(strip_tags($this->userid));
            $this->orderstatus=htmlspecialchars(strip_tags($this->orderstatus));
            $this->paymentstatus=htmlspecialchars(strip_tags($this->paymentstatus));
            $this->paymentmode=htmlspecialchars(strip_tags($this->paymentmode));
            $this->deliveryAddress=htmlspecialchars(strip_tags($this->deliveryAddress));
            $this->quantity=htmlspecialchars(strip_tags($this->quantity));
            $this->createAt=htmlspecialchars(strip_tags($this->createAt));
          
            // bind values
            $stmt->bindParam(":productid", $this->productid);
            $stmt->bindParam(":offerid", $this->offerid);
            $stmt->bindParam(":amount", $this->amount);
            $stmt->bindParam(":userid", $this->userid);
            $stmt->bindParam(":orderstatus", $this->orderstatus);
            $stmt->bindParam(":paymentstatus", $this->paymentstatus);
            $stmt->bindParam(":paymentmode", $this->paymentmode);
            $stmt->bindParam(":deliveryAddress", $this->deliveryAddress);
            $stmt->bindParam(":quantity", $this->quantity);
            $stmt->bindParam(":createAt", $this->createAt);
          
            // execute query
            if($stmt->execute()){
                return true;
            }
          
            return false;
              
        }
       
        function orderList(){
                
            // select all query
            $query = "SELECT * FROM  " . $this->table_name . " where userId=?";
            
            // prepare query statement
            $stmt = $this->conn->prepare($query);
            
            $stmt->bindParam(1, $this->userid);
            
            // execute query
            $stmt->execute(); 
            
            return $stmt;
    
        }
        
        
        function orderStatusUpdate(){
      
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    orderStatus = :orderStatus
                WHERE
                    orderId = :orderId";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // sanitize
        $this->orderStatus=htmlspecialchars(strip_tags($this->orderStatus));
        $this->orderId=htmlspecialchars(strip_tags($this->orderId));
      
        // bind new values
        $stmt->bindParam(':orderStatus', $this->orderStatus);
        $stmt->bindParam(':orderId', $this->orderId);
      
        // execute the query
        if($stmt->execute()){
            return true;
        }
      
        return false;
    }

        
        // function orderStatusUpdate(){
            
        //     // select all query
        //     $query = "SELECT * FROM  " . $this->table_name . " where orderId=?";
            
        //     // prepare query statement
        //     $stmt = $this->conn->prepare($query);
            
        //     $stmt->bindParam(1, $this->orderId);
            
        //     // execute query
        //     $stmt->execute(); 
            
        //     return $stmt;
    
        // }
    }

?>