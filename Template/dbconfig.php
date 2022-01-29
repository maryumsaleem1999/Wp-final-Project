<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "lucky";

$conn = mysqli_connect("$servername", "$username", "$password", "$database");

if (!$conn) {
//     echo "connected successfully";
// } else {
    die("Error" . mysqli_connect_error());}

?>