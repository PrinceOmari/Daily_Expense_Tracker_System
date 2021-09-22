<?php
require 'admin_db/db_connection.php';

if(isset($_POST['adminname']) && isset($_POST['admin_email']) && isset($_POST['admin_password'])){
    
    // CHECK IF FIELDS ARE NOT EMPTY
if(!empty(trim($_POST['adminname'])) && !empty(trim($_POST['admin_email'])) && !empty($_POST['admin_password'])){

    // Escape Special Characters.
    $adminname = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['adminname']));
    $admin_email = mysqli_real_escape_string($db_connection, htmlspecialchars($_POST['admin_email']));
    
    // If Email is Valid
    if(filter_var($admin_email, FILTER_VALIDATE_EMAIL)){
        
        //CHECK IF EMAIL IS ALREADY REGISTERED
        $check_email = mysqli_query($db_connection, "SELECT `admin_email` FROM  `admin` WHERE admin_email ='$admin_email'");
    
        if(mysqli_num_rows($check_email) > 0){
            $error_message = " This email address is already registered. Please try another.";
        }
        else{
            // if email is not registered
                $options = [
                    'cost' => 12,
                ];
            
            $admin_hash_password = password_hash($_POST['admin_password'], PASSWORD_BCRYPT, $options);

            //inser admin into the database
            $insert_admin = mysqli_query($db_connection, "INSERT INTO `admin` (adminname, admin_email, admin_password) VALUES ('$adminname', '$admin_email', '$admin_hash_password')");

            if($insert_admin === TRUE){
                $success_message = "Thanks! You have successfully signed up.";
            }
            else{
                $error_message = "Oops! something wrong.";
            }
        }
    }
    else{
        // if email is invalid
        $error_message = "Invalid email address";
    }      
    }
    else{
    $error_message = "PLlease fill in all the reqired fields";
    }
}




?>