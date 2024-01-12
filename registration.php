<?php
    session_start();
    include('./server/connection/php');

    if(isset($_POST['register'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $password = $_POST['password'];
      $confirmpassword = $_POST['confirmpassword'];

      if($password != $confirmpassword) {
        header('location: registration.php?error=Password is not matched!');
      }
      else if(strlen($password<6)){
        header('location: registration.php?error=Password must be at least 6 characters!');
      }
      else {
        $stmt1=$conn->prepare("SELECT count(*) FROM users where user_email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        if($num_rows!=0) {
          header('location: registration.php?error=User Email is already exists!');
        }
        else {
          $stmt=$conn->prepare("INSERT INTO users (user_name, user_email, user_address_ user_password) VALUES (?, ?, ?, ?)");
          $stmt->bind_param('ssss', $name, $email, $address, $password);
          if ($stmt->execute()) {
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('location: index.php?reistration=You Registered Successfully');
          }
          else {
            header('location: registration.php?error=Does not create account at this time');
          }
        }

      }
    }
    else if (isset($_SESSION['loggen_in'])) {
      header('location: index.php');
      exit;
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
                  <a class="dropdown-item" href="smartphones.html"
                    >Smartphones</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="handsfree.html">Handsfree</a>
                </li>
                <li>
                  <a class="dropdown-item" href="tablets.html">Tablets</a>
                </li>
                <li>
                  <a class="dropdown-item" href="smartwatches.html"
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

          <a class="nav-link" href="cart.html"
            ><i class="fa fa-shopping-cart" aria-hidden="true"></i
          ></a>
          <a class="nav-link" href="login.html"><i class="fas fa-user"></i></a>

          <!-- Search
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                  </form> 
                -->
        </div>
      </div>
    </nav>

    <!--Registration-->
    <section class="my-5 py-5" id="register">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Registration</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">

        <!-- start of form tag -->
        <form id="register-form" action='./registration.php' method='POST'>

          <div class="form-group">
            <label>Name</label>
            <input
              type="text"
              class="form-control"
              id="register-name"
              name="name"
              placeholder="Name"
              required
            />
          </div>
          <div class="form-group">
            <label>Email</label>
            <input
              type="text"
              class="form-control"
              id="register-email"
              name="email"
              placeholder="Login-email"
              required
            />
          </div>
          <div class="form-group">
            <label>Address</label>
            <input
              type="text"
              class="form-control"
              id="register-address"
              name="address"
              placeholder="Address"
              required
            />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input
              type="password"
              class="form-control"
              id="register-password"
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
              id="register-confirm-password"
              name="confirm-password"
              placeholder="Confirm Password"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="btn"
              id="register-btn"
              value="Register"
            />
          </div>
          <div class="form-group">
            <a class="nav-link" href="login.html"
              ><i id="loging-url" class="btn"
                >Don you have an account? Login
              </i></a
            >
          </div>

        </form>

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
