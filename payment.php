<?php

  session_start();
  //include('./server/connection.php');


  if(isset($_POST['order_pay_btn'])) {
    $order_status = $_POST['order_status'];
    $order_total_price = $_POST['order_total_price'];
  }

  if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
  }
  if(isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];
  }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewpoint" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>

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
    <div class="topnav" id="cart_bar">
        <?php include('navbar.php'); ?>
    </div>
    
    <!--Payment-->
    <section class="my-5 pt-5 pb-0">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container text-center">

      <?php if((isset($_SESSION['total']) && $_SESSION['total'] != 0) || (isset($_POST['order_status']) && $_POST['order_status'] == "not paid")) { ?>
        <?php if(isset($_SESSION['total']) && $_SESSION['total'] != 0) { ?>
          <p>Total Payment: <?php echo $_SESSION['total']; ?>€</p>
          <!-- <input class="btn btn-primary" value="Pay Now" type="Submit"/> -->
          <!-- <div class="container text-center mt-3 pt-5" id="paypal-button"></div> -->

        <?php } else { ?>
          <p>Total Payment: <?php echo $_POST['order_total_price']; ?>€</p>
          <!-- <input class="btn btn-primary" value="Pay Now" type="Submit"/> -->
          <!-- <div class="container text-center mt-3 pt-5" id="paypal-button"></div> -->
        <?php } ?>

        </div>
      </section>

        <form class="credit-card" method="POST" action="account.php">

          <input type="hidden" name="order_id" value="<?php echo $order_id; ?>"/>
          
          <div class="form-header">
          <h4 class="title">Choose a payment method: </h4>
          <input type="radio" id="pod" name="payment_method" value="0">
          <label for="radio">Pay On Delivery</label>
          <div id="pod-button" class="d-inline-block">
            <input type="Submit" class="btn btn-primary" name="pod_btn" id="ins_value" value="Finish Order">
          </div>
          <br>
          <input type="radio" id="credit" name="payment_method" value="0">
          <label for="css">Credit/Debit Card</label><br>
          <input type="radio" id="paypal" name="payment_method" value="0">
          <label for="javascript">PayPal</label>

          </div>
        
          <fieldset id="fs-credit" disabled="disabled">
            <div class="form-credit">
              <img src="assets\imgs\credit_cards_logo.png" style="width: 100%; margin-bottom: 15px;">
              <h4 class="title">Credit card details</h4>
              <!-- Card Number -->
              <input id="ccn" class="card-number" onkeypress="formatCreditCard()" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx"  required/>
          
              <!-- Date Field -->
              <div class="date-field">
                <div class="month">
                  <select name="Month">
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                  </select>
                </div>
                <div class="year">
                  <select name="Year">
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                    <option value="2027">2026</option>
                    <option value="2028">2026</option>
                    <option value="2029">2026</option>
                  </select>
                </div>
              </div>
          
              <!-- Card Verification Field -->
              <div class="card-verification">
                <div class="cvv-input">
                  <input type="text" placeholder="CVV" maxlength="4">
                </div>
                <div class="cvv-details">
                  <p>3 or 4 digits usually found <br> on the signature strip</p>
                </div>
              </div>
          
              <!-- Buttons -->
              <div id="credit-button">
                <button type="submit" class="proceed-btn" name="credit_btn">Proceed to Checkout</button>
                <!-- <button type="button" disabled>test</button> -->
              </div>

            </div>
          </fieldset>

          <div class="form-credit">
            <h4 class="title" >Paypal Payment</h4>
            <!-- <input type="Submit" name="paypal_btn" value="Finish Order"> -->
            <!-- onclick="document.forms[0].submit();" -->
            <div id="paypal-button"></div>
          </div>

        </form>
          
      <?php } else { ?>
        <p>You don't have an order</p>
      <?php }?>

    
    <!-- CARD NUMBER FIELD CONTROLLER-->
    <script type="text/javascript">

      function formatCreditCard() {
          var x = document.getElementById("ccn");
          var index = x.value.lastIndexOf('-');
          var test = x.value.substr(index + 1);
          if (test.length === 4 && x.value.length!=19)
              x.value = x.value + '-';
      }

    </script>

    <script type="text/javascript">
      const radio = [document.getElementById('pod'), document.getElementById('credit'), document.getElementById('paypal')];
      const div = [document.getElementById('pod-button'), document.getElementById('credit-button'), document.getElementById('paypal-button')];
      var field = document.getElementById('fs-credit');

      div[2].addEventListener('click', function() {
          document.forms[0].submit();
      });

      for (let i=0; i<radio.length; i++) {
          radio[i].addEventListener('click', function(e){
              e = e || window.event;
              var target = e.target || e.srcElement;
              // text = target.id;   
              // alert(text);

              if (target.id=='pod' && radio[0].value==0) { //&& radio[r].value==0
                    radio[0].value = 1;
                    this.checked = true;
                    div[0].style.visibility = 'visible';
                    div[0].value = radio[0].value;

                    radio[1].value = radio[2].value= 0;
                    radio[1].checked = radio[2].checked = false;
                    div[1].style.visibility = div[2].style.visibility = 'hidden';
                    field.disabled = true;
                    div[1].value = div[2].value = '';
              }
              else if (target.id=='credit' && radio[1].value==0) {
                  radio[1].value = 1;
                  this.checked = true;
                  div[1].style.visibility = 'visible';
                  field.disabled = false;
                  div[1].value = radio[1].value;

                  radio[0].value = radio[2].value= 0;
                  radio[0].checked = radio[2].checked = false;
                  div[0].style.visibility = div[2].style.visibility = 'hidden';
                  div[0].value = div[2].value = '';
              }
              else if (target.id=='paypal' && radio[2].value==0){
                  radio[2].value = 1;
                  this.checked = true;
                  div[2].style.visibility = 'visible';
                  div[2].value = radio[2].value;

                  radio[0].value = radio[1].value= 0;
                  radio[0].checked = radio[1].checked = false;
                  div[0].style.visibility = div[1].style.visibility = 'hidden';
                  field.disabled = true;
                  div[0].value = div[1].value = '';
              }
        }, false);

      }

    </script>
    
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>

    <script>

      paypal.Button.render({
        // Configure environment
        env: 'sandbox',
        client: {
          sandbox: 'demo_sandbox_client_id',
          production: 'demo_production_client_id'
        },
        // Customize button (optional)
        locale: 'en_US',
        style: {
          size: 'medium',
          color: 'gold',
          shape: 'pill',
        },

        // Enable Pay Now checkout flow (optional)
        commit: true,

        // Set up a payment
        payment: function(data, actions) {
          return actions.payment.create({
            transactions: [{
              amount: {
                total: '0.01',
                currency: 'USD'
              }
            }]
          });
        },
        // Execute the payment
        onAuthorize: function(data, actions) {
          return actions.payment.execute().then(function() {
            // Show a confirmation message to the buyer
            window.alert('Thank you for your purchase!');
          });
        }
      }, '#paypal-button');

    </script>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
