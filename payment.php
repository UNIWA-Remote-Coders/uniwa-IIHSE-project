<?php

  session_start();
  //include('./server/connection.php');


  if(isset($_POST['order_pay_btn'])) {
    $order_status = $_POST['order_staus'];
    $order_total_price = $_POST['order_total_price'];
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
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container">
        <img src="assets/imgs/logo1.png" width="90px" height="90px" />
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse nav-buttons"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"
                >Home</a
              >
            </li>

            <li class="nav-item">
              <a class="nav-link" href="offers.html">Offers</a>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Products
              </a>

              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="smartphones.php"
                    >Smartphones</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="handsfree.php">Handsfree</a>
                </li>
                <li>
                  <a class="dropdown-item" href="tablets.php">Tablets</a>
                </li>
                <li>
                  <a class="dropdown-item" href="smartwatches.php"
                    >Smartwatches</a
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about-us.html">About Us</a>
            </li>
          </ul>

          <a class="nav-link" href="cart.php"
            ><i class="fa fa-shopping-cart" aria-hidden="true"></i
          ></a>
          <a class="nav-link" href="login.php"><i class="fas fa-user"></i></a>

          <!-- Search
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form> 
                -->
        </div>
      </div>
    </nav>

    <!--Payment-->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container text-center">

      <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
        <p>Total Payment: <?php echo $_SESSION['total']; ?>€</p>
        <input class="btn btn-primary" value="Pay Now" type="Submit"/>
      <?php } else if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid") { ?>
        <p>Total Payment: <?php echo $_POST['order_total_price']; ?>€</p>
        <input class="btn btn-primary" value="Pay Now" type="Submit"/>
      <?php } else { ?>
        <p>You don't have an order</p>
      <?php }?>

        <!--http://localhost:3000/payment.php?order_status=order%20placed%20successfully-->
      </div>
    </section>

    <!--Footer-->
    <footer>
      <div class="footerContainer">
        <div class="socialIcons">
          <a href=""><i class="fa-brands fa-facebook"></i></a>
          <a href=""><i class="fa-brands fa-instagram"></i></a>
          <a href=""><i class="fa-brands fa-twitter"></i></a>
          <a href=""><i class="fa-brands fa-google-plus"></i></a>
          <a href=""><i class="fa-brands fa-youtube"></i></a>
        </div>
        <div class="footerNav">
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="">Products</a></li>
            <li><a href="offers.html">Offers</a></li>
            <li><a href="about-us.html">About us</a></li>
            <li><a href="about-us.html">Contact us</a></li>
          </ul>
        </div>
      </div>
      <div class="footerBottom">
        <p>eCommerce @ 2025 All Right Reserved</p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
