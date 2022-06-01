<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Enquiry about Mobile Phone Purchase"/>
    <meta name="keywords" content="html, tags, forms"/>
    <meta name="author" content="Muhammad Abubakar"/>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="scripts/part2.js" type="text/javascript"></script>
    <script src="scripts/enhancements.js" type="text/javascript"></script>
    <script src="scripts/cancel.js" type="text/javascript"></script>
    <title>Fix Order Form</title>
</head>
<body>
    <?php
        include ("includes/header.inc");
    ?>
    <h1 id="center">Fix Order</h1>
    <h2>Error 404: Data not validated</h2>

    <?php
        session_start();
        if (!isset($_SESSION["firstname"])){
            header("location: enquire.php");
        }
        echo "<p class=\"error\">" , $_SESSION["errMSG"], "</p>";
    ?>

    <form id="confirmorder" action="process_order.php" method="post" novalidate = "novalidate">
        <fieldset>
            <legend>Personal Details</legend>
            <p> <label for="firstname">First Name: </label> <em> * </em>
                <input type="text" name="firstname" id="firstname" value="<?php echo $_SESSION["firstname"]?>" required/>
                <label for="lastname">Last Name:</label> <em> * </em>
                <input type="text" name="lastname" id="lastname" value="<?php echo $_SESSION["lastname"]?>" required/>
            </p>
            <p><label for="email">Email Address: </label>  <em> * </em>
                <input type="email" name="email" id="email" value="<?php echo $_SESSION["email"]?>" required/>
            </p>
            <p><label for="street">Street Address: </label>  <em> * </em>
                <input type="text" name="street" id="street" value="<?php echo $_SESSION["street"]?>"/>
            </p>
            <p><label for="suburb">Suburb/Town:</label>  <em> * </em>
                <input type="text" name="suburb" id= "suburb" required maxlength="20" value="<?php echo $_SESSION["suburb"]?>">
            </p>
            <p><label for="state">State: </label>  <em> * </em>
                <select name="state" id="state" required >
                    <option value="<?php echo $_SESSION["state"]?>"><?php echo $_SESSION["state"]?></option>
                    <option value="Victoria">VIC</option>
                    <option value="New South Wales">NSW</option>
                    <option value="Queensland">QLD</option>
                    <option value="Northern territory">NT</option>
                    <option value="Western Australia">WA</option>
                    <option value="South Australia">SA</option>
                    <option value="Tasmania">TAS</option>
                    <option value="Australian Capital Territory">ACT</option>
                </select>
                <label for="postcode">Postcode:</label>  <em> * </em>
                <input type="text" name="postcode" id="postcode" value="<?php echo $_SESSION["postcode"]?>" required>
            </p>
            <p>
                <label for="phonenumber">Phone Number:</label>  <em> * </em>
                <input type="text" name="phonenumber" required id="phonenumber" placeholder="61-2-3333-232"  value="<?php echo $_SESSION["phonenumber"]?>" maxlength="10">
            </p>
        </fieldset>
            <fieldset>
            <legend>Product Details: </legend>
            <p><label for="product">Product:</label> <em> * </em>
                <select name="product" id = "product" required >
                    <option value="<?php echo $_SESSION["product"]?>" selected><?php echo $_SESSION["product"]?></option>
                </select>
            </p>
            <p><label for="model" id = "model">Model:</label> <em> * </em>
                <select name="model" required  >
                    <option value="<?php echo $_SESSION["model"]?>" selected="selected"><?php echo $_SESSION["product"]?></option>
                </select>
            </p>
            <p><label for="memory" id="memory">Memory: </label> <em> * </em>
                <select name="memory"  required >
                    <option value="<?php echo $_SESSION["memory"]?>" selected="selected"><?php echo $_SESSION["memory"]?></option>
                </select>
            </p>
            <p>
                <label for= "quantity">Quantity:</label> <em> * </em>
                <input type="text" name="quantity" id="quantity" required maxlength="2" size="2" value="<?php echo $_SESSION["quantity"]?>">
            </p>
            </fieldset>
        <fieldset>
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
        </fieldset>
        <!--confirm order-->
        <input type="submit" value="Check Out">
        <!--cancel order - navigated to homepage-->
        <button type="button" id="canceltheorder">Cancel Order</button>
    </form>
    <?php
    include 'includes/footer.inc';
    ?>
</body>
</html>