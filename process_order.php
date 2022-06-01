<?php
//start session
    session_start();
    //check if sessions exist
    if (!isset($_SESSION["errMSG"])) {
        $_SESSION["errMSG"] = "";
    }
    if (!isset($_SESSION["firstname"])){
        $_SESSION["firstname"] = "";
    }
    if (!isset($_SESSION["lastname"])){
        $_SESSION["lastname"] = "";
    }
    if (!isset($_SESSION["email"])){
        $_SESSION["email"] = "";
    }
    if (!isset($_SESSION["street"])){
        $_SESSION["street"] = "";
    }
    if (!isset($_SESSION["postcode"])){
        $_SESSION["postcode"] = "";
    }
    if (!isset($_SESSION["state"])){
        $_SESSION["state"] = "";
    }
    if (!isset($_SESSION["phonenumber"])){
        $_SESSION["phonenumber"] = "";
    }
    if (!isset($_SESSION["quantity"])){
        $_SESSION["quantity"] = "";
    }
    if (!isset($_SESSION["product"])){
        $_SESSION["product"] = "";
    }
    if (!isset($_SESSION["model"])){
        $_SESSION["model"] = "";
    }
    if (!isset($_SESSION["memory"])){
        $_SESSION["memory"] = "";
    }
    if (!isset($_SESSION["cost"])){
        $_SESSION["cost"] = "";
    }
    if (!isset($_SESSION["suburb"])){
        $_SESSION["suburb"] = "";
    }

    if (!isset($_SESSION["cardtype"])){
        $_SESSION["cardtype"] = "";
    }
    if (!isset($_SESSION["cardnum"])){
            $_SESSION["cardnum"] = "";
        }
    if (!isset($_SESSION["expirydate"])){
            $_SESSION["expirydate"] = "";
        }
    if (!isset($_SESSION["ccv"])){
            $_SESSION["ccv"] = "";
    }

    //sanitise data to get rid of extra chars
function sanitise_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
// calculate price
    function checkPrice($model,$memory) {
      $costcalc = 0;
      if ($model == "iPhone 12"){
        if($memory == "32"){
          $costcalc = 1000;
        }
        if($memory == "64"){
          $costcalc = 1100;
        }
        if($memory == "128"){
          $costcalc = 1200;
        }
        if($memory == "256"){
          $costcalc = 1300;
        }
      }
      if ($model == "iPhone 12 Pro"){
        if($memory == "32"){
          $costcalc = 1100;
        }
        if($memory == "64"){
          $costcalc = 1200;
        }
        if($memory == "128"){
          $costcalc = 1300;
        }
        if($memory == "256"){
          $costcalc = 1400;
        }
      }
      if ($model == "iPhone 12 Pro Max"){
        if($memory == "32"){
          $costcalc = 1200;
        }
        if($memory == "64"){
          $costcalc = 1300;
        }
        if($memory == "128"){
          $costcalc = 1400;
        }
        if($memory == "256"){
          $costcalc = 1500;
        }
      }
      if ($model == "iPhone 11"){
        if($memory == "32"){
          $costcalc = 800;
        }
        if($memory == "64"){
          $costcalc = 850;
        }
        if($memory == "128"){
          $costcalc = 900;
        }
        if($memory == "256"){
          $costcalc = 950;
        }
      }
      if ($model == "iPhone 11 Pro"){
        if($memory == "32"){
            $costcalc = 900;
        }
        if($memory == "64"){
          $costcalc = 950;
        }
        if($memory == "128"){
          $costcalc = 1000;
        }
        if($memory == "256"){
          $costcalc = 1050;
        }
        if ($model == "iPhone 11 Pro Max"){
          if($memory == "32"){
              $costcalc = 1000;
          }
          if($memory == "64"){
            $costcalc = 1050;
          }
          if($memory == "128"){
            $costcalc = 1100;
          }
          if($memory == "256"){
            $costcalc = 1150;
          }
        }
        if ($model == "iPhone X"){
          if($memory == "32"){
            $costcalc = 600;
          }
          if($memory == "64"){
            $costcalc = 650;
          }
          if($memory == "128"){
            $costcalc = 700;
          }
          if($memory == "256"){
            $costcalc = 750;
          }
        }
        if ($model == "iPhone XS"){
          if($memory == "32"){
            $costcalc = 700;
          }
          if($memory == "64"){
            $costcalc = 750;
          }
          if($memory == "128"){
            $costcalc = 800;
          }
          if($memory == "256"){
            $costcalc = 850;
          }
        }
        if ($model == "iPhone XS Max"){
          if($memory == "32"){
            $costcalc = 800;
          }
          if($memory == "64"){
            $costcalc = 850;
          }
          if($memory == "128"){
            $costcalc = 900;
          }
          if($memory == "256"){
            $costcalc = 950;
          }
        }
      }
      return $costcalc;
    }
//validate postcode
    function checkpostcode($postcode, $state){
        $tmpMsg = "";
        $digit = substr($postcode, 0,1);
        if ($state == "Victoria"){
            if ($digit != "3"){
                if ($digit != "8"){
                    $tmpMsg .= "<p>Invalid postal code for Victoria. </p>";
                }
            }
        }
        if ($state == "New South Wales"){
            if ($digit != 1){
                if ($digit != 2){
                    $tmpMsg .= "<p> Invalid postal code for NSW. </p>";
                }
            }
        }
        if ($state == "Queensland"){
            if ($digit != 4 ){
                if ($digit != 9){
                    $tmpMsg .= "<p> Invalid postal code for QLD. </p>";
                }
            }
        }
        if ($state == "Northern territory"){
            if ($digit != 0){
                $tmpMsg .= "<p>You have entered invalid postal code for NT.</p>";
            }
        }
        if ($state == "Western Australia"){
            if ($digit != 6) {
                $tmpMsg .= "<p>You have entered invalid postal code for WA. </p>";
            }
        }
        if ($state == "South Australia"){
            if ($digit != 5) {
                $tmpMsg .= "<p>You have entered invalid postal code for SA.</p>";
            }
        }
        if ($state == "Tasmania"){
            if ($digit != 7){
                $tmpMsg .= "<p> Invalid postal code for TAS. </p>";
            }
        }
        if ($state == "Australian Capital Territory"){
            if ($digit != 0){
                $tmpMsg .= "<p> Invalid postal code for ACT. </p>";
            }
        }
        return $tmpMsg;
    }
// find cost
    function calculcateCost($model,$memory,$quantity) {
      $totalCost = 0;
      for ($i = 0; $i < $quantity; $i++) {
        $totalCost = $totalCost + checkPrice($model,$memory);
      }
      return $totalCost;
    }
// validate CC info
    function checkCardValidity($cardnumber, $cardtype){
      $tmpMsg = "";
      $cardlength = strlen($cardnumber);
      $onedigit = substr($cardnumber,0,1);
      $twodigit = substr($cardnumber,0,2);
      $digittwo = (int)$twodigit;

      if ($cardtype == "visa") {
        if ($cardlength != 16){
          $tmpMsg .= "<p>Visa card must have 16 digits.</p>";
        }
        if ($onedigit != "4"){
          $tmpMsg .= "<p>Visa card must begin with 4.</p>";
        }
      }
      if ($cardtype == "mastercard") {
        if ($cardlength != 16) {
          $tmpMsg .= "<p>Mastercard must have 16 digits. </p>";
        }
        if ($digittwo > 55 or  $digittwo < 51){
          $tmpMsg .= "<p>Mastercard must begin with 51 to 55.</p>";
        }
      }
      if ($cardtype == "american express"){
        if ($cardlength != 15){
          $tmpMsg .= "<p>American Express must have 15 digits.</p>";
        }
        if ($digittwo != 34){
          if ($digittwo != 37){
            $tmpMsg .= "<p>American Express Number must begin with 34 or 37. </p>";
          }
        }
      }
      return $tmpMsg;
    }

    $errMsg = "";
    //checks if process was triggered by a form submit, if not display an error message
    if (isset($_POST["firstname"])){
        $firstname = $_POST["firstname"];
        $firstname = sanitise_input($firstname);
    } else {
        // Redirect to form, if process was not triggered by a form submit
        header("location: enquire.php");
    }
    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
        $lastname = sanitise_input($lastname);
    }
    if (isset($_POST["email"])) {
        $email = $_POST["email"];
        $email = sanitise_input($email);
    }
    if (isset($_POST["street"])) {
        $street = $_POST["street"];
        $street = sanitise_input($street);
    }
    if (isset($_POST["suburb"])) {
        $suburb = $_POST["suburb"];
        $suburb = sanitise_input($suburb);
    }
    if (isset($_POST["state"])) {
        $state = $_POST["state"];
        $state = sanitise_input($state);
    }
    if (isset($_POST["postcode"])) {
        $postcode = $_POST["postcode"];
        $postcode = sanitise_input($postcode);
    }
    if (isset($_POST["phonenumber"])) {
        $phonenumber = $_POST["phonenumber"];
        $phonenumber = sanitise_input($phonenumber);
    }
    if (isset($_POST["product"])) {
        $product = $_POST["product"];
        $product = sanitise_input($product);
    }
    if (isset($_POST["model"])) {
        $model = $_POST["model"];
        $model = sanitise_input($model);
    }
    if (isset($_POST["memory"])) {
        $memory = $_POST["memory"];
        $memory = sanitise_input($memory);
    }
    if (isset($_POST["quantity"])) {
        $quantity = $_POST["quantity"];
        $quantity = sanitise_input($quantity);
    }
    if (isset($_POST["cost"])) {
        $cost = $_POST["cost"];
        $cost = sanitise_input($cost);
    }
    if (isset($_POST["cardtype"])) {
        $cardtype = $_POST["cardtype"];
        $cardtype = sanitise_input($cardtype);
        $cardtype = strtolower($cardtype);
    }
    if (isset($_POST["cardname"])) {
        $cardname = $_POST["cardname"];
        $cardname = sanitise_input($cardname);
    }
    if (isset($_POST["cardnumber"])) {
        $cardnumber = $_POST["cardnumber"];
        $cardnumber = sanitise_input($cardnumber);
    }
    if (isset($_POST["cardexpirydate"])) {
        $cardexpirydate = $_POST["cardexpirydate"];
        $cardexpirydate = sanitise_input($cardexpirydate);
    }
    if (isset($_POST["ccv"])) {
        $ccv = $_POST["ccv"];
        $ccv = sanitise_input($ccv);
    }

    $result = true;

    // validate data acc to assignment
    if ($firstname == "") {
        $errMsg .= "<p>You must enter your first name. </p>";
    }
    else if (!preg_match("/^[a-zA-Z]{1,25}$/", $firstname)){
        $errMsg .= "<p>Only Alpha Characters are allowed in your first name.</p>";
    }
    if ($lastname == "") {
        $errMsg .= "<p>You must enter your last name. </p>";
    }
    else if (!preg_match("/^[a-zA-Z-]{1,25}$/", $lastname)){
        $errMsg .= "<p>Only Alpha Characters and Hyphens are allowed in your last name.</p>";
    }
    if ($email == "") {
        $email .= "<p>You must enter your email address. </p>";
    }
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errMsg .= "<p>Enter a valid email address.</p>";
    }
    if ($street == "") {
        $errMsg .= "<p>You must enter your Street Address. </p>";
    }
    else if (!preg_match("/^[a-zA-Z0-9 .-]{1,40}$/", $street)){
        $errMsg .= "<p>Street Address can have maximum of 40 characters.</p>";
    }
    if ($state == "") {
        $state .= "<p>You must enter your Street Address. </p>";
    }
    if ($postcode == "") {
        $errMsg .= "<p>You must enter your postcode. </p>";
    } else if (!preg_match("/^\d{4}$/", $postcode)){
        $errMsg .= "<p>Your postcode must have be of 4 digits. </p>";
    }
    if ($phonenumber == "") {
        $errMsg .= "<p>You must enter your phone number. </p>";
    }
    else if (!preg_match("/^[0-9]{8,10}$/", $phonenumber)){
        $errMsg .= "<p>Your phone number must have be of 8-10 digits. </p>";
    }
    $quantitycheck = (int)$quantity;
    if ($quantity == "") {
        $errMsg .= "<p>You must enter quantity of product. </p>";
    } else if ($quantitycheck < 0 and $quantitycheck > 20){
        $errMsg .= "<p>You must enter quantity between 1 and 20. </p>";
    }
    if ($model == "") {
        $errMsg .= "<p>You must enter model of product. </p>";
    }
    if ($memory == "") {
        $errMsg .= "<p>You must enter memory of product. </p>";
    }
    if ($product == "") {
        $errMsg .= "<p>You must enter the product. </p>";
    }

    //validating card card stuff
    if ($cardtype != "visa") {
      if ($cardtype != "mastercard") {
        if ($cardtype != "american express") {
          $errMsg = $errMsg . "<p>We do not accept that kind of credit card.</p>";
        }
      }
    }
    if ($cardname == ""){
      $errMsg .= "<p>You must enter card name. </p>";
    }
    else if (!preg_match("/^[a-zA-Z- ]+$/" , $cardname)) {
      $errMsg .= "<p>Your name must contain alphabetical characters and space only.</p>";
    }

    $tempMsg = checkCardValidity($cardnumber, $cardtype);
    if ($tempMsg != "") {
      $errMsg .= $tempMsg;
    }
    if (!preg_match("/^(0[1-9]|1[0-2])\/?([0-9]{2}$)/" , $cardexpirydate)) {
      $errMsg .= "<p>Enter Expiry Date in (MM/YY) format. \n</p>";
    }
    $expiry1 = substr($cardexpirydate, 0,2);
    $expiry2 = substr($cardexpirydate, 3,2);
    $expirymonth = (int)$expiry1;
    $expiryyear = (int)$expiry2;
    $todayyear = (int)date("y");
    $todaymonth = (int)date("m");

    if ($expiryyear < $todayyear){
        $errMsg .= "<p>Your card is expired. </p>";
    }
    if ($expiryyear == $todayyear){
        if ($expirymonth < $todaymonth){
            $errMsg .= "<p>Your card is expired. </p>";
        }
    }
    if (!preg_match("/^[0-9]{3,4}$/", $ccv)){
        $errMsg .= "<p>CVV must have in correct format.</p>";
    }
    $costcheck = calculcateCost($model,$memory,$quantity);

    $tempMsg = checkpostcode($postcode,$state);
    if ($tempMsg != ""){
        $errMsg .= $tempMsg;
    }

    if ($errMsg != "") {
        $result = false;
    }

// assign values to sessions
    $_SESSION["lastname"] = $lastname;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["email"] = $email;
    $_SESSION["phonenumber"] = $phonenumber;
    $_SESSION["state"] = $state;
    $_SESSION["street"] = $street;
    $_SESSION["suburb"] = $suburb;
    $_SESSION["postcode"] = $postcode;
    $_SESSION["quantity"] = $quantity;
    $_SESSION["product"] = $product;
    $_SESSION["model"] = $model;
    $_SESSION["memory"] = $memory;
    $_SESSION["cost"] = $costcheck;
    $_SESSION["cardtype"] =  $cardtype;
    $_SESSION["cardname"] = $cardname;
    $_SESSION["cardnum"] = $cardnumber;
    $_SESSION["expirydate"] = $cardexpirydate;
    $_SESSION["ccv"] = $ccv;

    if ($result){

        require_once('settings.php');
        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );

        if (!$conn){
            echo "<p>Database connection failure</p>";

        }
        else {
            $name = $_SESSION["firstname"] . " " . $_SESSION["lastname"];
            $orderID = NULL;
            $email = $_SESSION["email"];
            $phoneNum = $_SESSION["phonenumber"];
            $state = $_SESSION["state"];
            $street = $_SESSION["street"];
            $suburb = $_SESSION["suburb"];
            $postcode = $_SESSION["postcode"];
            $quantity = $_SESSION["quantity"];
            $product = $_SESSION["product"];
            $model = $_SESSION["model"];
            $memory = $_SESSION["memory"];
            $cost = $_SESSION["cost"];
            $cardtype = $_SESSION["cardtype"];
            $cardnum = $_SESSION["cardnum"];
            $cardname= $_SESSION["cardname"];
            $expirydate = $_SESSION["expirydate"];
            $cvv = $_SESSION["ccv"];
            $orderstatus = "pending";


            $sql_table="orders";
            $fieldDefinition="order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,customer_name NOT NULL, email TEXT NOT NULL , phone_number VARCHAR(10) NOT NULL , street_address TEXT NOT NULL , suburb TEXT NOT NULL ,state TEXT NOT NULL ,postcode VARCHAR(4) NOT NULL ,product_name TEXT NOT NULL ,model TEXT NOT NULL ,memory TEXT NOT NULL ,quantity INT NOT NULL , card_type TEXT NOT NULL , card_name TEXT NOT NULL , card_number VARCHAR(16) NOT NULL , expiry_date TEXT NOT NULL ,ccv INT(4) NOT NULL ,order_cost INT NOT NULL ,order_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,order_status TEXT NOT NULL";

            $sqlString = "show tables like '$sql_table'";
            $result = @mysqli_query($conn, $sqlString);

            if(mysqli_num_rows($result) == 0) {
                echo "<p>Table does not exist - create table $sql_table</p>";
                $sqlString = "create table " . $sql_table . "(" . $fieldDefinition . ")";;
                $result2 = @mysqli_query($conn, $sqlString);
                // checks if the table was created
                if($result2 === false) {
                    echo "<p class=\"wrong\">Unable to create Table $sql_table.". msqli_errno($conn) . ":". mysqli_error($conn) ." </p>"; //Would not show in a production script
                } else {
                    // display an operation successful message
                    echo "<p class=\"ok\">Table $sql_table created OK</p>"; //Would not show in a production script
                } // if successful query operation
            } else {
                // display an operation successful message
                echo "<p>Table  $sql_table already exists</p>"; //Would not show in a production script
            } // if successful query operation
            // Set up the SQL command to add the data into the table
            $query = "insert into $sql_table"
                ."(order_id, customer_name, email, phone_number, street_address, suburb, state, postcode, product_name, model,memory,quantity, card_type, card_name, card_number, expiry_date, ccv, order_cost, order_status)"
                . " values "
                ."('$orderID', '$name', '$email', '$phoneNum', '$street', '$suburb' , '$state' , '$postcode' , '$product', '$model', '$memory', '$quantity', '$cardtype','$cardname' , '$cardnum', '$expirydate', '$cvv', '$cost', '$orderstatus')";
            // execute the query
            $result = mysqli_query($conn, $query);
            // checks if the execution was successful
            if(!$result) {
                echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";  //Would not show in a production script
            } else {
                // display an operation successful message
                echo "<p class=\"ok\">Successfully added New member</p>";
            } // if successful query operation
            // close the database connection
            mysqli_close($conn);
        }
        header("location: receipt.php");
    } else{
        $_SESSION["errMSG"] = $errMsg;
        header("location: fix_order.php");
    }
?>
