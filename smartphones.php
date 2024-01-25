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
        <?php include('navbar.php'); ?>
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
              <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
              <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/></a>
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
    <?php include('footer.php'); ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>