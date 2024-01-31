<?php

include ('./server/connection.php');

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $product = $stmt->get_result();//[]
    
    $stmt->execute();
    $p = $stmt->get_result();
    
    foreach($p as $row) {
      $product_category = $row['product_category'];
    }

    $category = array("Smartphone", "Smartwatch", "Handsfree", "Tablet");
    $smtm_rel = array();
    $related_products = array();

    $num = 0;

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

    // echo '<script>alert("Num: '.$num.'")</script>'; 


    // foreach($p as $row) {

    //   // $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category <> 'Smartphone' AND product_description LIKE '%'?'%' LIMIT 4");
    //   // $product_name = $row['product_name'];
    //   // $brand = substr($product_name, 0, strpos($product_name, " "));
    //   $stmt2 = $conn->prepare("SELECT * FROM products WHERE product_category <> ? LIMIT 4");

    //   $stmt2->bind_param("s", $row['product_category']);
    //   $stmt2->execute();
    //   $related_products = $stmt2->get_result(); 
    // }

}
else { //no product id
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
    
    <!--Navbar-->
    <div class="topnav" id="products_bar">
        <?php include('navbar.php'); ?>
    </div>
    <br><br><br><br>

    <!--Single Product-->
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

        <div class="col-lg-6 col-md-12 col-sm-12">
          
          <h3><?php echo $row['product_name']; ?></h3>
          <!-- <h3 class="py-4"><?php echo $row['product_description']; ?></h3> -->
          <h2><?php echo $row['product_price']; ?>€</h2>

            <form method="POST" action="cart.php">
              <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>"/>
              <input type="hidden" name="product_image" value="<?php echo $row['product_image']; ?>"/>
              <input type="hidden" name="product_name" value="<?php echo $row['product_name']; ?>"/>
              <input type="hidden" name="product_price" value="<?php echo $row['product_price']; ?>"/>
              <input type="number" name="product_quantity" value="1" />
              <button class="buy-btn" type="submit" name="add_to_cart">Add To Cart</button>
            </form>


            <h6><?php echo $row['product_description']; ?></h6>


          <!-- XREIAZOMASTE NA EISAGOUME DESCRIPTION GIA TA PROIONTA MAS STO DB -->
           <!-- <h4 class="mt-5 mb-5">Τεχνικά χαρακτηριστικά:</h4>
          <span
            >Η Apple παρουσιάζει τα iPhone 12 <ul> <li> προσφέροντας πρωτοποριακές
            καινοτομίες σε κάμερα και τσιπ με μεγάλη διάρκεια ζωής της
            μπαταρίας. Το νέο iPhone 12 έρχεται για να ξεπεράσει την προηγούμενη
            σειρά iPhone αλλά και τον ανταγωνισμό, με νέα αναβαθμισμένη OLED
            οθόνη, επεξεργαστή αλλά και με το ανανεωμένο διπλό σύστημα κάμερας.
            Στην Apple τα νούμερα παίζουν σημαντικό ρόλο στο να αναδείξουν την
            εξέλιξη της νέας συσκευής, για αυτό το νέο iPhone 12 είναι 11%
            λεπτότερο, 15% ελαφρύτερο και 16% μικρότερο από το iPhone 11. Η
            οθόνη των 6,1 ιντσών είναι OLED με τεχνολογία Super XDR, με ανάλυση
            2.532 × 1.170p, φτάνοντας τα 460ppi. Όπως και τα υπόλοιπα μοντέλα,
            το iPhone 12 φτάνει έως και τα 1.200 nits μέγιστη φωτεινότητα, για
            να βλέπεις εξαιρετικά σε συνθήκες με έντονο φωτισμό. Το νέο iPhone
            12 θα κυκλοφορήσει σε μαύρο, λευκό, μπλε, κόκκινο και πράσινο και αν
            αναζητάς την νέα «επαναστατική» καινοτομία, τότε το νέο iPhone 12
            είναι το επόμενο smartphone σου. Το iPhone σου επιτρέπει να έχεις
            πάντα τον έλεγχο των πληροφοριών σου. Για παράδειγμα, όταν
            περιηγείσαι στο διαδίκτυο, το Safari εμποδίζει με έξυπνο τρόπο την
            παρακολούθηση από ανιχνευτές και δείχνει όσους παρεμποδίστηκαν στην
            Αναφορά Απόρρητου. Και πολλά, πολλά ακόμη.</ul>
          </span>  -->
          

        </div>

        </form>
      
      </div>
      <?php } ?>
    </section>

    <!--Realated Products-->
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
                  <h4 class="p-price"><?php echo $row['product_price']; ?>€</h4>
                  <form action="single_product.php" method="get">
                    <button class="buy-btn" type="submit" name="product_id" value="<?php echo $row['product_id']; ?>">Buy Now</button>
                  </form>
                </div>

          <?php }} ?>
      </div>
    </section>




    <!-- Realated Products
    <section id="realeted-products" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>Realated Products</h3>
        <hr class="mx-auto" />
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img
            class="img-fluid mb-3"
            src="assets/imgs/products/realated products/Apple Watch SE 2022 Aluminium 40mm Waterproof with Heart Rate Monitor (Starlight with Starlight Sport Band)/1.jpeg"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">
            Apple Watch SE 2022 Aluminium 40mm Waterproof with Heart Rate
            Monitor (Starlight with Starlight Sport Band)
          </h5>
          <h4 class="p-price">€299.00</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img
            class="img-fluid mb-3"
            src="assets/imgs/products/realated products/Apple Airpods 3rd Generation In-ear Bluetooth Handsfree Headphone with Charging Case/22.jpeg"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">
            Apple Airpods 3rd Generation In-ear Bluetooth Handsfree Headphone
            with Charging Case
          </h5>
          <h4 class="p-price">€215.91</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img
            class="img-fluid mb-3"
            src="assets/imgs/products/realated products/Apple Watch Series 8 Aluminium 45mm Waterproof with Heart Rate Monitor (Silver with White Sport Band)/1.jpeg"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">
            Apple Watch Series 8 Aluminium 45mm Waterproof with Heart Rate
            Monitor (Silver with White Sport Band)
          </h5>
          <h4 class="p-price">€399.89</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
          <img
            class="img-fluid mb-3"
            src="assets/imgs/products/realated products/Apple AirPods Pro 2nd Generation In-ear Bluetooth Handsfree Headphone Sweat Resistant and Charging Case White/1.jpeg"
          />
          <div class="star">
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
          </div>
          <h5 class="p-name">
            Apple AirPods Pro 2nd Generation In-ear Bluetooth Handsfree
            Headphone Sweat Resistant and Charging Case White
          </h5>
          <h4 class="p-price">€251.99</h4>
          <button class="buy-btn">Buy Now</button>
        </div>
      </div>
    </section> -->


    
    <!--Footer-->
    <?php include('footer.php'); ?>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    
    <script>
      var mainImg = document.getElementById("mainImg");
      // var mainWid = mainImg.width;
      var mainHei = mainImg.height;
      // window.alert(mainHei);
      var smallImg = document.getElementsByClassName("small-img");

      for (let i = 0; i < 4; i++) {
        smallImg[i].onclick = function () {
          mainImg.src = smallImg[i].src;
          // window.alert(smallImg[i].height);
          // if (parseInt(smallImg[i].height) > parseInt(mainHei)) {
          //   window.alert(smallImg[i].height);
          //   mainHei = smallImg[i].height;
          // }
          mainImg.style.height = mainHei + "px";

          // mainImg.width = "100";
          // mainImg.height = "100";
          // mainImg.style.width = mainWid + "px";
          // mainImg.style.height = mainHei + "px";
          // mainImg.style.height = "100";
          // mainImg.height = mainHei.toString();
          // window.alert(mainImg.height);
        };
      }
    </script>
  </body>
</html>
