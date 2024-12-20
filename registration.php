<?php
    session_start();
    // connect to db
    include('./server/connection.php');

    // if user pressed the register button
    if(isset($_POST['register'])) {

      $name = $_POST['name'];
      $email = $_POST['email'];
      $address = $_POST['address'];
      $password = $_POST['password'];
      $confirm_password = $_POST['confirm_password'];

      if($password !== $confirm_password) {
        header('location: registration.php?error=Passwords do not match!');
      }
      else if(strlen($password)<6){
        header('location: registration.php?error=Password must be at least 6 characters!');
      }
      else {
        // run a query in order to find if there is the same e-mail in db
        $stmt1=$conn->prepare("SELECT count(*) FROM users where user_email=?");
        $stmt1->bind_param('s', $email);
        $stmt1->execute();
        $stmt1->bind_result($num_rows);
        $stmt1->store_result();
        $stmt1->fetch();

        if($num_rows!=0) {
          header('location: registration.php?error=User e-mail is already exists!');
        }
        else {
          //create a new user if there the e-mail doesn't exist in db
          $stmt=$conn->prepare("INSERT INTO users (user_name, user_email, user_address, user_password) VALUES (?, ?, ?, ?)");
          $stmt->bind_param('ssss', $name, $email, $address, $password);

          //if account was created successfully
          if ($stmt->execute()) {
            $user_id = $stmt->insert_id;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['user_email'] = $email;
            $_SESSION['user_name'] = $name;
            $_SESSION['logged_in'] = true;
            header('location: account.php?success_msg=You registered successfully');
          }
          //account could not be created
          else {
            //$error = "Does not create account at this time";
            header('location: registration.php?error=Could not create an account at the moment');
          }
        }

      }
    }
    //if user has already registered, then take user to account page
    else if (isset($_SESSION['loggen_in'])) {
      header('location: account.php');
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

    <!--Show Navbar-->
    <div class="topnav" id="account_bar">
        <?php include('navbar.php'); ?>
    </div>

    <br>

    <!--Show Registration Form fields-->
    <section class="my-5 py-5" id="register">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Registration</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">

        <!-- start of form tags -->
        <form id="register-form" action="./registration.php" method="POST">

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
              pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"
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
              name="confirm_password"
              placeholder="Confirm Password"
              required
            />
          </div>
          <div class="form-group">
            <input
              type="submit"
              class="btn"
              id="register-btn"
              name="register"
              value="Register"
            />
          </div>
          <!-- catch an error message from php and display it here -->
          <div class="form-group">
              <p id="error-msg">
                <?php 
                  if(isset($_GET['error'])) { 
                    echo $_GET['error']; 
                  } 
                ?>
              </p>
          </div>
          <!-- switch to login page -->
          <div class="form-group">
            <a class="nav-link" href="login.php"><i id="loging-url" class="btn">Do you have an account? Login</i></a>
          </div>

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
