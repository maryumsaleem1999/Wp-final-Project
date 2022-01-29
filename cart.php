<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lucky Mobile | Cart</title>
</head>
<body>
  
</body>
</html>

<?php
ob_start();

//include haeder filee
include ('header.php');
?>

<?php

//include cart filee
//include cart item if it is not empty
  count($product->getData('cart'))?include ('Template/_cart-template.php'):include ('Template/notFound/_cart_notFound.php');

//include wishlist filee
count($product->getData('wishlist'))?include ('Template/_wishilist_template.php'):include ('Template/notFound/_wishlist_notFound.php');


//include new-phone filee
include ('Template/_new-phones.php');
?>

<?php
//include footer filee
include ('footer.php');
?>
