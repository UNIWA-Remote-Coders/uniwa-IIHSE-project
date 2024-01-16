<?php

  session_start();
  include('./server/connection.php');

  if(!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
  }

  if(isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
      unset($_SESSION['logged_in']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      header('location: login.php');
      exit;
    }
  }

  if(isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

    if($password !== $confirm_password) {
      header('location: account.php?error=Passwords do not match!');
    }
    else if(strlen($password)<6) {
      header('location: account.php?error=Password must be at least 6 characters!');
    }
    else {
      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
      $stmt->bind_param('ss', md5($password), $user_email);
      if($stmt->execute()) {
        header('location: account.php?message=Password has been updated successfully');
      }
      else {
        header('location: account.php?error=Could not update password');
      }
    }
  }

  //get orders
  if(isset($_SESSION['loggen_in'])) {

    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT * FROM orders WHERE user_id=?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $orders = $stmt->get_result();
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
    <br/><br/><br/><br/><br/>

    <!--Account-->
    <section class="my-5 py-5">
      <div class="row container mx-auto">
        <div class="text-center">
              <b id="confirm-msg">
                <?php 
                  if(isset($_GET['success_msg'])) { 
                    echo $_GET['success_msg']; 
                  } 
                ?>
              </b>
        </div>
        <div class="text-center mt-3 pt-2 col-lg-6 col-md-12 col-sm-12">
          <h3 class="font-weight-bold">Account info</h3>
          <hr class="mx-auto" />
          <div class="account-info">
            <p>Name: 
              <span>
                <?php 
                  if(isset($_SESSION['user_name'])) { 
                    echo $_SESSION['user_name']; 
                  }
                ?>
              </span>
            </p>
            <p>Email: 
              <span>
                <?php 
                  if(isset($_SESSION['user_email'])) {
                    echo $_SESSION['user_email']; 
                  } 
                ?>
              </span>
            </p>
            <p><a href="#orders" id="orders-btn">Your orders</a></p>
            <p><a href="account.php?logout=1" id="logout-btn">Logout</a></p>
          </div>
        </div>

        <div class="col-lg-6 col-md-12 col-sm-12">
          <form id="account-form" method="POST" action="account.php">
            <h3>Change Password</h3>
            <hr class="mx-auto" />
            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                class="form-control"
                id="account-password"
                name="password"
                placeholder="Password"
                required
              />
            </div>
            <div class="form-group">
              <label>Confirm Password</label>
              <input
                type="password"
                class="form-control"
                id="account-password-confirm"
                name="confirmPassword"
                placeholder="Password"
                required
              />
            </div>
            <div class="form-group">
              <input
                type="submit"
                value="Change Password"
                class="btn"
                id="change-pass-btn"
                name="change_password"
              />
            </div>
            <div class="form-group">
              <p id="error-msg">
                <?php 
                  if(isset($_GET['error'])) { 
                    echo $_GET['error']; 
                  } 
                ?>
              </p>
            </div>
            <div class="form-group">
              <p id="confirm-msg">
                <?php 
                  if(isset($_GET['message'])) { 
                    echo $_GET['message']; 
                  } 
                ?>
              </p>
        </div>
          </form>
        </div>
      </div>
    </section>

    <!--Orders-->
    <section id="orders" class="orders container my-5 py-3">
        <div class="container mt-2">
          <h2 class="font-weight-bold text-center">Yor Orders</h2>
          <hr class="mx-auto">
        </div>
        <table class="mt-5 pt-5">

          <tr>
            <th>Oreder id</th>
            <th>Order cost</th>
            <th>Order status</th>
            <th>Order Date</th>
            <th>Order details</th>
          </tr>

          <?php while($row = $orders->fetch_assoc()) { ?>
                <tr>
                  <td>
                      <span><?php echo $row['order_id'];?></span>
                  </td>
      
                  <td>
                    <span><?php echo $row['order_cost'];?>/span>
                  </td>

                  <td>
                    <span><?php echo $row['order_status'];?>/span>
                  </td>

                  <td>
                    <span><?php echo $row['order_date'];?>/span>
                  </td>

                  <td>
                    <form class="btn order-details-btn" type="submit" value="details">
                  </td>
                </tr>
          <?php } ?>


        </table>
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
