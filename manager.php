<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Mobile Phone Purchase" />
    <meta name="keywords" content="HTML5, tags, phone, purchase" />
    <meta name="author" content="Muhammad Abubakar"  />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet"  type="text/css" href="styles/styles.css">
    <title>Manager</title>
</head>
<body>
<?php
    include "includes/header.inc";
    include "includes/menu.inc";
    session_start();
?>
<h1>Manager Reports</h1>
<section id="logout">
    <form action="logout.php">
        <input type="submit" value="Log Out">
    </form>
</section>
<section id="queryForm">
    <h2 id="queryHeading">Search by:</h2>
    <form method="post">
        <fieldset>
            <br>
            <input type="radio" id="*" name="query" value="*">
            <label for="*">All Orders</label><br>

            <input type="radio" name="query" id="customer_name" value="customer_name">
            <label for="customer_name">Orders for a customer based on their name</label><br>

            <input type="radio" name="query" id="product_name" value="product_name">
            <label for="product_name">Orders for a particular product</label><br>

            <input type="radio" name="query" id="order_status" value="order_status">
            <label for="order_status">Orders that are pending</label><br>

            <input type="radio" name="query" id="cost_sort" value="cost_sort">
            <label for="cost_sort">Orders sorted by total cost</label><br><br>

            <label for="querySearch">Keyword: </label>
            <input type="text" name="querySearch" id="querySearch" placeholder="Enter your query here...">
            <input type="submit" value="Search">
        </fieldset>
    </form>
</section>
<br>
<?php
    if(!isset($_SESSION['user_id'])){
        header('Location: login.php');
        exit;
    } else {
        require_once('settings.php');
        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );
        if (!$conn) {
            // Displays an error message
            echo "<p>Database connection failure</p>"; // Might not show in a production script
        }
        else {
            $sql_table="orders";

            if (isset($_POST["query"])) {
                if ($_POST["query"] === '*') {
                    $query = "SELECT * FROM $sql_table WHERE 1";
                }
                elseif ($_POST["query"] === 'customer_name'){
                    $search = $_POST["querySearch"];
                    $query = "SELECT * FROM $sql_table where customer_name like '$search%'";
                }
                elseif ($_POST["query"] === 'product_name'){
                    $search = $_POST["querySearch"];
                    $query = "SELECT * FROM $sql_table where product_name like '$search%'";
                }
                elseif ($_POST["query"] === 'order_status'){
                    $query = "SELECT * FROM $sql_table WHERE order_status = 'pending'";
                }
                elseif ($_POST["query"] === 'cost_sort'){
                    $query = "SELECT * FROM $sql_table WHERE 1 order by order_cost";
                }

                $result = mysqli_query($conn, $query);

                if(!$result) {
                    echo "<p>Something is wrong with ",	$query, "</p>";
                } else {
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
                        echo "<td>",$row["order_cost"],"</td>";
                        echo "<td>",$row["order_status"],"</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    // Frees up the memory, after using the result pointer
                    mysqli_free_result($result);
                } // if successful query operation
            }
            // close the database connection
            mysqli_close($conn);
        }
    }

?>
<section id="changeDir">
    <h2 id="queryHeading">Update order:</h2>
    <form method="post">
        <fieldset>
            <br>
            <label for="updating_id">Enter Order ID:</label>
            <input type="number" id="updating_id" name="updating_id"><br><br>
            <label for="updating_status">Choose status:</label>
            <select id="updating_status" name="updating_status">
                <option value="pending" name="updating_status">Pending</option>
                <option value="fulfilled" name="updating_status">Fulfilled</option>
                <option value="paid" name="updating_status">Paid</option>
                <option value="archived" name="updating_status">Archived</option>
            </select><br><br>
            <input type="submit" value="Update">
        </fieldset>
    </form>
</section>
<?php
    require_once('settings.php');
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
    if (!$conn){
        echo "<p>Database Connection failure. </p>";
    } else{
        $sql_table="orders";
        if (isset($_POST["updating_id"]) and isset($_POST["updating_status"])){
            $updating_id = $_POST["updating_id"];
            $updating_status = $_POST["updating_status"];
            $query = "SELECT * FROM $sql_table WHERE order_id = '$updating_id'";
            $result = mysqli_query($conn, $query);
            if (!$result){
                echo "<p>Updating order failed. Try again.</p>";
            } else{
                $row = mysqli_fetch_assoc($result);
                if (isset($row["order_id"])){
                    $query_new = "UPDATE orders SET order_status = '$updating_status' WHERE order_id = '$updating_id' ";
                    $result_two = mysqli_query($conn, $query_new);
                    if(!$result_two) {
                        echo "<p>Updating status failed. Try again.</p>";
                    } else {
                        echo "<p>Order Status Changed Successfully </p>";
                    }
                } else{
                    echo "<p>Order does not exist.</p>";
                }

                mysqli_close($conn);
            }
        }
    }
?>
<section id="dirDirection">
    <h2>Delete order:</h2>
    <form method="post">
        <fieldset>
            <br>
            <label for="delete_id">Enter Order ID:</label>
            <input type="number" id="delete_id" name="delete_id"><br><br>
            <input type="submit" value="Delete">
        </fieldset>
    </form>
</section>
<?php
    require_once('settings.php');
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
    if (!$conn){
        echo "<p>Database Connection failure. </p>";
    }else{
        $sql_table="orders";
        if (isset($_POST["delete_id"])){
            $delete_id = $_POST["delete_id"];
            $query = "SELECT order_status FROM $sql_table where order_id = '$delete_id'";
            $result = mysqli_query($conn, $query);
            if (!$result){
                echo "<p>Deleting order failed. Try again.</p>";
            } else{
                $row = mysqli_fetch_assoc($result);
                if ($row["order_status"] === 'pending'){
                    $deleteQuery = "DELETE FROM $sql_table WHERE order_id = '$delete_id'";
                    $resultSecond = mysqli_query($conn, $deleteQuery);
                    if ($resultSecond){
                        echo "<p>Order Deleted Successfully!</p>";
                    } else{
                        echo "<p>Order Delete Process Failed.</p>";
                    }
                } else {
                    echo "<p>Sorry, but order is not pending.</p>";
                }
            }
            mysqli_close($conn);
        }
    }
?>
<section id="direction">
    <h2>Advanced Manager Report</h2>
    <form method="post">
        <fieldset>
            <br>
            <input type="radio" name="advQuery" id="popular" value="popular">
            <label for="popular">Most popular product</label><br>

            <input type="radio" name="advQuery" id="avgCost" value="avgCost">
            <label for="avgCost">Average Cost of order</label><br>

            <input type="radio" name="advQuery" id="totalCost" value="totalCost">
            <label for="totalCost">Total Sales</label><br><br>

            <input type="submit" value="Search">
        </fieldset>
    </form>
    <br>
</section>

<?php
    require_once('settings.php');
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
    if (!$conn){
        echo "<p>Database Connection failure. </p>";
    }else{
        $sql_table="orders";
        if (isset($_POST["advQuery"])){
            if ($_POST["advQuery"] === 'popular'){
                $query = "SELECT model FROM orders GROUP BY order_id ORDER BY SUM(quantity) DESC LIMIT 1";
                $result = mysqli_query($conn, $query);
                if (!$result){
                    echo "<p>Displaying Popular Product failed. Try again.</p>";
                } else {
                    $row = mysqli_fetch_assoc($result);

                    echo "<table border=\"1\">";
                    echo "<tr>\n"
                        . "<th scope=\"col\">Popular Product</th>\n"
                        . "</tr>\n";
                    echo "<tr>";
                    echo "<td>", $row["model"], "</td>";
                    echo "</tr>";
                    echo "</table>";
                }
            }
            if ($_POST["advQuery"] === 'avgCost'){
                $query_three = "SELECT AVG(order_cost) AS 'totalSales' FROM orders";
                $result_three = mysqli_query($conn, $query_three);
                if (!$result_three){
                    echo "<p>Displaying Average cost failed. Try again.</p>";
                } else {
                    $row = mysqli_fetch_assoc($result_three);
                    echo "<table border=\"1\">";
                    echo "<tr>\n"
                        . "<th scope=\"col\">Average order cost</th>\n"
                        . "</tr>\n";
                    echo "<tr>";
                    echo "<td>", $row["totalSales"], "</td>";
                    echo "</tr>";
                    echo "</table>";
                }
            }

            if ($_POST["advQuery"] === 'totalCost'){
                $query_three = "SELECT SUM(order_cost) AS 'totalSales' FROM orders";
                $result_three = mysqli_query($conn, $query_three);
                if (!$result_three){
                    echo "<p>Displaying Average cost failed. Try again.</p>";
                } else {
                    $row = mysqli_fetch_assoc($result_three);
                    echo "<table border=\"1\">";
                    echo "<tr>\n"
                        . "<th scope=\"col\">Total Sales</th>\n"
                        . "</tr>\n";
                    echo "<tr>";
                    echo "<td>", $row["totalSales"], "</td>";
                    echo "</tr>";
                    echo "</table>";
                }
            }
        }
    }


?>
<?php
include 'includes/footer.inc';
?>

</body>
</html>