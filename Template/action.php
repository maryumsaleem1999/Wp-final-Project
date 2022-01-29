<?php

require '_config.php';

if(isset($_POST['action']) && isset($_POST['action']) == 'order') {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $products = $_POST['products'];
  $grand_total = $_POST['grand_total'];
  $address = $_POST['address'];
  $pmode = $_POST['pmode'];

  $data = '';

   $stmt = $conn->prepare("INSERT INTO `orders` (`name`, `email`, `phone`, `address`, `pmode`, `products`, `amount_paid`, `date`) VALUES ('$name', '$email', '$phone', '$address', '$pmode', '$products', '$grand_total', current_timestamp())");
   $stmt->execute();
   $data .= '<div class="text-center table table-striped">
           <th><h1 class="display-4 mt-2 text-danger">Thank You!</h1></th>
           <td><h2 class="text-success">Your Order Placed Successfully</h2></td>
           <td><h4 class="bg-danger text-light rounded p-2">Items Purchased : '.$products.'</h4></td>
           <h4>Your Name : '.$name.'</h4>
           <h4>Your E-mail : '.$email.'</h4>
           <h4>Your Phone : '.$phone.'</h4>
           <h4>Total Amount Paid : '.$grand_total.'</h4>
           <h4>Payment Method : '.$pmode.'</h4><br><br>
           <h5>Continue Shopping Go to <a href="index.php">HomePage</h5></a>


             </div>';

             echo $data;
}
