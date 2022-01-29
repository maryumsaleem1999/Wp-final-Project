<?php

include('_config.php');
 
$login = false;
$showError = false;
$msg= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  


  $username = $_POST["adminusername"];
  $password = $_POST["adminpassword"];
  //$sql = "SELECT * FROM `admin` where admin_name='$username' AND admin_password='$password'";
  $sql = "SELECT * FROM `users` WHERE username='$username'";
  $result = mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if ($num == 1) {
    while ($row = mysqli_fetch_assoc($result)) {
      if (password_verify($password, $row['password'])) {
   
      
        
        $login = true;
         session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        header("location: ../welcomeadmin.php");
      }

    
    
   else {
    $showError = "Invalid Username or Password2";
  }
}
} else {
  $showError = "Invalid Username or Password2";
}

}
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <title>Lucky Mobile | Login as Admin</title>
</head>
<body>
 
  <?php

  if ($login) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Congratulations!</strong> You are logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
  }

  if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> ' . $showError . '
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>';
  }
  ?>

  <div class="container my-4">
<h1 class="text-center">Login as Admin</h1>
    <div class="row my-5">
      <div class="col-sm-6 offset-3">
        <form action="Template/_adminlogin.php" method="POST">

          <div class="form-group">
            <!-- <label for="username">Username</label> -->
            <input type="text" class="form-control" id="adminusername" name="adminusername" placeholder="Username" aria-describedby="emailHelp">

          </div>
          <div class="form-group">
            <!-- <label for="password">Password</label> -->
            <input type="password" class="form-control" id="adminpassword" name="adminpassword" placeholder="Password">
          </div>


          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    
    <!-- <div class="col-sm-6">
        <img src="./assets/adminlogin.jpg" alt="" class="img-fluid" >
    </div> -->
</div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>