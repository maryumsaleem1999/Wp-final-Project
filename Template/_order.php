<?php
//INSERT INTO `note` (`item_id`, `title`, `description`, `Tstamp`) VALUES ('1', 'i want to write a title for this title', 'if i\'m done with my task i will delete this description', current_timestamp()); 
$insert = false;
$update = false;
$delete = false;
//connecting to database
include('_config.php');

session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true) {
//   header("location: ../index.php");
// }


if (isset($_GET['delete'])) {
    $item_id = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `product` WHERE `item_id` = $item_id";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['item_idEdit'])) {
        //update the record
        $item_id = $_POST['item_idEdit'];
        $item_brand = $_POST["item_brandedit"];
        $item_name = $_POST["item_nameedit"];
        $item_image = $_POST["item_imageedit"];
        $item_price = $_POST['item_priceedit'];
        $item_description = $_POST["item_descriptionedit"];

        //sql query
        $sql = "UPDATE `product` SET `item_brand` = '$item_brand' , `item_name` = '$item_name' , `item_image` = '$item_image' , `item_price` = '$item_price' , `item_description` = '$item_description'  WHERE `product`.`item_id` = $item_id;";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            echo "WE could not update record";
        }
    } else {
        $item_brand = $_POST["item_brand"];
        $item_name = $_POST["item_name"];
        $item_image = $_POST["item_image"];
        $item_price = $_POST['item_price'];
        $item_description = $_POST["item_description"];

        $sql = "INSERT INTO `product` (`item_brand`, `item_name`, `item_price`, `item_image`, `item_register`, `item_description`) VALUES ('$item_brand', '$item_name', '$item_price', '$item_image', current_timestamp(), '$item_description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Oops</strong>  We are facing some issues Sorry for inconvinence
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
  </button>
  </div>';
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<title>Lucky Mobile | Orders</title>
            <hr>


            <div class="container bg-light py-4">
              <h1 class="text-center py-3">Orders</h1>

                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Name</th>
                            <th scope="col">E-mail</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Address</th>
                            <th scope="col">Payment Mode</th>
                            <th scope="col">Products</th>
                            <th scope="col">Amount Paid</th>
                            <th scope="col">Date</th>
                            
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM `orders`";
                        $result = mysqli_query($conn, $sql);
                        $item_id = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $item_id = $item_id + 1;
                            echo "<tr>
            <th scope='row'>" . $item_id . "</th>
            <td>" . $row['name'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>" . $row['phone'] . "</td>
            <td>" . $row['address'] . "</td>
            <td>" . $row['pmode'] . "</td>
            <td>" . $row['products'] . "</td>
            <td>" . $row['amount_paid'] . "</td>
            <td>" . $row['date'] . "</td>
         </tr>";
                        }




                        ?>


                    </tbody>
                </table>
            </div>
            <hr>

            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
            <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
            </script>

           

</body>

</html>