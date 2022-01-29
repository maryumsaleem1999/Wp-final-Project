<?php

include('_config.php');

$showError ="false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['loginusername'];
    $pass = $_POST['loginpassword'];

    $sql = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
   
    if ($numRows==1) {
        while($row = mysqli_fetch_assoc($result)){ 
            
        if (password_verify($pass, $row['password'])) {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            
            header("Location: /mobile/index.php?loginsuccess=true");
            
            exit();
        }
        else{
            $showError="Invalid credentials";
        }
    }
    }
header("Location: /mobile/index.php?loginsuccess=false&error=$showError");
    
}

?>