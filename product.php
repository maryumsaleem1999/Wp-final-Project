<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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

//include product filee
include ('Template/_products.php');
 

//include top-sale filee
include ('Template/_top-sale.php');
?>

<?php
//include footer filee
include ('footer.php');
?>
