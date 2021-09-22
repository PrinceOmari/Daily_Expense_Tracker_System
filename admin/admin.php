<?php
session_start();
require 'admin_db/db_connection.php';
require 'admin_login.php';
// IF USER LOGGED IN
if(isset($_SESSION['admin_email'])){
    header('Location: admin_dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - </title>
    <link rel="stylesheet" href="admin_css/main.css">
</head>

<body>
    <form action=" " method="POST">
        <h2>Admin Login</h2>

        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="email" placeholder="Enter email" id="email" name="admin_email" require>

            <label for="Password"><b>Password</b></label>
            <input type="Password" placeholder="Enter Password" id="password" name="admin_password" require>

            <button type="submit"> Login </button>
        </div>
        <?php
        if(isset($success_message)){
            echo '<div class="error_message">'.$success_message.'</div>';
        }
        if(isset($error_message)){
            echo '<div class="error_message">'.$error_message.'</div>';
        }
        ?>
        <div class="container" style="background-color: #845">
            <a href="signup.php"><button type="button" class="Regbtn">Create an account</button></a>
        </div>
    </form>

</body>

</html>