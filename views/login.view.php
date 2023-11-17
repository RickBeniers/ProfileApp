<?php
session_start();
require '../functions/auth.php';
if (current_user() == null) {
    $_SESSION['loggedin'] = false;
} else {
    $_SESSION['loggedin'] = true;
}
/*if($_SESSION["loggedin"] == true) {
    header("Location: /index.view.php");
    exit();
}*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import the header, footer and this page's css -->
    <link rel="stylesheet" href="../stylesheets/nav.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <title>Login Page</title>
</head>
<body>
<header>
    <?php include '../views/partials/nav.php'; ?>
</header>

<main>
    <div class="login-container">
        <h2>Login</h2>
        <form action="../functions/loginAccount.php" method="post">
            <label for="usernameOrEmail">Enter username or email</label>
            <input type="text" name="usernameOrEmail" id="usernameOrEmail" class="inputFields" placeholder="Username or Email" value="" required>
            <label for="password">Enter password</label>
            <input type="password" name="password" id="password" class="inputFields" placeholder="Password" value="" required>
            <p>Register your account if you have not registered yet.</p>
            <input type="submit" name="login" id="login" class="loginButton" value="Login">
            <a href="newAccount.view.php"><button type="button" class="registerButton">Register</button></a>
        </form>
    </div>
</main>

<footer>
    <?php include '../views/partials/footer.php' ?>
</footer>

</body>
</html>
