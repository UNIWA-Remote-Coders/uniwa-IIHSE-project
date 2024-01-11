<?php

include ('server/connection.php');

if (isset($_GET['product_id'])) {
    include('connection.php');

    $product_id = $_GET['product_id'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    
    
    $product = $stmt->get_result();//[]

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
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-3 fixed-top">
      <div class="container">
        <img src="assets/imgs/logo1.png" width="90px" height="90px" />
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="collapse navbar-collapse nav-buttons"
          id="navbarSupportedContent"
        >
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php"
                >Home</a
              >
            </li>

            <li class="nav-item">
              <a class="nav-link" href="offers.html">Offers</a>
            </li>

            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                Products
              </a>

              <ul class="dropdown-menu">
                <li>
                  <a class="dropdown-item" href="smartphones.php"
                    >Smartphones</a
                  >
                </li>
                <li>
                  <a class="dropdown-item" href="handsfree.php">Handsfree</a>
                </li>
                <li>
                  <a class="dropdown-item" href="tablets.php">Tablets</a>
                </li>
                <li>
                  <a class="dropdown-item" href="smartwatches.php"
                    >Smartwatches</a
                  >
                </li>
                <li><hr class="dropdown-divider" /></li>
                <li>
                  <a class="dropdown-item" href="#">Something else here</a>
                </li>
              </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about-us.html">About Us</a>
            </li>
          </ul>

          <a class="nav-link" href="cart.html"
            ><i class="fa fa-shopping-cart" aria-hidden="true"></i
          ></a>
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
    <br /><br /><br />

    <!--    END OF NAVBAR   -->


    <!--Single Product-->
    <section class="container single-product my-5 pt-5">
      <div class="row mt-5">
        <?php while($row = $product->fetch_assoc()){ ?>


        <div class="col-lg-5 col-md-6 col-sm-12">
          <img
            class="img-fluid w-100 pb-1"
            src="<?php echo $row['product_image']; ?>"
            width="50%"
            height="50%"
            id="mainImg"
          />
          <div class="small-img-group">
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
          <h6>Smartphones</h6>
          <h3 class="py-4"><?php echo $row['product_name']; ?></h3>
          <h2>$<?php echo $row['product_price']; ?></h2>
          <input type="number" value="1" />
          <button class="buy-btn">Add To Cart</button>
          <h4 class="mt-5 mb-5">Τεχνικά χαρακτηριστικά:</h4>
          <!-- XREIAZOMASTE NA EISAGOUME DESCRIPTION GIA TA PROIONTA MAS STO DB -->
          <span
            >Η Apple παρουσιάζει τα iPhone 12 προσφέροντας πρωτοποριακές
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
            Αναφορά Απόρρητου. Και πολλά, πολλά ακόμη.
          </span>

        </div>
        <?php } ?>
      </div>
    </section>

    <!--Realated Products-->
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
        <p>eCommerce @ 2024 All Right Reserved</p>
      </div>
    </footer>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <script>
      var mainImg = document.getElementById("mainImg");
      var smallImg = document.getElementsByClassName("small-img");

      for (let i = 0; i < 4; i++) {
        smallImg[i].onclick = function () {
          mainImg.src = smallImg[i].src;
        };
      }
    </script>
  </body>
</html>



          <!--<h4> Γενικά <h4>
                        <h6>Κατασκευαστής: APPLE</h6>
                        <h6>Περιγραφή προϊόντος: Apple iPhone 12 5G 128GB - Black</h6>
                        <h6>Σειρά: iPhone</h6>
                        <h6>Μοντέλο: iPhone 12</h6>
                        <h6>Έτος κυκλοφορίας: 2020</h6>
                        <h6>Λειτουργικό σύστημα: iOS 14</h6>
                        <h6>Χρώμα: Black</h6>
                        <h6>Υλικό (Backplate): Corning-made glass</h6>
                        <h6>Υλικό (Frame): Αλουμίνιο</h6>
                        <h6>Περιεχόμενα συσκευασίας: iPhone, Καλώδιο USB‑C σε Lightning, Έντυπα οδηγιών</h6>
                        
                        <h5>Οθόνη</h5>
                        <h6>Μέγεθος οθόνης: 6.1"</h6>
                        <h6> Ανάλυση οθόνης: Full HD+ (1170 x 2532)</h6>
                        <h6>Τύπος οθόνης: Super Retina XDR</h6>
                        <h6>Φωτεινότητα: 1200 nits</h6>
                        <h6>Screen to Body Ratio: 85% - 89.9%</h6>
                        
                        <h5>Επεξεργαστής και GPU</h5>
                        <h6>Μάρκα επεξεργαστή: Apple</h6>
                        <h6>Μοντέλο Επεξεργαστή: A14 Bionic</h6>
                        <h6>Αριθμός Πυρήνων Eπεξεργαστή: Εξαπύρηνος</h6>
                        <h6> Ταχύτητα Επεξεργαστή: 2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm</h6>
                        <h6> GPU: Apple GPU
                        
                        <h5>Αποθηκευτικός Χώρος και Μνήμη</h5>
                        <h6> Μνήμη RAM: 4 GB</h6>
                        <h6>Χωρητικότητα: 128 GB</h6>
                        <h6>Υποστήριξη εξωτερικής μνήμης: Δεν υποστηρίζεται</h6>
                        
                        <h5>Κάμερα</h5>
                        <h6>Φακοί κύριας κάμερας: Dual</h6>
                        <h6>Κάμερα: 12MP/12MP</h6>
                        <h6>Λεπτομέριες κύριας κάμερας: 12 MP, f/1.6, 26mm (wide) + 12 MP, f/2.4, 13mm, 120˚ (ultrawide),</h6>
                        <h6>Φάκοι Selfie κάμερας: Single</h6>
                        <h6>Selfie κάμερα: 12 MP f/2.2 23mm (wide)</h6>
                        <h6>Ανάλυση βίντεο: 4K@60fps</h6>
                        
                        <h5>Συνδεσιμότητα</h5>
                        <h6>Δίκτυο δεδομένων: 5G</h6>
                        <h6>Υποδοχές SIM: Single</h6>
                        <h6>Τύπος SIM: Nano-SIM, eSIM</h6>
                        <h6>Θύρα USB: Lightning</h6>
                        <h6>Υποστήριξη NFC: Διαθέτει</h6>
                        <h6>Έκδοση Bluetooth: 5.0</h6>
                        <h6>Ασύρματη επικοινωνία: 802.11 a/b/g/n/ac/6</h6>
                        <h6>Τοποθεσία: GPS, GLONASS, GALILEO, QZSS</h6>
                        
                        <h5>Δυνατότητες και Λειτουργίες</h5>
                        <h6>Δαχτυλικό αποτύπωμα: Δε διαθέτει</h6>
                        <h6>Υποστήριξη voice assistant: Siri</h6>
                        <h6>Αισθητήρες: Επιταχυνσιόμετρο, Γυροσκόπιο, Εγγύτητας, Πυξίδα, Βαρόμετρο, Υποστήριξη Ultra Wideband (UWB)</h6>
                        <h6>Ανθεκτικότητα: IP68 - Ανθεκτικό στη σκόνη/νερό (έως 6m για 30')</h6>
                        
                        <h5>Μπαταρία</h5>
                        <h6>Μπαταρία: 2815 mAh</h6>
                        <h6>Υποστήριξη γρήγορης φόρτισης: Υποστηρίζεται (50% σε 30')</h6>
                        <h6>Υποστήριξη ασύρματης φόρτισης: MagSafe (15W) // Qi (7.5W)</h6>
                        
                        <h5>Ήχος</h5>
                        <h6>Αριθμός ηχείων: x2</h6>
                        
                        <h5>Διαστάσεις και Βάρος</h5>
                        <h6>Διαστάσεις (ΠxΒxΥ): 71.5 x 7.4 x 146.7 mm</h6>
                        <h6>Βάρος: 164 g</h6>
                        
                        <h5>Εγγύηση - Πιστοποιήσεις</h5>
                        <h6>Εγγύηση: 24 μήνες</h6>
                    </h4>-->
