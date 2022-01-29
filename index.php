<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lucky Mobile | Home</title>
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
//include banner filee
include ('Template/_banner-area.php');


//include top-sale filee
include ('Template/_top-sale.php');


//include special-price filee
include ('Template/_special-price.php');


//include banner-ads filee
include ('Template/_banner-ads.php');


//include new-phones filee
include ('Template/_new-phones.php');
?>

<?php
//include footer filee
include ('footer.php');
?>






 