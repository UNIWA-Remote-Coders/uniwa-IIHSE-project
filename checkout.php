<?php
  session_start();


  if (!empty($_SESSION['cart']) && isset($_POST['checkout'])) {
      //let user in

  }    //send user to user page
  else {
      header('location: index.php');

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
    <div class="topnav" id="cart_bar">
        <?php include('navbar.php'); ?>
    </div>

        <br><br><br>

    <!--Checkout-->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Check Out</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <form id="checkout-form" method="POST" action="server/place_order.php">
          <div class="form-group checkout-small-element">
            <label>Name</label>
            <input
              type="text"
              class="form-control"
              id="ckeckout-name"
              name="name"
              placeholder="Name"
              required
            />
          </div>
          <div class="form-group checkout-small-element">
            <label>Email</label>
            <input
              type="text"
              class="form-control"
              id="ckeckout-email"
              name="email"
              placeholder="login-email"
              required
            />
          </div>
          <div class="form-group checkout-small-element">
            <label>Phone</label>
            <input
              type="tel"
              class="form-control"
              id="checkout-phone"
              name="phone"
              placeholder="Phone"
              required
            />
          </div>
          <div class="form-group checkout-small-element">
            <label>City</label>
            <input
              type="text"
              class="form-control"
              id="checkout-city"
              name="city"
              placeholder="City"
              required
            />
          </div>
          <div class="form-group checkout-large-element">
            <label>Address</label>
            <input
              type="text"
              class="form-control"
              id="checkout-address"
              name="address"
              placeholder="Address"
              required
            />
          </div>
          <div class="form-group checkout-btn-container">
              <p>Total amount: <?php echo $_SESSION['total']; ?>€</p>
              <input
                type="submit"
                class="btn"
                id="checkout-btn"
                value="Place Order"
                name="place_order"
              />
          </div>
        </form>
      </div>
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
