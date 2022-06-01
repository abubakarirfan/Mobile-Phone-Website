<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="Mobile Phone Purchase" />
    <meta name="keywords" content="HTML5, tags, phone, purchase" />
    <meta name="author" content="Muhammad Abubakar"  />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="scripts/payment.js"></script>
    
    <title>Payment</title>
  </head>
  <body>
    <?php
      include 'includes/header.inc';
    ?>
    <!--payment details form-->
    <h1>Order Details</h1>

    <form id="confirmorder" action="process_order.php" method="post" novalidate = "novalidate">
      <!--previously entered info displayed here-->
      <fieldset>
        <legend>Personal Details</legend>
        <p>Full name: <span id="confirm_name"></span></p>
        <p>Email: <span id="confirm_email"></span></p>
        <p>Street Address: <span id="confirm_street"></span></p>
        <p>Town: <span id="confirm_town"></span></p>
        <p>State: <span id="confirm_state"></span></p>
        <p>Zip Code: <span id="confirm_postcode"></span></p>
        <p>Phone Number: <span id="confirm_phonenumber"></span></p>
        <p>Product: <span id="confirm_product"></span></p>
        <p>Model: <span id="confirm_model"></span></p>
        <p>Memory: <span id="confirm_memory"></span></p>
        <p>Quantity: <span id="confirm_quantity"></span></p>
        <p>Price: $<span id="confirm_cost"></span></p>

        <input type="hidden" name="firstname" id="firstname">
        <input type="hidden" name="lastname" id="lastname">
        <input type="hidden" name="email" id="email">
        <input type="hidden" name="street" id="street">
        <input type="hidden" name="suburb" id="suburb">
        <input type="hidden" name="state" id="state">
        <input type="hidden" name="postcode" id="postcode">
        <input type="hidden" name="phonenumber" id="phonenumber">
        <input type="hidden" name="product" id="product">
        <input type="hidden" name="model" id="model">
        <input type="hidden" name="memory" id="memory">
        <input type="hidden" name="quantity" id="quantity">
        <input type="hidden" name="cost" id="cost">
      </fieldset>
      <fieldset>
        <!--payment details-->
        <legend>Credit Card Details</legend>
        <label for="card-type">Credit card type: </label> <em> * </em>
        <input type="text" id="card-type" name="cardtype" placeholder="Mastercard" list="cardtype" required>
        <datalist id="card-type">
          <option value="Visa">
          <option value="Mastercard">
          <option value="American Express">
        </datalist>
        <br>
        <label for="card-name">Name on credit card: </label> <em> * </em>
        <input type="text" id="card-name" name="cardname" placeholder="Bill Jackerson"  maxlength="40" required>
        <br>
        <label for="card-no">Credit card number: </label> <em> * </em>
        <input type="text" id="card-no" name="cardnumber" placeholder="XXXX-XXXX-XXXX-XXXX" required>
        <br>
        <label for="card-expiry">Credit card expiry date: </label> <em> * </em>
        <input type="text" id="card-expiry" name="cardexpirydate" placeholder="MM/YY" required>
        <br>
        <label for="cvv">Card verification value (CVV): </label> <em> * </em>
        <input type="text" id="cvv" name="ccv" placeholder="XXX" required>
        <br>
        <br>
        <!--confirm order-->
        <input type="submit" value="Check Out">
        <!--cancel order - navigated to homepage-->
        <button type="button" id="cancelButton">Cancel Order</button>
      </fieldset>
    </form>
    <hr>
    <?php
      include 'includes/footer.inc'
    ?>
  </body>
</html>
