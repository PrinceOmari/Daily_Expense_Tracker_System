<?php
if(isset($_POST['admin_email']) && isset($_POST['admin_password'])){

    //CHECK IF FIELDS ARE NOT EMPTY
    if(!empty(trim($_POST['admin_email'])) && !empty(trim($_POST['admin_password']))){

        //Escape Special Characters
        $admin_email = mysqli_real_escape_string($db_connection, htmlspecialchars(trim($_POST['admin_email'])));
        
            $query = mysqli_query($db_connection, "SELECT * FROM `admin` WHERE  admin_email = '$admin_email'");
            
            if(mysqli_num_rows($query) > 0){
                
                $row = mysqli_fetch_assoc($query);
                $admin_db_pass = $row['admin_password'];

                //  VERIFY PASSWORD
                $check_password = password_verify($_POST['admin_password'], $admin_db_pass);
                
                if($check_password === TRUE){
                    
                    session_regenerate_id(true);
                    
                    $_SESSION['admin_email'] = $admin_email;
                    header('Locaation: admin_dashborad.php');
                    exit;
                }
                else{
                    //Incorrect password
                    $error_message = "Incorrect email address or password";
                }
            }
            else{
                //email not registered
                $error_message = "Incorrect email address or password";
            }
        }
            else{
                //If fields are empty
                $error_message = "Please fill in all the required fields";
            }
        }
    
?>