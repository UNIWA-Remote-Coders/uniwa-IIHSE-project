<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title> Smartphones </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="assets/css/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

         <!--Navbar-->
         <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
            <div class="container">
              <img src="assets/imgs/logo1.png" width="90px" height="90px">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="offers.html">Offers</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Products
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="#">Smartphones</a></li>
                      <li><a class="dropdown-item" href="handsfree.php">Handsfree</a></li>
                      <li><a class="dropdown-item" href="tablets.php">Tablets</a></li>
                      <li><a class="dropdown-item" href="smartwatches.php">Smartwatches</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="about-us.html">About Us</a>
                  </li>

                </ul>

                <a class="nav-link" href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
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

          <br><br><br>

 <!--Smartphones-->
 <section id="smartphones" class="my-5 pb-5">
  <div class="container text-center mt-5 py-5">
      <h3>Our Smartphones</h3>
      <hr class="mx-auto">
      <p>Here you can check out our featured products</p>
  </div>
  
  <div>

    <!--bar gia allagh selidas -->
    <nav area-lable="page navigation example">
      <ul class="pagination mt-5">
          <li class="page-item"><a class="page-link" href="#">Previous</a></li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">Next</a></li>
      </ul>
    </nav>
  
  </div>

  <br> <br>

  <?php include('server/get_products.php'); ?>
    
  <div class="row mx-auto container-fluid">

      <?php
      while(($row= $smartphones->fetch_assoc())) { 
      ?>


          <div class="product text-center col-lg-3 col-md-4 col-sm-12">
              <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/>
              <div class="star">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
              </div>
              <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
              <h4 class="p-price"><?php echo $row['product_price']; ?></h4>
              <form action="single_product.php" method="get">
                <button class="buy-btn" type="submit" name="product_id" value="<?php echo $row['product_id']; ?>">Buy Now</button>
              </form>   
          </div>
      <?php 
      } 
      ?>
  </div>

<!--
  <div class="row mx-auto container-fluid">
    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/featured/Apple iPhone 15 Pro Max 5G (8GB1TB) Blue Titanium/featured1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple iPhone 15 Pro Max 1TB - Blue Titanium</h5>
        <h4 class="p-price">€2018.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/featured/Samsung Galaxy Z Fold5 5G Dual SIM (12GB1TB) Phantom Black/featured2.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Z Fold5 5G Smartphone 1TB - Phantom Black</h5>
        <h4 class="p-price">€2339.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/featured/Xiaomi 13 5G Dual SIM (8GB256GB)/featured3.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Xiaomi 13 5G 256GB Dual Sim - Black</h5>
        <h4 class="p-price">€999.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/featured/Huawei Mate X3 Dual SIM (12GB512GB) Dark Green/featured4.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Huawei Mate X3 512GB Dual Sim - Dark Green</h5>
        <h4 class="p-price">€2199.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <a class="nav-link" href="single_product.html"><img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Apple iPhone 12 5G 128GB - Black/1.png"/></i></a>
      <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Apple iPhone 12 5G 128GB - Black</h5>
      <h4 class="p-price">€619.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Samsung Galaxy Z Flip5 5G Smartphone 512GB - Mint/1.png"/>
      <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Samsung Galaxy Z Flip5 5G Smartphone 512GB - Mint</h5>
      <h4 class="p-price">€1369.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Apple iPhone 14 Plus 128GB - Yellow/1.png"/>
      <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Apple iPhone 14 Plus 128GB - Yellow</h5>
      <h4 class="p-price">€929.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Smartphone Motorola Moto G23 128GB Dual Sim - Matte Charcoal/1.png"/>
      <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Motorola Moto G23 128GB Dual Sim - Matte Charcoal</h5>
      <h4 class="p-price">€169.90</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Smartphone Huawei P60 Pro 256GB Dual Sim - Rococo Pearl/1.png"/>
      <div class="star">
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
          <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Huawei P60 Pro 256GB Dual Sim - Rococo Pearl</h5>
      <h4 class="p-price">€999.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Apple iPhone 15 Plus 512GB - Black/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Apple iPhone 15 Plus 512GB - Black</h5>
      <h4 class="p-price">€1528.99</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Apple iPhone 15 512GB - Pink/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Apple iPhone 15 512GB - Pink</h5>
      <h4 class="p-price">€1369.00</h4>
      <button class="buy-btn">Buy Now</button> 
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/!Smartphone Xiaomi 13T Pro 5G 512GB Dual Sim - Black/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Xiaomi 13T Pro 5G 512GB Dual Sim - Black</h5>
      <h4 class="p-price">€899.99</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Motorola G14 128GB Dual Sim - Butter Cream/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Motorola G14 128GB Dual Sim - Butter Cream</h5>
      <h4 class="p-price">€129.90</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Nokia C22 64GB Dual Sim - Sand/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Nokia C22 64GB Dual Sim - Sand</h5>
      <h4 class="p-price">€89.90</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone OnePlus Nord CE 3 Lite 5G 128GB - Pastel Lime/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone OnePlus Nord CE 3 Lite 5G 128GB - Pastel Lime</h5>
      <h4 class="p-price">€299.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Oppo Reno10 Pro 5G 256GB Dual Sim - Silvery Grey/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Oppo Reno10 Pro 5G 256GB Dual Sim - Silvery Grey</h5>
      <h4 class="p-price">€700.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Poco X5 5G 128GB - Green/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Poco X5 5G 128GB - Green</h5>
      <h4 class="p-price">€249.98</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Poco X5 Pro 5G 256GB - Black/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Poco X5 Pro 5G 256GB - Black</h5>
      <h4 class="p-price">€369.90</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Samsung Galaxy S23 Ultra 1ΤΒ - Phantom Black/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Samsung Galaxy S23 Ultra 1ΤΒ - Phantom Black</h5>
      <h4 class="p-price">€1869.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Samsung Galaxy S23+ 256GB - Cream/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Samsung Galaxy S23+ 256GB - Cream</h5>
      <h4 class="p-price">€1249.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Samsung Galaxy S23+ 512GB - Phantom Black/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Samsung Galaxy S23+ 512GB - Phantom Black</h5>
      <h4 class="p-price">€1369.00</h4>
      <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
      <img class="img-fluid mb-3" src="assets/imgs/products/smartphones/Smartphone Xiaomi 13 5G 256GB Dual Sim - Black/1.png"/>
      <div class="star">
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
        <i class="fas fa-star"></i>
      </div>
      <h5 class="p-name">Smartphone Xiaomi 13 5G 256GB Dual Sim - Black</h5>
      <h4 class="p-price">€999.99</h4>
      <button class="buy-btn">Buy Now</button>
    </div>
 </div>
-->

  <div>

      <!--bar gia allagh selidas -->
      <nav area-lable="page navigation example">
        <ul class="pagination mt-5">
            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">Next</a></li>
        </ul>
      </nav>
      
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






        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>