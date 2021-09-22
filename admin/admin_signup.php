<?php
session_start();
require 'admin_db/db_connection.php';
require 'admin_insert.php';
//if admin logged in
if(isset($_SESSION['admin_email'])){
    header('Location:admin_dashborad.php');
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="admin_css/main.css">
</head>

<body>
    <form action=" " method="POST">
        <h2>Create an account</h2>

        <div class=container>
            <label for="admin name"><b> Name</b></label>
            <input type="text" placeholder=" Admin name" id="adminname" name="adminname" require>

            <label for="adminname"><b>Email</b></label>
            <input type="email" placeholder="Enter Email" id="admin_email" name="admin_email" require>

            <label for="Admin Password"><b>Password</b></label>
            <input type="password" placeholder="Admin Password" id="admin_password" name="admin_password" require>

            <button type="submit">Sign Up</button>
        </div>

        <?php
if(isset($success_message)){
    echo '<div class= "success_message">'.$success_message.'</div>';
}
if(isset($error_message)){
    echo '<div class="error_message">'.$error_message.'</div>';
}
?>
        <div class="container" style="background-color: 2fa">
            <a href="index.php"><button type="button" class="Regbtn">Login</button></a>
        </div>
    </form>
</body>

</html>