<?php
  
  session_start();
  include('./server/connection.php');  // connect with db

  if(isset($_SESSION['logged_in'])){   // if already logged in go to account page
    header('location: account.php');
    exit;
  }

  if(isset($_POST['login_btn'])) {    // if login button pressed check account
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT user_id, user_name, user_email, user_password FROM users WHERE user_email=? AND user_password=? LIMIT 1");
    $stmt->bind_param('ss', $email, $password);


    if($stmt->execute()){             // if true we get results

      $stmt->bind_result($user_id, $user_name, $user_email, $user_password);
      $stmt->store_result();

      if($stmt->num_rows()==1){       // if one account fount,  save the account information in a session

        $stmt->fetch();

        $_SESSION['user_id']=$user_id;
        $_SESSION['user_name']=$user_name;
        $_SESSION['user_email']=$user_email;
        $_SESSION['user_password']=$user_password;
        $_SESSION['logged_in']=true;

        header('location: account.php?success_msg=You have logged in successfully');
      }
      else {
        header('location: login.php?error=Could not verify your account');
      }
    }
    else {
      header('location: login.php?error=Something went wrong');
    }
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

    <br><br>

    <!-- Show Login fields and buttons-->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Login</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container">
        <form id="login-form" action="login.php" method="POST">
          <div class="form-group">
            <label>Email</label>
            <input
              type="text"
              class="form-control"
              id="login-email"
              name="email"
              placeholder="login-email"
              required
            />
          </div>
          <div class="form-group">
            <label>Password</label>
            <input
              type="password"
              class="form-control"
              id="login-password"
              name="password"
              placeholder="Password"
              required
            />
          </div>
          <div class="form-group">
            <input type="submit" class="btn" id="login-btn" name="login_btn" value="Login" />
          </div>
          <div class="form-group">
              <p id="error-msg">
                <?php 
                //Show if there is an error message here
                  if(isset($_GET['error'])) {        
                    echo $_GET['error']; 
                  } 
                ?>
              </p>
          </div>
          <div class="form-group">
            <a class="nav-link" href="registration.php">
              <i id="register-url" class="btn"
                >Don't have account? Register
              </i></a
            >
          </div>
        </form>
      </div>
    </section>

    <!-- Show Footer-->
    <?php include('footer.php'); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
