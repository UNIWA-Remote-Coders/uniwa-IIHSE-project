<?php

  include ('./server/connection.php');    // connect to db

  if (isset($_GET['product_id'])) {       

      // get the product id from url and find the single product
      $product_id = $_GET['product_id'];

      $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
      $stmt->bind_param("i", $product_id);
      $stmt->execute();
      $product = $stmt->get_result();



      // find if this single product has an offer price
      $stmt->execute();
      $p = $stmt->get_result();

      // save product price if has an offer and product category
      foreach($p as $row) {   
        if (isset($_GET['offer'])) {
          $price = $row['product_price'] * floatval($_GET['offer']);
        }
        else {
          $price = $row['product_price'];
        }

        $product_category = $row['product_category'];
      }


      // set an array with 4 categories
      $category = array("Smartphone", "Smartwatch", "Handsfree", "Tablet");
      $smtm_rel = array();
      $related_products = array();

      $num = 0;

      // find 4 related products with different categories from single product
      for ($i = 0; $i < 4; $i++) {
        if ($category[$i]==$product_category) {
          continue;
        }
        
        if ($num == 2) {
          $smtm_rel[$num] = $conn->prepare("SELECT * FROM products WHERE product_category = ? LIMIT 2");
          $smtm_rel[$num]->bind_param("s", $category[$i]);
          $smtm_rel[$num]->execute();
          $related_products[$num] = $smtm_rel[$num]->get_result();
          $num++;
          break;
        }

        $smtm_rel[$num] = $conn->prepare("SELECT * FROM products WHERE product_category = ? LIMIT 1");
        $smtm_rel[$num]->bind_param("s", $category[$i]);
        $smtm_rel[$num]->execute();
        $related_products[$num] = $smtm_rel[$num]->get_result();
        $num++;
      }

  }
  else { //no product id return to home page
    header('location: index.php');
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
    <title>Single Product</title>

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
    <div class="topnav" id="products_bar">
        <?php include('navbar.php'); ?>
    </div>
    <br><br><br><br>

    <!--Show Single Product with the chosen id from previous page-->
    <section class="container single-product my-5 pt-5">

      <?php while($row = $product->fetch_assoc()){ ?>

        <div class="row mt-5">

          <div class="col-lg-5 col-md-6 col-sm-12">
            <img
              class="img-fluid  pb-1"
              src="<?php echo $row['product_image']; ?>"
              width="80%"
              height="80%"
              id="mainImg"
            />
            <div class="small-img-group">
              <div class="small-img-col">
                <img
                  src="<?php echo $row['product_image']; ?>"
                  width="100%"
                  height="100%"
                  class="small-img"
                />
              </div> 
              <div class="small-img-col">
                <img
                  src="<?php echo $row['product_image2']; ?>"
                  width="100%"
                  height="100%"
                  class="small-img"
                />
              </div>
              <div class="small-img-col">
                <img
                  src="<?php echo $row['product_image3']; ?>"
                  width="100%"
                  height="100%"
                  class="small-img"
                />
              </div>
              <div class="small-img-col">
                <img
                  src="<?php echo $row['product_image4']; ?>"
                  width="100%"
                  height="100%"
                  class="small-img"
                />
              </div>
            </div>
          </div>

          <!-- Show Add to Cart Button and set a POST method which redirect to Cart page in order to save features from products -->
          <div class="col-lg-6 col-md-12 col-sm-12">
            
            <h3><?php echo $row['product_name']; ?></h3>
            <h2><?php echo number_format($price, 2); ?>€</h2>

            <form method="POST" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
              <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
              <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
              <input type="hidden" name="product_price" value="<?php echo $price; ?>"/>
              <input type="number" name="product_quantity" value="1" min="1" onkeydown="return event.keyCode !== 8 && event.keyCode !== 46;" />
              <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>

            <h6><?php echo $row['product_description']; ?></h6>    
          </div>
        
        </div>
      <?php } ?>

    </section>

    <!-- Show 4 related products with different categories from single product-->
    <section id="realeted-products" class="my-5 pb-5">

      <div class="container text-center mt-5 py-5">
        <h3>Realated Products</h3>
        <hr class="mx-auto" />
      </div>

      <div class="row mx-auto container-fluid">
        <?php for ($i = 0; $i < 3; $i++) {
              while($row = $related_products[$i]->fetch_assoc()){ ?>
                <div class="product text-center col-lg-3 col-md-4 col-sm-12">
                  <a href="single_product.php?product_id=<?php echo $row['product_id']; ?>">
                    <img class="img-fluid mb-3" src="<?php echo $row['product_image']; ?>"/>
                  </a>
                  <div class="star">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <h5 class="p-name"><?php echo $row['product_name']; ?></h5>
                  <h4 class="p-price"><?php echo number_format($row['product_price'], 2); ?>€</h4>

                  <!-- Redirect to single product page -->
                  <form action="single_product.php" method="get">
                    <button class="buy-btn" type="submit" name="product_id" value="<?php echo $row['product_id']; ?>">Buy Now</button>    
                  </form>

                </div>

          <?php }} ?>
      </div>
    </section>
    
    <!--Show Footer-->
    <?php include('footer.php'); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
                
    <!-- Resize all single products pictures in order to have the same dimensions on display area -->
    <script type="text/javascript">
      var mainImg = document.getElementById("mainImg");
      var mainHei = mainImg.height;
      var smallImg = document.getElementsByClassName("small-img");

      for (let i = 0; i < 4; i++) {
        smallImg[i].onclick = function () {
          mainImg.src = smallImg[i].src;
          mainImg.style.height = mainHei + "px";
        };
      }
    </script>
  </body>
</html>
