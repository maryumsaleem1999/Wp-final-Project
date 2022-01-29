<?php
 
 include('_config.php');


if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
  header("location: index.php");
}
?>

<title>Welcome - <?php echo $_SESSION['username'] ?></title>

  




<div class="container">
   <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username'] ?></h4>
  <p>Congratulation, you are logged in as <?php echo $_SESSION['username']?>.</p><br><p> This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to log out your Account. <a href="logout.php"><button type="button" class="btn-sm btn-danger rounded-pill">Logout</button></p></a>
</div>
</div>

