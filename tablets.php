<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewpoint" content="width=device-width, initial-scale=1.0">
        <title> Tablets </title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
        <link rel="stylesheet" href="assets/css/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>

        <!--Navbar-->
        <?php include('navbar.php'); ?>

          <br><br><br>

          <!--Tablets-->
 <section id="tablets" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Tablets</h3>
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
        while(($row= $tablets->fetch_assoc())) { 
        ?>
  
  
            <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>"><img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/></a>
                <!--<img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/>-->
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
          <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Apple iPad Pro 2022 11 με WiFi (16GB1TB) Space Gray/1.jpeg"/>
          <div class="star">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">Apple iPad Pro 2022 11 με WiFi (16GB1TB) Space Gray</h5>
          <h4 class="p-price">€1899.32</h4>
          <button class="buy-btn">Buy Now</button>
      </div>

      <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Apple iPad Pro 2021 12.9 με WiFi & 5G (16GB2TB) Space Grey/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple iPad Pro 2021 12.9 με WiFi & 5G (16GB2TB) Space Grey</h5>
        <h4 class="p-price">€2250.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Apple iPad Pro 2022 12.9 με WiFi (16GB1TB) Silver/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple iPad Pro 2022 12.9 με WiFi (16GB1TB) Silver</h5>
        <h4 class="p-price">€2604.80</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Lenovo Tab P11 Pro With Keyboard Pack And Precision Pen 2 (ZA7D0067IT) 11.5 με WiFi & 4G (6GB128GB) Slate Grey/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Lenovo Tab P11 Pro With Keyboard Pack And Precision Pen 2 (ZA7D0067IT) 11.5 με WiFi & 4G (6GB128GB) Slate Grey</h5>
        <h4 class="p-price">€533.90</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Lenovo Tab P11 Pro (2nd Gen) 11.2 με WiFi (8GB256GBLenovo Precision Pen 3 & Keyboard Pack ) Storm Grey/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Lenovo Tab P11 Pro (2nd Gen) 11.2 με WiFi (8GB256GBLenovo Precision Pen 3 & Keyboard Pack ) Storm Grey</h5>
        <h4 class="p-price">€663.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Microsoft Surface Pro 7 12.3 Tablet με WiFi (8GB128GB) Platinum/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Microsoft Surface Pro 7 12.3 Tablet με WiFi (8GB128GB) Platinum</h5>
        <h4 class="p-price">€699.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Lenovo Yoga Tab 13 13 με WiFi (8GB128GB) Shadow Black/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Lenovo Yoga Tab 13 13 με WiFi (8GB128GB) Shadow Black</h5>
        <h4 class="p-price">€679.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Xoro MegaPAD 2154 V4 21.5 Tablet με WiFi (2GB16GB)/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Xoro MegaPAD 2154 V4 21.5 Tablet με WiFi (2GB16GB)</h5>
        <h4 class="p-price">€850.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Lenovo Tab P12 Pro 12.6 με WiFi (8GB256GBwith Keyboard & Pen) Storm Grey/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Lenovo Tab P12 Pro 12.6 με WiFi (8GB256GBwith Keyboard & Pen) Storm Grey</h5>
        <h4 class="p-price">€949.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Samsung Galaxy Tab S8+ 12.4 με WiFi & 5G (8GB256GB) Pink Gold/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Tab S8+ 12.4 με WiFi & 5G (8GB256GB) Pink Gold</h5>
        <h4 class="p-price">€1168.40</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Samsung Galaxy Tab S7+ 12.4 με WiFi (6GB128GB) Mystic Silver/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Tab S7+ 12.4 με WiFi (6GB128GB) Mystic Silver</h5>
        <h4 class="p-price">€1165.10</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Samsung Galaxy Tab S8 Ultra 14.6 με WiFi (8GB256GB) Graphite/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Tab S8 Ultra 14.6 με WiFi (8GB256GB) Graphite</h5>
        <h4 class="p-price">€1230.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Samsung Galaxy Tab S8+ Enterprise Edition 12.4 με WiFi & 5G (8GB128GB) Graphite/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Tab S8+ Enterprise Edition 12.4 με WiFi & 5G (8GB128GB) Graphite</h5>
        <h4 class="p-price">€1292.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Samsung Galaxy Tab S9 Ultra 14.6 με WiFi & 5G (12GB512GB) Beige/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Tab S9 Ultra 14.6 με WiFi & 5G (12GB512GB) Beige</h5>
        <h4 class="p-price">€1430.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Samsung Galaxy Tab S8+ 12.4 με WiFi & 5G (8GB128GB) Pink Gold/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Samsung Galaxy Tab S8+ 12.4 με WiFi & 5G (8GB128GB) Pink Gold</h5>
        <h4 class="p-price">€1431.84</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Microsoft Surface Pro 9 13 Tablet με WiFi (16GB512GB) Graphite/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Microsoft Surface Pro 9 13 Tablet με WiFi (16GB512GB) Graphite</h5>
        <h4 class="p-price">€2398.00</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Apple iPad Pro 2021 11 με WiFi & 5G (16GB2TB) Space Grey/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Apple iPad Pro 2021 11 με WiFi & 5G (16GB2TB) Space Grey</h5>
        <h4 class="p-price">€2604.50</h4>
        <button class="buy-btn">Buy Now</button>
    </div>

    <div class="product text-center col-lg-3 col-md-4 col-sm-12">
        <img class="img-fluid mb-3" src="assets/imgs/products/tablets/Asus Zenbook 17 Fold 17.3 Tablet με WiFi (16GB1TB) Tech Black/1.jpeg"/>
        <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
        </div>
        <h5 class="p-name">Asus Zenbook 17 Fold 17.3 Tablet με WiFi (16GB1TB) Tech Black</h5>
        <h4 class="p-price">€3743.99</h4>
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