<?php
    /*
        "not paid"
        "shipped and pod"
        "paid and delivered"
    */
    session_start();
    include('./server/connection.php');

    if(isset($_POST['order_details_btn']) && isset($_POST['order_id'])) {
            
        $order_id = $_POST['order_id'];
        $order_status = $_POST['order_status'];
        $stmt = $conn->prepare("SELECT * FROM order_items WHERE order_id=?");
        $stmt->bind_param('i', $order_id);
        $stmt->execute();
        $order_details = $stmt->get_result();

        $order_total_price = calculateTotalOrderPrice($order_details);

    }
    else {
        header('location: account.php');
    }


    function calculateTotalOrderPrice($order_details) {

      $total = 0;

      foreach($order_details as $row) { 
        $product_price = $row['product_price'];
        $product_quantity = $row['product_quantity'];

        $total = $total + ($product_price * $product_quantity);
      }

      $_SESSION['total'] = $total;

      return $total;

  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
      integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
  </head>
  <body>
    <!--Navbar-->
        <?php include('navbar.php'); ?>

    <br/><br/><br/>

    <!-- Order Details -->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-5">
          <h2 class="font-weight-bold text-center">Order Details</h2>
          <hr class="mx-auto">
        </div>
        <table class="mt-5 pt-5 mx-auto">

            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>

            <?php foreach($order_details as $row) { ?>
            <tr>
                <td>
                    <div class="product-info">
                        <img src="<?php echo $row['product_image']; ?>"/>
                        <div>
                            <p clas="mt-3"><?php echo $row['product_name']; ?></p>
                        </div>
                    </div>
                </td>

                <td>
                  <span><?php echo $row['product_price']; ?>€</span>
                </td>

                <td>
                    <span><?php echo $row['product_quantity']; ?></span>
                </td>
            </tr>
            <?php } ?>
        </table>

        <?php if($order_status == "not paid") { ?>

            <form style="float: right;" method="POST" action="payment.php">
                <input type="hidden" name="order_total_price" value="<?php echo $order_total_price; ?>"/>
                <input type="hidden" name="order_status" value="<?php echo $order_status; ?>"/>
                <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
                <input type="submit" name="order_pay_btn" class="btn btn-primary" value="Pay Now"/>
            </form>
        
        <?php } ?>
    </section>

    <!--Footer-->
    <?php include('footer.php'); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
