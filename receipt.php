<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Receipt about Mobile Phone Purchase"/>
    <meta name="keywords" content="html, tags, forms"/>
    <meta name="author" content="Muhammad Abubakar"/>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <script src="scripts/part2.js" type="text/javascript"></script>
    <title>Receipt</title>
</head>
<body>
<?php
include ("includes/header.inc");
?>
<h1>Receipt</h1>
    <?php

    session_start();
    require_once('settings.php');

    if (!isset($_SESSION["firstname"])){
        header("location: enquire.php");
    }

    $name = $_SESSION["firstname"] . " " .$_SESSION["lastname"];
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



    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );

    if (!$conn) {
        // Displays an error message
        echo "<p class=\"wrong\">Database connection failure</p>"; // Might not show in a production script
    } else {
        // Upon successful connection

        $sql_table="orders";

        // Set up the SQL command to add the data into the table
        $query = "SELECT * FROM $sql_table ORDER BY order_id DESC LIMIT 1";

        // execute the query and store result into the result pointer
        $result = mysqli_query($conn, $query);

        // checks if the execuion was successful
        if(!$result) {
            echo "<p class=\"wrong\">Something is wrong with ",	$query, "</p>";
        } else {
            if(mysqli_num_rows($result) > 0) {
                // Display the retrieved records
                echo "<table border=\"1\">";
                echo "<tr>\n"
                    ."<th scope=\"col\">ID</th>\n"
                    ."<th scope=\"col\">Name</th>\n"
                    ."<th scope=\"col\">Email</th>\n"
                    ."<th scope=\"col\">Phone No.</th>\n"
                    ."<th scope=\"col\">Street Address</th>\n"
                    ."<th scope=\"col\">Suburb</th>\n"
                    ."<th scope=\"col\">State</th>\n"
                    ."<th scope=\"col\">Postcode</th>\n"
                    ."<th scope=\"col\">Product</th>\n"
                    ."<th scope=\"col\">Model</th>\n"
                    ."<th scope=\"col\">Memory</th>\n"
                    ."<th scope=\"col\">Quantity</th>\n"
                    ."<th scope=\"col\">Card Type</th>\n"
                    ."<th scope=\"col\">Card name</th>\n"
                    ."<th scope=\"col\">Card number</th>\n"
                    ."<th scope=\"col\">Expiry Date</th>\n"
                    ."<th scope=\"col\">CVV</th>\n"
                    ."<th scope=\"col\">Cost</th>\n"
                    ."<th scope=\"col\">Order Status</th>\n"
                    ."</tr>\n";
                // retrieve current record pointed by the result pointer

                while ($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>",$row["order_id"],"</td>";
                    echo "<td>",$row["customer_name"],"</td>";
                    echo "<td>",$row["email"],"</td>";
                    echo "<td>",$row["phone_number"],"</td>";
                    echo "<td>",$row["street_address"],"</td>";
                    echo "<td>",$row["suburb"],"</td>";
                    echo "<td>",$row["state"],"</td>";
                    echo "<td>",$row["postcode"],"</td>";
                    echo "<td>",$row["product_name"],"</td>";
                    echo "<td>",$row["model"],"</td>";
                    echo "<td>",$row["memory"],"</td>";
                    echo "<td>",$row["quantity"],"</td>";
                    echo "<td>",$row["card_type"],"</td>";
                    echo "<td>",$row["card_name"],"</td>";
                    $cardEn = substr($row["card_number"], 12,4);
                    $cardEncrypted =  '************' . $cardEn;
                    echo "<td>",$cardEncrypted,"</td>";
                    echo "<td>",$row["expiry_date"],"</td>";
                    echo "<td>",'***',"</td>";
                    echo "<td>",$row["order_cost"],"</td>";
                    echo "<td>",$row["order_status"],"</td>";
                    echo "</tr>";
                }
                echo "</table>";
                // Frees up the memory, after using the result pointer
                mysqli_free_result($result);
            } // if successful query operation
        } // end if no rows
        // close the database connection
        mysqli_close($conn);
    } // if successful database connection

    ?>
<?php
include 'includes/footer.inc';
?>

</body>
</html>