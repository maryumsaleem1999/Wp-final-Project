
<?php

//require mysql connection
require('database/DBController.php');

//requireProduct class
require('database/Product.php');

//require Cart class
require('database/Cart.php');

//DBController object
$db = new DBController();

//Product object
$product = new Product($db);
$product_shuffle = $product->getData();

//Cart object
$Cart = new Cart($db); 





?>