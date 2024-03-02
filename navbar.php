<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title>Navbar</title>
        <link rel="stylesheet" href="assets/css/style.css"/>
    </head>

<!-- Navbar HTML Code-->
  <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
            <div class="container">

              <a href="index.php"><img src="assets/imgs/logo1.png" width="100px" height="100px"></a>

              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <!-- It builds the navigation bar -->
              <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">

                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" id="index" href="index.php">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="offers" href="offers.php?offers_page=1">Offers</a>
                  </li>

                  <!-- Dropdown menu -->
                  <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" id="products" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Products</a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" id="smartphones" href="smartphones.php?smartphones_page=1">Smartphones</a></li>
                      <li><a class="dropdown-item" id="handsfree" href="handsfree.php?handsfree_page=1">Handsfree</a></li>
                      <li><a class="dropdown-item" id="tablets" href="tablets.php?tablets_page=1">Tablets</a></li>
                      <li><a class="dropdown-item" id="smartwatches" href="smartwatches.php?smartwatches_page=1">Smartwatches</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" id="allproducts" href="products.php?products_page=1">All Products</a></li> 
                    </ul>

                  </li>

                  <li class="nav-item">
                    <a class="nav-link" id="aboutus" href="about-us.php">About Us</a>
                  </li>

                </ul>

                <a class="nav-link" id="cart" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
                <a class="nav-link" id="account" href="login.php"><i class="fas fa-user"></i></a> 
              </div>
            </div>
          </nav>
    </body>
</html>


<!-- A script that shows which navigation button is active by setting dark red color -->
<script type="text/javascript">

      const elem = document.getElementsByClassName("topnav");
      const topnav_id = elem[0].id;
      const menu_id = topnav_id.substring(0, topnav_id.indexOf("_"));
      const link_id = document.getElementById(menu_id);
      var link_prod;

      if (menu_id=="smartphones" || menu_id=="handsfree" || menu_id=="tablets" || menu_id=="smartwatches" || menu_id=="products") {
        link_id.className = "dropdown-item active";
        link_prod = document.getElementById("products");
        link_prod.className = "nav-link dropdown-toggle active";
        link_prod.style.color = "#8A0D0D";
      }
      else {
        link_id.className = "nav-link active";
      }

      link_id.href = "#";
      link_id.style.color = "#8A0D0D";

</script>
