<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title> Smartwatches </title>

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
                      <li><a class="dropdown-item" href="smartphones.php">Smartphones</a></li>
                      <li><a class="dropdown-item" href="handsfree.php">Handsfree</a></li>
                      <li><a class="dropdown-item" href="tablets.php">Tablets</a></li>
                      <li><a class="dropdown-item" href="#">Smartwatches</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>

                  <li class="nav-item">
                    <a class="nav-link" href="about-us.html">About Us</a>
                  </li>

                </ul>

                <a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a> 
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

        <!--    END OF NAVBAR   -->




 <!--Smartwatches-->
 <section id="smartwatches" class="my-5 pb-5">
    

    <div class="container text-center mt-5 py-5">
        <h3>Our Smartwatches</h3>
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
        while(($row= $smartwatches->fetch_assoc())) { 
        ?>


            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                
                <!-- test code for button img
                <button class="img-btn" type="submit" name="product_id" value="<?php echo $row['product_id']; ?>" width=100% height=100%> 
                    <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>" alt="buttonpng" border="0" width=100% height=100%/>
                </button>
                <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/>
                -->

                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/></a> <!--OK!-->
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
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Apple Watch SE Midnight Aluminium GPS 44mm - Midnight Sports Band SmallMedium/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple Watch SE Midnight Aluminium GPS 44mm - Midnight Sports Band SmallMedium</h5>
        <h4 class="p-price">€319.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Apple Watch Ultra 2 Titanium 49mm GPS + Cellular - Blue Alpine Loop - Medium/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple Watch Ultra 2 Titanium 49mm GPS + Cellular - Blue Alpine Loop - Medium</h5>
        <h4 class="p-price">€908.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Apple Watch Ultra 2 Titanium 49mm GPS + Cellular - Orange Ocean Band/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple Watch Ultra 2 Titanium 49mm GPS + Cellular - Orange Ocean Band</h5>
        <h4 class="p-price">€908.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Apple Watch Ultra 2 Titanium 49mm GPS + Cellular - OrangeBeige Trail Loop - SM/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple Watch Ultra 2 Titanium 49mm GPS + Cellular - OrangeBeige Trail Loop - SM</h5>
        <h4 class="p-price">€908.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Samsung Galaxy Watch6 Classic LTE Smartwatch 43mm - Black/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Watch6 Classic LTE Smartwatch 43mm - Black</h5>
        <h4 class="p-price">€470.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Samsung Galaxy Watch6 Classic LTE Smartwatch 43mm - Silver/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Watch6 Classic LTE Smartwatch 43mm - Silver</h5>
        <h4 class="p-price">€470.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Garmin Epix Gen 2 47mm - Titanium Carbon Gray/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Garmin Epix Gen 2 47mm - Titanium Carbon Gray</h5>
        <h4 class="p-price">€779.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Garmin epix Pro Gen 2 Sapphire Edition 51mm - Carbon Gray DLC Titanium/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Garmin epix Pro Gen 2 Sapphire Edition 51mm - Carbon Gray DLC Titanium</h5>
        <h4 class="p-price">€999.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Garmin Fenix 7X Pro Solar Edition 51mm - Slate Gray/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Garmin Fenix 7X Pro Solar Edition 51mm - Slate Gray</h5>
        <h4 class="p-price">€829.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Garmin Instinct 2X Solar 50mm - Moss/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Garmin Instinct 2X Solar 50mm - Moss</h5>
        <h4 class="p-price">€450.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Garmin Venu 3 41mm - Soft Gold with Dust Rose/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Garmin Venu 3 41mm - Soft Gold with Dust Rose</h5>
        <h4 class="p-price">€499.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Huawei Watch GT 4 41mm - Steel/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Huawei Watch GT 4 41mm - Steel</h5>
        <h4 class="p-price">€398.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Huawei Watch Ultimate 48mm - Expedition Black/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Huawei Watch Ultimate 48mm - Expedition Black</h5>
        <h4 class="p-price">€798.99</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Huawei Watch Ultimate 48mm - Voyage Blue/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Huawei Watch Ultimate 48mm - Voyage Blue</h5>
        <h4 class="p-price">€899.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Huawei Watch Ultimate Design 49mm - Gold/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Huawei Watch Ultimate Design 49mm - Gold</h5>
        <h4 class="p-price">€2999.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Suunto 9 Peak 43mm - All Black Titanium/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Suunto 9 Peak 43mm - All Black Titanium</h5>
        <h4 class="p-price">€499.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Suunto 9 Peak Pro 43mm - Ocean Blue/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Suunto 9 Peak Pro 43mm - Ocean Blue</h5>
        <h4 class="p-price">€499.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/smartwatches/Smartwatch Suunto Vertical 49mm - Titanium Solar Black/1.png"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Smartwatch Suunto Vertical 49mm - Titanium Solar Black</h5>
        <h4 class="p-price">€799.00</h4>
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