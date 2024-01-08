<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title> Home </title>

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
              <img src="assets/imgs/logo1.png" width="100px" height="100px">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="offers.html">Offers</a>
                  </li>

                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Products
                    </a>

                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="smartphones.html">Smartphones</a></li>
                      <li><a class="dropdown-item" href="handsfree.html">Handsfree</a></li>
                      <li><a class="dropdown-item" href="tablets.html">Tablets</a></li>
                      <li><a class="dropdown-item" href="smartwatches.html">Smartwatch</a></li>
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

          <!--Home-->
          <section id="home">
            <div class="container">
                <h5>NEW ARRIVALS</h5>
                <h1><span>Best Prices</span>This Season</h1>
                <p>Eshop offers the best products for the most affordable prices</p>
                <button>Shop Now</button>
            </div>
          </section>
          <br>

          <!--Brand-->
          <section id="brand" class="container">
            <div class="row m-0">
                <img class="img-fluid col-lg-3 col-md-6 col-sm12" src="assets/imgs/brand111.jpeg" />
                <img class="img-fluid col-lg-3 col-md-6 col-sm12" src="assets/imgs/brand2.jpg"  />
                <img class="img-fluid col-lg-3 col-md-6 col-sm12" src="assets/imgs/brand33.jpeg"  />
                <img class="img-fluid col-lg-3 col-md-6 col-sm12" src="assets/imgs/brand44.jpeg"  />
            </div>
          </section>
          <br><br>

          <!--New-->
          <section id="new" class="w-100">
            <div class="row p-0 m-0">
                <!--One-->
                <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                    <img class="img-fluid" src="assets/imgs/001.png"/>
                <div class="details">
                    <h2>New iPhons</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
            
            <!--Two-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0"> 
                <img class="img-fluid" src="assets/imgs/002.jpeg"/>
                <div class="details">
                    <h2>Airpods</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>
               
            <!--Three-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/03.jpeg"/>
                <div class="details">
                    <h2>50% OFF Smart Watches</h2>
                    <button class="text-uppercase">Shop Now</button>
                </div>
            </div>  
            </div>
          </section>

          <!--Featured-->
          <section id="featured" class="my-5 pb-5">
            <div class="container text-center mt-5 py-5">
                <h3>Our Featured</h3>
                <hr class="mx-auto">
                <p>Here you can check out our featured products</p>
            </div>
            <div class="row mx-auto container-fluid">

            <?php include('server/get_featured_products.php'); ?>


            <?php while($row= $featured_products->fetch_assoc()) { ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price">€ <?php echo $row['product_price']; ?></h4>
                    <button class="buy-btn">Buy Now</button>
                    
                </div>
                
                <?php } ?>
            </div>
          </section>

          <!--Banner-->
          <section id="banner" class="my-5 py-5">
            <div class="container">
                <br><br><br>
                <h4>SANTA TIME!</h4>
                <h1>Christmas offers <br> Up to 30% OFF</h1>
                <button class="text-uppercase">shop now</button>
            </div>
          </section>

          <!--Offers-->
          <section id="offers" class="my-5">
            <div class="container text-center mt-5 py-5">
                <h3>Offers for Christmas Gifts</h3>
                <hr class="mx-auto">
                <p>Check here the gifts for your beloveds</p>
            </div>
            <div class="row mx-auto container-fluid">

            

            <?php include('server/get_offered_products.php'); ?>

            <?php
            $count = 0;
            
            while(($row= $offered_products->fetch_assoc()) && $count < 4) { 
                $count++;
                ?>


                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <p><del>€<?php echo $row['product_price']; ?></del></p>
                    <h4 class="p-price">€<?php echo $row['product_price']*70/100; ?></h4>
                    <button class="buy-btn">Buy Now</button>
                    
                </div>

                <?php } ?>

            </div>
          </section>

          <!--Footer-->
          <!--<footer class="mt-5 py-5">
            <div class="row container mx-auto pt-5">
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <img class="logo" src="assets/imgs/logo.jpg" width="90px" height="90px"/>
                    <p class="pt-3">We provide the best poducts for the most affordable prices</p>
                </div>
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Feautured</h5>
                    <ul class="text-uppercase">
                        <li><a href="#">Smartphones</a></li>
                        <li><a href="#">Airpods</a></li>
                        <li><a href="#">Smart Watches</a></li>
                        <li><a href="#">New arrivals</a></li>
                        <li><a href="#">Offers</a></li>
                    </ul>
                </div>

                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Contact Us</h5>
                    <div>
                        <h6 class="text-uppercase">Address</h6> 
                        <p>Αγίου Σπυρίδωνος, Αιγάλεω 12243</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">Phone</h6>
                        <p>+30 210 5385100</p>
                    </div>
                    <div>
                        <h6 class="text-uppercase">Email</h6>
                        <p>msc-acs@uniwa.gr</p>
                    </div>
                </div>
                <div class="footer-one col-lg-3 col-md-6 col-sm-12">
                    <h5 class="pb-2">Instagram</h5>
                    <div class="row">
                        <img src="assets/amgs/" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/amgs/" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/amgs/" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/amgs/" class="img-fluid w-25 h-100 m-2"/>
                        <img src="assets/amgs/" class="img-fluid w-25 h-100 m-2"/>
                    </div>
                </div>
            </div>

            <div class="copyright mt-5">
                <div class="row container mx-auto">
                    <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                        <img src="assets/imgs/"/>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-12 mb-4 text-nowrap mb-2">
                        <p>eCommerce @ 2025 All Right Reserved</p>
                    </div>
                    <div class="col-lg-3 col-md-5 col-sm-12 mb-4">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
          </footer>-->

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
                        <li><a href="#">Home</a></li>
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