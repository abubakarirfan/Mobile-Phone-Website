<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Registration form">
    <meta name="keywords" content="PHP,MySQL">
    <title>Manager Register Form</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
</head>
<body>
<?php
include "includes/header.inc";
include "includes/menu.inc";
?>
<form method="post" name="signup-form">
    <section class="form-element">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" pattern="[a-zA-Z0-9]+" required />
    </section>
    <section class="form-element">
        <label for="email_manager">Email</label>
        <input type="email" id="email_manager" name="email_manager" required />
    </section>
    <section class="form-element">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
    </section>
    <input type="submit" name="register" value="Register">
</form>
<?php
require_once('settings.php');
include 'password.php';
$conn = @mysqli_connect($host,
    $user,
    $pwd,
    $sql_db
);

if (!$conn){
    echo "<p>Database connection failure</p>";
} else{
    session_start();
    if (isset($_POST['register'])) {
        $username = $_POST['username'];
        $email = $_POST['email_manager'];
        $password = $_POST['password'];

        $password_hash = password_hash($password,PASSWORD_BCRYPT);

        $query = "SELECT * FROM users WHERE email= '$email'";
        $result = mysqli_query($conn, $query);

        if (!$result){
            echo "<p>Error 404: Registration process can not succeed.</p>";
        } else{
            $row = @mysqli_fetch_assoc($result);

            if (mysqli_num_rows($result) > 0) {
                echo '<p class="error">The email address is already registered!</p>';
            } else{
                $query_two= "INSERT INTO users(username,password,email) VALUES ('$username','$password_hash','$email')";
                $result_two = mysqli_query($conn, $query_two);

                if ($result_two) {
                    echo '<p class="success">Your registration was successful!</p>';
                } else {
                    echo '<p class="error">Something went wrong!</p>';
                }
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }
}
?>

</body>
</html>