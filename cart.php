<?php
    session_start();

    // if add a product in your cart
    if(isset($_POST['add_to_cart'])) {
      
      //if user has already added a product to cart
      if(isset($_SESSION['cart'])) {

        $products_array_ids = array_column($_SESSION['cart'], "product_id"); // [2, 3, 4, 10, 15]
        
        //if product has not already beed added to cart
        if( !in_array($_POST['product_id'], $products_array_ids) ) {

          $product_id = $_POST['product_id'];

          $product_array = array(
            'product_id' => $_POST['product_id'],
            'product_name' => $_POST['product_name'],
            'product_price' => $_POST['product_price'],
            'product_image' => $_POST['product_image'],
            'product_quantity' => $_POST['product_quantity']
          );

          $_SESSION['cart'][$product_id] = $product_array;

        }
        //product has already been added
        else {
          echo '<script>alert("Product was already to cart");</script>';
        }
      }
      //if this is the first item
      else {

        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];

        $product_array = array(
          'product_id' => $product_id,
          'product_name' => $product_name,
          'product_price' => $product_price,
          'product_image' => $product_image,
          'product_quantity' => $product_quantity
        );

        $_SESSION['cart'][$product_id] = $product_array;
      }
      
      //calculate total
      calculateTotalCart();

    }
    //remove product from cart
    else if(isset($_POST['remove_product'])) {

      $product_id = $_POST['product_id'];
      unset($_SESSION['cart'][$product_id]);

      //calculate total
      calculateTotalCart();
    }
    //edit product quantity
    else if (isset($_POST['edit_quantity'])) {

      //we get id and quantity from form
      $product_id = $_POST['product_id'];
      $product_quantity = $_POST['product_quantity'];

      if ($product_quantity > 0) {
        //get the product array from session
        $product_array = $_SESSION['cart'][$product_id];

        //update product quantity
        $product_array['product_quantity'] = $product_quantity;

        //return array back its place
        $_SESSION['cart'][$product_id] = $product_array;

        //calculate total
        calculateTotalCart();
      }
      // remove product if is 0
      else {

          unset($_SESSION['cart'][$product_id]);

          //calculate total
          calculateTotalCart();
        }
    }
    //Show a message if cart is empty
    else if (!$_SESSION['cart']){
      echo '<script>alert("Empty cart!");</script>';
    }

    // this function calcualtes the total of all session carts
    function calculateTotalCart() {
        $total = 0;

        foreach($_SESSION['cart'] as $key => $value) {

          $product = $_SESSION['cart'][$key];

          $price = $product['product_price'];
          $quantity = $product['product_quantity'];

          $total = $total + ($price * $quantity);

      }

        $_SESSION['total'] = $total;

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

    <!--Show Navbar-->
    <div class="topnav" id="cart_bar">
        <?php include('navbar.php'); ?>
    </div>

    <br/><br />

    <!--Show Cart-->
    <section class="cart container my-5 py-5">
      <div class="container mt-5">
        <h2 class="font-weight-bold">Your Cart</h2>
        <hr>
      </div>

      <table class="mt-5 pt-5">
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Subtotal</th>
        </tr>

        <!-- Show User's Products that added in his cart by checking each cart Session -->
        <?php if(isset($_SESSION['cart'])) { foreach($_SESSION['cart'] as $key => $value) { ?>
          <tr>

            <td>
              <div class="product-info">
                <img src="<?php echo $value['product_image']; ?>" />
                <div>
                  <p><?php echo $value['product_name']; ?></p>
                  <small><span><?php echo number_format($value['product_price'], 2); ?>€</span></small>  
                  <br>
                  <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>"/>
                    <input type="submit" name="remove_product" class="remove-btn" value="remove"/>
                  </form>
                </div>
              </div>
            </td>

            <td>
              <div>
                <form method="POST" action="cart.php">
                  <input type="hidden" name="product_id" value="<?php echo $value['product_id']; ?>" />
                  <input type="number" name="product_quantity" value="<?php echo $value['product_quantity']; ?>" />
                  <input type="submit" class="edit-btn" value="edit" name="edit_quantity"/>
                </form>
              </div>
            </td>

            <td>
              <span class="product-price"><?php echo number_format($value['product_quantity'] * $value['product_price'], 2); ?>€</span>
            </td>

          </tr>

        <?php } } ?>
      </table>

      <!-- Show total cost of the cart and the button checkout -->
      <div class="cart-total">
        <table>
          <tr>
            <td>Total</td>
            <td><?php if(isset($_SESSION['total'])) { echo number_format($_SESSION['total'], 2); } ?>€</td>
          </tr>
        </table>
      </div>
      <div class="checkout-container">
        <form method="POST" action="checkout.php">
          <input type="submit" class="checkout-btn" value="Checkout" name="checkout"/>
        </form>
      </div>
    </section>

    <!--Show Footer-->
    <?php include('footer.php'); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
