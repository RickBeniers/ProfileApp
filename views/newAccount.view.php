<?php

?>

<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../stylesheets/nav.css">
    <link rel="stylesheet" href="../stylesheets/register.css">
    <title>Register - profileApp</title>
</head>
<body>
    <header>
        <?php require 'partials/nav.php'; ?>
    </header>
    <main>
        <form action="../functions/register.php" method="post"  class="registerForm">
            <input type="text" placeholder="Enter your first name." name="first_name" id="first_name" value="" required>
            <input type="text" placeholder="Enter your name's insertion." name="insertion" id="insertion" value="">
            <input type="text" placeholder="Enter your last name." name="last_name" id="last_name" value="" required>
            <input type="text" placeholder="Enter your unique username." name="username" id="username" value="" required>
            <input type="email" placeholder="Enter your email adress." name="e-mail" id="e-mail" value="" required>
            <input type="password" placeholder="Enter your password" name="password" id="password" value="" required>
            <input type="password" placeholder="Re-enter your password" name="confirm_password" id="confirm_password" value="" required>
            <input type="date" placeholder="Please enter your date of birth" name="date_of_birth" id="date_of_birth" value="" required>
            <input type="submit" name="create_account" id="create_account" value="Create Account">
        </form>
    </main>
    <footer>
        <p>&copy; Team PSR 2023</p>
    </footer>
</body>
</html>
