<?php

  session_start();
  include('./server/connection.php');

  //check if user is not logged in
  if(!isset($_SESSION['logged_in'])) {
    header('location: login.php');
    exit;
  }

  if(isset($_GET['logout'])) {
    if (isset($_SESSION['logged_in'])) {
      unset($_SESSION['logged_in']);
      unset($_SESSION['user_email']);
      unset($_SESSION['user_name']);
      unset($_SESSION['user_password']);
      header('location: login.php');
      exit;
    }
  }

  //change the password from user and update users table
  if(isset($_POST['change_password'])) {
    $current_password = $_POST['currentpassword'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirmPassword'];
    $user_email = $_SESSION['user_email'];

    if($current_password != $_SESSION['user_password']) {
      header('location: account.php?error=Current password is wrong!');
    }
    else if($password !== $confirm_password) {
      header('location: account.php?error=Passwords do not match!');
    }
    else if($current_password == $password) {
      header('location: account.php?error=You cannot set the same password!');
    }
    else if(strlen($password)<6) {
      header('location: account.php?error=Password must be at least 6 characters!');
    }
    else {
      $stmt = $conn->prepare("UPDATE users SET user_password=? WHERE user_email=?");
      $stmt->bind_param('ss', /*md5($password)*/$password, $user_email);
      if($stmt->execute()) {
        $_SESSION['user_password'] = $password;
        header('location: account.php?message=New password has been updated successfully');
      }
      else {
        header('location: account.php?error=Could not update new password');
      }
    }
  }

  //get orders
  if(isset($_SESSION['logged_in'])) {

    if(isset($_POST['pod_btn']) || isset($_POST['credit_btn'])) {

      if (isset($_POST['pod_btn'])) {
        $stmt_status = $conn->prepare("UPDATE orders SET order_status='shipped and pod' WHERE order_id=?");
      }
      else {
        $stmt_status = $conn->prepare("UPDATE orders SET order_status='paid and delivered' WHERE order_id=?");
      }

      $order_id = $_POST['order_id'];
      $stmt_status->bind_param('s', $order_id);
      $stmt_status->execute();
    }

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
    <div class="topnav" id="account_bar">
        <?php include('navbar.php'); ?>
    </div>
    
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
              <label>Current Password</label>
              <input
                type="password"
                class="form-control"
                id="current-account-password"
                name="currentpassword"
                placeholder="Password"
                required
              />
            </div>
            <div class="form-group">
              <label>New Password</label>
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
              <label>Confirm New Password</label>
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
          <h2 class="font-weight-bold text-center">Your Orders</h2>
          <hr class="mx-auto">
        </div>
        <div class="row justify-content-center">
        
          <table class="mt-5 pt-5">

            <tr>
              <th>Order ID</th>
              <th>Order Cost</th>
              <th>Order Status</th>
              <th>Order Date</th>
              <th>Order Details</th>
            </tr>

            <?php while($row = $orders->fetch_assoc()) { ?>
                  <tr>
                    <td>
                        <span><?php echo $row['order_id'];?></span>
                    </td>
        
                    <td>
                      <span><?php echo $row['order_cost'];?></span>
                    </td>

                    <td>
                      <span><?php echo $row['order_status'];?></span>
                    </td>

                    <td>
                      <span><?php echo $row['order_date'];?></span>
                    </td>

                    <td>
                      <form method="POST" action="order_details.php">
                        <input type="hidden" value="<?php echo $row['order_status'];?>" name="order_status"/>
                        <input type="hidden" value="<?php echo $row['order_id'];?>" name="order_id"/>
                        <input class="btn order-details-btn" name="order_details_btn" type="submit" value="details"/>
                      </form>
                  </tr>
            <?php } ?>


          </table>
          
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
