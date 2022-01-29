<!-- Top Sale -->
<?php

shuffle($product_shuffle);

// request method post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['top_sale_submit'])) {
        // call method addToCart
        $Cart->addToCart($_POST['user_id'], $_POST['item_id']);
    }
}
?>
<html>
    <body>
<section id="top-sale">
    <div class="container py-5">
        <h1 class="font-rubik text-center">Top Sale</h1>
        <hr>
        <!-- owl carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item) { ?>
                <div class="item py-2">
                    <div class="product font-rale">
                        <a href="<?php printf('%s?item_id=%s', 'product.php',  $item['item_id']); ?>"><img src="<?php echo $item['item_image'] ?? "./assets/products/1.png"; ?>" alt="product1" class="img-fluid"></a>
                        <div class="text-center">
                            <h6><?php echo  $item['item_name'] ?? "Unknown";  ?></h6>
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2">
                                <span>PKR&nbsp; <?php echo $item['item_price'] ?? '0'; ?></span>
                            </div>

                            <?php
                            //session_start();
                            //if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                            //    header("location: index.php");
                            //}  else{?>

                            <form method="post">
                                <input type="hidden" name="item_id" value="<?php echo $item['item_id'] ?? '1'; ?>">
                                <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                <?php
                                if (in_array($item['item_id'], $Cart->getCartId($product->getData('cart')) ?? [])) {
                                    echo '<button type="submit" disabled class="btn btn-success font-size-12">In the Cart</button>';
                                } else {
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                                    echo '
                                    <button type="submit" name="top_sale_submit" class="btn btn-warning font-size-12">Add to Cart</button>';}
                                    else{
                                       echo '
                                    <button type="button" name="top_sale_submit" data-toggle="modal" data-target="#loginModal" class="btn btn-warning font-size-12">Add to Cart</button>'; 
                                    }
                                }
                            ?>

                            </form>
                            <?php //} ?>
                        </div>
                    </div>
                </div>
            <?php } // closing foreach function 
            ?>
        </div>
        <!-- !owl carousel -->
    </div>
</section>
<!-- !Top Sale -->
</body>
</html>