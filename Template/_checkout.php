<?php
require '_config.php';



          
            
?>

<div class="container">
  <div class="row justify-content-center">
      <div class="col-lg-6 px-4 pb-4" id="order">
      <h4 class="text-center text-info p-2">Complete your order!</h4>
      <div class="jumbotron p-3 mb-2 text-center">
          <h6 class="lead"> <b>Product(s) : </b><?php
                foreach ($product->getData('cart') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
            ?>
                
                <p><?php echo $item['item_name'] ?> </p>
            <?php
                        return $item['item_price'];
                    }, $cart); // closing array_map function
                endforeach;
            ?> </h6>
            <h6 class="lead mb-3"><b>Delivery Charge : </b>Rs 50</h6>
            <h5><b>Total Amount Payable : </b><?php echo isset($subTotal) ? count($subTotal) : 0; ?> item(s)&nbsp; <span class="text-danger">$<span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $Cart->getSum($subTotal) : 0; ?>/- </h5>
      </div>
      <form action="" method="POST" id="placeOrder">
        <input type="hidden" name="products" value="<?php
                foreach ($product->getData('cart') as $item) :
                    $cart = $product->getProduct($item['item_id']);
                    $subTotal[] = array_map(function ($item){
            ?>
                
              <?php echo $item['item_name'] ?> 
            <?php
                        //return $item['item_price'];
                    }, $cart); // closing array_map function
                endforeach;
            ?>">
            <input type="hidden" name="grand_total" value="<?php echo $Cart->getSum($subTotal); ?>">
            <div class="form-group">
                 <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
            </div>
            <div class="form-group">
                 <input type="email" name="email" class="form-control" placeholder="Enter E-mail" required>
            </div>
            <div class="form-group">
                 <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
            </div>
            <div class="form-group">
                 <textarea name="address" class="form-control" cols="10" rows="3" placeholder="Enter Delivery Address Here...."></textarea>
            </div>
            <h6 class="text-center lead">Select Payment Method</h6>
            <div class="form-group">
                <select name="pmode" class="form-control">
                    <option value="" selected disabled>-Select Payment Method-</option>
                    <option value="cod">Cash On Delivery</option>
                    <option value="netbanking">Net Banking </option>
                    <option value="cards">Debit/Credit Cards</option>
                </select>
            </div>
            <div class="form-group">
                <input type="submit" name="submit" value="Place Order" class="btn btn-warning btn-block">
            </div>
      </form>
      </div>
  </div>
</div>


 
<?php
// $subTotal = 0;
// $allItems = '';
// $items = array();

// $sql = "SELECT CONCAT(cart_id, '(',item_id,')') AS ItemQty, user_id FROM cart";
// $stmt = $conn->prepare($sql);
// $stmt->execute();
// $result = $stmt->get_result();
// while($row = $result->fetch_assoc()){
//     $subTotal +=$row['user_id'];
//     $items[] = $row['ItemQty'];
// }
// print_r($items);
?>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>



<script type="text/javascript">
    $(document).ready(function(){
        $("#placeOrder").submit(function(e){
          e.preventDefault();
          $.ajax({
               url: 'Template/action.php',
               method: 'post',
               data: $('form').serialize()+"&action=order",
               success: function(response){
                   $("#order").html(response);
               }
          });
        });


    });
</script>



              

