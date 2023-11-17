<?php
session_start();
require '../functions/auth.php';
//Checks if the user is logged in or not
if (current_user() == null) {
    $_SESSION['loggedin'] = false;
} else {
    $_SESSION['loggedin'] = true;
}
//If the user is logged in send them towards the index page
if($_SESSION["loggedin"] == true) {
    header("Location: /index.view.php");
    exit();
}
?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Import the header, footer and this page's css -->
    <link rel="stylesheet" href="../stylesheets/nav.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="../stylesheets/altLogin.css">
    <title>Login - ProfielPlus</title>
</head>
<body>
<header>
    <!-- Navbar/Header -->
    <?php require 'partials/nav.php'; ?>
</header>
<main>
    <!-- The Page's container -->
    <div class="loginContainer">
        <!-- Centers the text which explains some stuff about this page -->
        <div class="centerText">
            <h1>Login</h1>
            <p>a * inside of the input fields below means that it's required.</p>
            <b>If you have yet to make an account. do so by pressing the register button!</b>
        </div>
        <!-- This form logs you in if you input the correct credentials to your account -->
        <form action="../functions/loginAccount.php" method="post" class="loginForm">
            <input type="text" placeholder="Enter your email or username. *" name="usernameOrEmail" id="usernameOrEmail" class="loginField" value="" required>
            <input type="password" placeholder="Enter your password. *" name="password" id="password" class="loginField" value="" required>
            <div>
                <input type="submit" name="login" id="login" class="loginButton" value="Login">
                <a href="newAccount.view.php"><input type="button" class="registerButton" value="Register"></a>
            </div>
        </form>
    </div>
</main>
<footer>
    <!-- Footer -->
    <?php require 'partials/footer.php';?>
</footer>
</body>
</html>

