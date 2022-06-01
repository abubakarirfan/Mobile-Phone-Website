<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Mobile Phone Purchase" />
    <meta name="keywords" content="HTML5, tags, phone, purchase" />
    <meta name="author" content="Muhammad Abubakar"  />
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="styles/styles.css">
    <title>Enhancements Part 2</title>
</head>
<body>
<?php
    include "includes/header.inc";
    include "includes/menu.inc";
?>
<section>
    <h2>PHP Enhancement #1</h2>
    <p>Create Manager security, with a “Manager registration” page with server side validation requiring a unique username and a password rule,
        and store this information in a table. Create a “Manager Log-in” page to use the stored data, and control access to the manager web pages.
        Ensure the manager web page cannot be entered directly using a URL. Create a “Manager Log-out” page. Provide a ‘log-out’ link on the manager page if ‘logged in’.</p>
    <ul>
        <li>It creates a security layer between webpage and user. Only a manager or a person registered can access the manager page. There's a registration form linked to login page.
            It uses a library called 'password compact' because PHP installed on mercury server does not support password hash function. Two functions from library were used. One being
            'password_hash' and other being 'password_verify'. Password_hash creates an encrypted password and stores it in the user table. Password_verify decrypts password entered and
            compares it to stored password on the database. It further uses session to ensure if page is logged in or logged out.</li>
        <li> <a href="login.php">Click here to view Log in page.</a></li>
        <li><a href="register.php">Click here to view register page.</a> </li>
        <li>Researched online but I didn't take help from any particular resource. Password compact library used.</li>
    </ul>
    <img src="images/php_enhancement1.png" alt="enhancement code" class="enhancement-pics"><br>
    <img src="images/php_enhancement2.png" alt="enhancement code" class="enhancement-pics">
</section>

<section>
    <h2>PHP Enhancement #2</h2>
    <p>Provide a number of more advanced Manager reports based on compound queries; Most popular product, total sale, average cost of order.</p>
    <ul>
        <li>Use SQL queries to implement it. It displays all the data in form of a table. Used a few arithmetic functions to calculate average and sum.</li>
        <li> <a href="manager.php">Click here to view enhancement.</a></li>
        <li>No external help taken. No library used.</li>
    </ul>
    <img src="images/php_enhan2.png" alt="enhancement code" class="enhancement-pics"><br>
</section>
<?php
include 'includes/footer.inc';
?>
</body>
</html>