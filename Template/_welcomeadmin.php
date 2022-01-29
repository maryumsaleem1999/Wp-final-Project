<?php
include('_config.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
  header("location: ../index.php");
}

$showAlert = false;
$showError =false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $item_brand = $_POST["item_brand"];
    $item_name = $_POST["item_name"];
    $item_image = $_POST["item_image"];
    $item_price = $_POST['item_price'];
    $item_description = $_POST["item_description"];
    
    $sql ="INSERT INTO `product` (`item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_description`) VALUES ('$item_brand', '$item_name', '$item_price', '$item_image', current_timestamp(), '$item_description')";
    $result = mysqli_query($conn, $sql);

    if ($result){
        $showAlert = true;
    }
else{
        $showError ="Something went wrong! Try Again";
    }

}

?>

<title>Welcome - <?php echo $_SESSION['adminusername'] ?></title>

  


<?php
    
    if ($showAlert){
         echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
         <strong>Congratulations!</strong> Your Product has been added successfully.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>';
     }
     
     if ($showError){
         echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
         <strong>Error!</strong> '.$showError.'
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">&times;</span>
         </button>
     </div>';
     }
     ?> 

<div class="container">
   <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Welcome - <?php echo $_SESSION['adminusername'] ?></h4>
  <p>Congratulation, you are logged in as <?php echo $_SESSION['adminusername']?>.</p><br><p> This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
 


<form action="welcomeadmin.php" method="POST">
                        

                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_brand" name="item_brand" placeholder="Item Brand" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_name" name="item_name" placeholder="Item Name" aria-describedby="emailHelp">

                        </div>
                         <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_price" name="item_price" placeholder="Item Price" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                            <input type="file" class="custom-file-input py-4" id="customFile" name="item_image" placeholder="Item Image" aria-describedby="emailHelp" required>
                            <label for="customFile" class="custom-file-label"></label>
                        </div>
                        </div>
                       
                        <div class="form-group">
                            <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                            <textarea class="form-control py-4" id="item_description" name="item_description" rows="3" placeholder="Item Description"></textarea>
                        </div>

                        
                                    <button type="submit" value="SEND" id="submit" class="btn btn-primary btn-radius py-2">Add Product</button>
                               

                       
                    </form> 
                    <hr>
  <p class="mb-0">Whenever you need to, be sure to log out your Account. <a href="logout.php"><button type="button" class="btn-sm btn-danger rounded-pill">Logout</button></p></a>
</div>
</div>

<?php

//
?>


