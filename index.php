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

        <!-- Show Navbar -->
        <div class="topnav" id="index_bar">
            <?php include('navbar.php'); ?>
        </div>

        <!-- All Products Button -->
        <section id="home">
        <div class="container-arrivals">

            <h5>NEW ARRIVALS</h5>
            <h1><span>Best Prices</span>This Season</h1>
            <p>Eshop offers the best products for the most affordable prices</p>

            <form action="products.php" method="GET">
                <button class="buy-btn" type="submit" name="products_page" value="1">Shop Now</button>
            </form>   

        </div>
        </section>
        <br>

        <!-- Mobile Brand Buttons-->
        <section id="brand" class="container-first-page-brands w-100">
        <div class="row">
            <form action="products.php" method="GET">
                <input type="hidden" name="products_page" value="1"/>
                <button class="brand-btn" style="background-image: url('assets/imgs/brand1.png');" type="submit" name="search" value="Apple"></button>
                <button class="brand-btn" style="background-image: url('assets/imgs/brand2.png');" type="submit" name="search" value="Huawei"></button>
                <button class="brand-btn" style="background-image: url('assets/imgs/brand33.png');" type="submit" name="search" value="Samsung"></button>
                <button class="brand-btn" style="background-image: url('assets/imgs/brand44.jpeg');" type="submit" name="search" value="Xiaomi"></button>
            </form>  
        </div>
        </section>
        <br><br>

        <!-- New Products Buttons -->
        <section id="new" class="w-100">
        <div class="row p-0 m-0">

            <!--One-->
            <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
                <img class="img-fluid" src="assets/imgs/001.png"/>
            <div class="details">
                <h2>New iPhones</h2>
                <form action="smartphones.php" method="GET">
                    <input type="hidden" name="search" value="Apple iPhone 15"/>
                    <button class="buy-btn" type="submit" name="smartphones_page" value="1">SHOP NOW</button>
                </form>   
            </div>
        </div>
        
        <!--Two-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0"> 
            <img class="img-fluid" src="assets/imgs/002.jpeg"/>
            <div class="details">
                <h2>Airpods</h2>
                <form action="handsfree.php" method="GET">
                    <input type="hidden" name="search" value="Apple AirPods"/>
                    <button class="buy-btn" type="submit" name="handsfree_page" value="1">SHOP NOW</button>
                </form>   
            </div>
        </div>
            
        <!--Three-->
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img class="img-fluid" src="assets/imgs/03.jpeg"/>
            <div class="details">
                <!-- <h2>50% OFF Smart Watches</h2> -->
                <h2>Smartwatches</h2>
                <form action="smartwatches.php" method="GET">
                    <button class="buy-btn" type="submit" name="smartwatches_page" value="1">SHOP NOW</button>
                </form>   
            </div>
        </div>  
        </div>
        </section>

        <!-- Featured Products -->
        <section id="featured" class="my-5 pb-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Featured Products</h3>
            <hr class="mx-auto">
            <p>Here you can check out our featured products</p>
        </div>
        <div class="row mx-auto container-fluid">

            <!-- Call a statement to find 4 featured products -->
            <?php include('server/get_featured_products.php'); ?>

            <?php while($row= $featured_products->fetch_assoc()) { ?>

                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/></a>
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                    <h4 class="p-price"><?php echo $row['product_price']; ?>€</h4>
                    <form action="single_product.php" method="GET">
                        <button class="buy-btn" type="submit" name="product_id" value="<?php echo $row['product_id']; ?>">Buy Now</button>
                    </form>        
                </div>
                

            <?php } ?>
        </div>
    </section>
        <hr style="width:95%;text-align:center;margin-left:35px">

        <!-- Show 4 Offers -->
        <section id="offers" class="my-5">
        <div class="container text-center mt-5 py-5">
            <h3>Our Offers</h3>
            <hr class="mx-auto">
            <p>Here you can check out our offers</p>
        </div>
        <div class="row mx-auto container-fluid">

            <!-- Call a statement to find 4 offers -->
            <?php include('server/get_offered_products.php'); ?>
            <?php
                $count = 0;
            
                while(($row= $offered_products->fetch_assoc()) && $count < 4) { 
                    $count++;
                    ?>

                    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                        <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/></a>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                        <p><del>€<?php echo $row['product_price']; ?></del></p>
                        <h4 class="p-price">€<?php echo number_format($row['product_price'] * 70 / 100, 2); ?></h4>
                        <form action="single_product.php" method="get">
                            <button class="buy-btn" type="submit" name="product_id" value="<?php echo $row['product_id']; ?>">Buy Now</button>
                        </form>  
                    </div>

            <?php } ?>

        </div>
        </section>

        <!-- Show Footer -->
        <?php include('footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>