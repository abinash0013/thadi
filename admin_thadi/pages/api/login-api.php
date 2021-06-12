<?php session_start(); ?>
<?php 

    include './../../config.php';

    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $password = md5($pwd);

        

    $result = $con->query("SELECT * FROM `tbl_admin` WHERE `email`= '$email' AND `password`='$password'");

    $rsp=null;  
    if($result->num_rows==0){ 
        $rsp->status = "204";
        $rsp->message = "Something Went Wrong/Login Failed";
    }

    else{	

        while($row = mysqli_fetch_array($result)){             

            $_SESSION["admin_id"] = $row['adminId']; 
            $_SESSION["admin_name"] = $row['name']; 
            $_SESSION["admin_email"] = $row['email']; 
                

            $rsp->status = "200"; 
            $rsp->message = "Successfully Login";  

        }                

    }

    echo json_encode($rsp);

?>