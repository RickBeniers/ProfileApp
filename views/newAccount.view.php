<?php
session_start();
require '../functions/auth.php';
if (current_user() == null) {
    $_SESSION['loggedin'] = false;
} else {
    $_SESSION['loggedin'] = true;
}
if($_SESSION["loggedin"] == true) {
    header("Location: ../views/index.view.php");
    exit();
}
?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../stylesheets/nav.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="../stylesheets/register.css">
    <title>Register - ProfielPlus</title>
</head>
<body>
    <header>
        <?php require 'partials/nav.php'; ?>
    </header>
    <main>
        <div class="registerContainer">
            <div class="centerText">
                <h1>Create your Profielplus account</h1>
                <p>a * inside of the input fields below means that it's required.</p>
                <b>The date of birth input field is also required (it's the one with a calender icon)</b>
            </div>
            <form action="../functions/register.php" method="post"  class="registerForm">
                <input type="text" placeholder="Enter your first name. *" name="first_name" id="first_name" class="registerField" value="" required>
                <input type="text" placeholder="Enter your name's insertion." name="insertion" id="insertion" class="registerField" value="">
                <input type="text" placeholder="Enter your last name. *" name="last_name" id="last_name" class="registerField" value="" required>
                <input type="text" placeholder="Enter your unique username. *" name="username" id="username" class="registerField" value="" required>
                <input type="email" placeholder="Enter your email adress. *" name="e-mail" id="e-mail" class="registerField" value="" required>
                <input type="password" placeholder="Enter your password. *" name="password" id="password" class="registerField" value="" required>
                <input type="password" placeholder="Re-enter your password. *" name="confirm_password" id="confirm_password" class="registerField" value="" required>
                <input type="date" placeholder="Please enter your date of birth. *" name="date_of_birth" id="date_of_birth" class="registerField" value="2000-01-01" required>
                <input type="submit" name="create_account" id="create_account" class="registerButton" value="Create Account">
            </form>
        </div>
    </main>
    <footer>
        <?php require 'partials/footer.php';?>
    </footer>
</body>
</html>
