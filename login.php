<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Registration form">
    <meta name="keywords" content="PHP,MySQL">
    <title>Manager Login</title>
    <link rel="stylesheet" href="styles/styles.css" type="text/css" />
</head>
<body>
<?php
include "includes/header.inc";
include "includes/menu.inc";
?>

<form method="post" action="" name="signin-form">
    <div class="form-element">
        <label>Username</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Password</label>
        <input type="password" name="password" required />
    </div>
    <input type="submit" name="login" value="Login">
</form>
<br>
<a href="register.php">Click here to register</a>
<?php
session_start();
include 'password.php';
include('settings.php');
    $conn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    );
if (!$conn){
    echo "<p>Database connection failure</p>";
} else{
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users WHERE username= '$username'";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            echo '<p class="error">Could not login.</p>';
        } else {
            $row = mysqli_fetch_assoc($result);
            $check = password_verify($password,$row['password']);

            if ($check) {
                $_SESSION['user_id'] = $row['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
                header('Location: manager.php');
            } else {
                echo '<p class="error">Username and password combination is wrong!</p>';
            }
            mysqli_free_result($result);
        }
        mysqli_close($conn);
    }
}
?>

</body>
</html>
