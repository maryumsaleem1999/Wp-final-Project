<?php
//INSERT INTO `note` (`item_id`, `title`, `description`, `Tstamp`) VALUES ('1', 'i want to write a title for this title', 'if i\'m done with my task i will delete this description', current_timestamp()); 
$insert = false;
$update = false;
$delete = false;
//connecting to database


include('_config.php');



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

    <title>Welcome - <?php echo $_SESSION['username'] ?></title>

</head>

<body>
    <!-- Button edit modal -->
    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal">
  Edit Modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="welcomeadmin.php" method="POST">
                        <input type="hidden" name="item_idEdit" id="item_idEdit">
                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_brandedit" name="item_brandedit" placeholder="Item Brand" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_nameedit" name="item_nameedit" placeholder="Item Name" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_priceedit" name="item_priceedit" placeholder="Item Price" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group">
                            <!-- <label for="username">Username</label> -->
                            <input type="text" class="form-control py-4" id="item_imageedit" name="item_imageedit" placeholder="Item Image" aria-describedby="emailHelp">

                        </div>

                        <div class="form-group">
                            <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                            <textarea class="form-control py-4" id="item_descriptionedit" name="item_descriptionedit" rows="3" placeholder="Item Description"></textarea>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Update note</button> -->

                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <?php
    if ($insert) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Congrats</strong> Your note has been inserted successfully.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
      </div>';
    }
    ?>
    <?php
    if ($delete) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Congrats</strong> Your note has been deleted successfully.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
      </div>';
    }
    ?>
    <?php
    if ($update) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong>Congrats</strong> Your note has been updated successfully.
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
     <span aria-hidden="true">&times;</span>
     </button>
      </div>';
    }
    ?>

    <div class="container">
        <div class="alert alert-success" role="alert">
            <div class="row my-3">
                <div class="col-sm-8">
                    <h4 class="alert-heading">Welcome - <?php echo $_SESSION['username'] ?></h4>
                    <p>Congratulation, you are logged in as <?php echo $_SESSION['username'] ?>.</p><br>
                </div>
                <div class="col-sm-4">
                <a href="order.php" style="text-decoration: none; float: right;"><button class="btn btn-success btn-lg"> Order(<?php echo count($product->getData('orders')); ?>)</button></a>
                </div>
            </div>
            <p> This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>



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
                    <!-- <label for="username">Username</label> -->
                    <input type="text" class="form-control py-4" id="item_image" name="item_image" placeholder="Item Image" aria-describedby="emailHelp">

                </div>

                <div class="form-group">
                    <!-- <label for="exampleFormControlTextarea1">Example textarea</label> -->
                    <textarea class="form-control py-4" id="item_description" name="item_description" rows="3" placeholder="Item Description"></textarea>
                </div>


                <button type="submit" value="SEND" id="submit" class="btn btn-primary btn-radius py-2">Add Product</button>



            </form>
            <hr>


            <div class="container my-4">


                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">S.no</th>
                            <th scope="col">Item_brand</th>
                            <th scope="col">Item_name</th>
                            <th scope="col">Item_price</th>
                            <th scope="col">Item_image</th>
                            <th scope="col">Item_description</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "SELECT * FROM `product`";
                        $result = mysqli_query($conn, $sql);
                        $item_id = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $item_id = $item_id + 1;
                            echo "<tr>
            <th scope='row'>" . $item_id . "</th>
            <td>" . $row['item_brand'] . "</td>
            <td>" . $row['item_name'] . "</td>
            <td>" . $row['item_price'] . "</td>
            <td>" . $row['item_image'] . "</td>
            <td>" . $row['item_description'] . "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=" . $row['item_id'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['item_id'] . ">Delete</button>  </td>
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

            <script>
                edits = document.getElementsByClassName('edit');
                Array.from(edits).forEach((element) => {
                    element.addEventListener("click", (e) => {
                        console.log("edit", );
                        tr = e.target.parentNode.parentNode;
                        item_brand = tr.getElementsByTagName("td")[0].innerText;
                        item_name = tr.getElementsByTagName("td")[1].innerText;
                        item_price = tr.getElementsByTagName("td")[2].innerText;
                        item_image = tr.getElementsByTagName("td")[3].innerText;
                        item_description = tr.getElementsByTagName("td")[4].innerText;
                        console.log(item_brand, item_name, item_price, item_image, item_description);
                        item_brandedit.value = item_brand;
                        item_nameedit.value = item_name;
                        item_priceedit.value = item_price;
                        item_imageedit.value = item_image;
                        item_descriptionedit.value = item_description;
                        item_idEdit.value = e.target.id;
                        console.log(e.target.id);
                        $('#editModal').modal('toggle')
                    })

                })

                deletes = document.getElementsByClassName('delete');
                Array.from(deletes).forEach((element) => {
                    element.addEventListener("click", (e) => {
                        console.log("edit", );
                        item_id = e.target.id.substr(1, );

                        if (confirm("Are You Sure you want to delete")) {
                            console.log("yes");
                            window.location = `welcomeadmin.php?delete=${item_id}`;
                        } else {
                            console.log("no");
                        }

                    })

                })
            </script>
            <p class="mb-0">Whenever you need to, be sure to log out your Account. <a href="logout.php"><button type="button" class="btn-sm btn-danger rounded-pill">Logout</button></p></a>
        </div>
    </div>

</body>

</html>