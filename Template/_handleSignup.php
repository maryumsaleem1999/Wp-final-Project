<?php


include('_config.php');

$showAlert = false;
 $showError =false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $mobile = $_POST["phone"];
    //$exists = false;

    //check whether this username exist
    $existSql ="SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    
    $existEmailSql ="SELECT * FROM `users` WHERE email = '$email'";
    $result = mysqli_query($conn, $existEmailSql);
    $numExistEmail = mysqli_num_rows($result);

    $existPhoneSql ="SELECT * FROM `users` WHERE phone = '$mobile'";
    $result = mysqli_query($conn, $existPhoneSql);
    $numExistPhone = mysqli_num_rows($result);

    if ($numExistRows > 0) {
        //$exists = true;
        $showError ="Username Already Exist";
    }
    elseif ($numExistEmail > 0) {
        //$exists = true;
        $showError ="Email Already Exist";
    }
    elseif ($numExistPhone > 0) {
        //$exists = true;
        $showError ="Phone Number Already Exist";
    }
    else{
        //$exists = false;
        if (($password == $cpassword)) {
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO `users` (`fname`, `lname`, `username`, `email`, `password`, `phone`, `date`) VALUES ('$fname', '$lname', '$username', '$email', '$hash', '$mobile', current_timestamp())";
                $result = mysqli_query($conn, $sql);
                
                if ($result){
                    $showAlert = true;
                    header("Location: /mobile/index.php?signupsuccess=true");
                    exit();
                }
            }else{
                    $showError ="Password do not match";

                }
            }
            
    header("Location: /mobile/index.php?signupsuccess=false&error=$showError");
        }
        ?>