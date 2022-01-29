
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">


  <!-- owl-carousel cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw=" crossorigin="anonymous" />

  <!-- font-awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" integrity="sha256-46r060N2LrChLLb5zowXQ72/iKKNiw/lAmygmHExk/o=" crossorigin="anonymous" />

  <!-- Custom CSS link -->
  <link rel="stylesheet" href="style.css">

  <?php
  //require function.php file
  require('functions.php');

  ?>

</head>

<body>

  <!-- start header -->
  <?php
     session_start();
  echo
  ' 
 <header id="header">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light top ">
   
   
      <!-- <p class="font-rale font-size-14 text-black-50 m-0 ">Sarena mobile Market sakhi hassan road Karachi Pakistan</p> -->
      <ul class="sci mt-1">
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>

              <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>

              <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li> 
                
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
              
              

              
            </ul>
           

           
      <div class="font-rale font-size-14 my-2 login-button" style="float: right; display: flex;">';
  
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        
      
        echo' 
    
        
         
         <!-- Example split danger button -->
 <div class="btn-group btn-group-sm">
  <a type="" class="mx-2 my-1 text-" style="font-size: 15px; color:#00A5C4">'.$_SESSION['username'].'</a>
 
  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split mx-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="sr-only">Toggle Dropdown</span>
  </button>
  <div class="dropdown-menu">
    
  <a class="dropdown-item" href="welcome.php">Profile</a>
    <a class="dropdown-item" href="logout.php">Logout</a>
  
  </div>
</div>

        <!-- <a href="#" style="text-decoration: none;"><button class="btn btn-outline-primary btn-sm"> Wishlist('. count($product->getData('wishlist')).')</button></a>  -->
        </form>';}
        else{
        echo' <button class="btn btn-outline-primary btn-sm mx-2" data-toggle="modal" data-target="#loginModal">Login</button>
         <button class="btn btn-outline-primary btn-sm mx-2" data-toggle="modal" data-target="#signupModal">SignUp</button>';
        }
         echo'</div>
       </div>
     ';
    
     
     include 'Template/_loginModal.php';
     include 'Template/_signupModal.php';

       echo' 
      
      </div>
      
    </div>
    
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg navbar-dark color-second-bg">
      <a class="navbar-brand" href="index.php">Lucky Mobile</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form action="#" class="lucky-form-nav-mob font-size-14 font-rale ">
          <a href="cart.php" style="text-decoration: none;" class="py-2 rounded-pill color-primary-bg"  >
            <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
            <span class="px-3 py-2 rounded-pill text-dark bg-light" >'. count($product->getData('cart')) .'</span>
          </a>


        </form>
     
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav m-auto font-rubik">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="#">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="product_page.php">Product <i class="fas fa-chevron-down"></i></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="category.php">Category <i class="fas fa-chevron-down"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact Us</a>
          </li>
        </ul>
        <form action="#" class="lucky-form-nav font-size-14 font-rale ">
          <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
            <span class="font-size-16 px-2 text-white"><i class="fas fa-shopping-cart"></i></span>
            <span class="px-3 py-2 rounded-pill text-dark bg-light">'. count($product->getData('cart')) .'</span>
          </a>


        </form>
      </div>
    </nav>
   
    <!-- navbar end -->

  </header>';
  if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You can login now.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

  if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Oppss!</strong> '. $_GET['error'].'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  
  if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> You are logged in.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

  if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Oppss!</strong> '. $_GET['error'].'.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  
  
    if (isset($_GET['mailsent']) && $_GET['mailsent'] == "true") {
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Your Message sent.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }

  if (isset($_GET['mailsent']) && $_GET['mailsent'] == "false") {
    echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Oppss!</strong> Message not Sent.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  ?>


  <!-- end header -->


