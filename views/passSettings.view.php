<?php
session_start();
require '../functions/auth.php';
//This function requires the user to be logged in or else they will be sent towards the login page
require_login();
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
    <link rel="stylesheet" href="../stylesheets/passSettings.css">
    <title>Settings - ProfielPlus</title>
</head>
<body>
<header>
    <!-- Navbar/Header -->
    <?php include '../views/partials/nav.php'; ?>
</header>

<main>
    <!-- The page's Container -->
    <div class="settingsContainer">
        <h2>Edit password</h2>
        <b>A field with a * is Required</b>
        <!-- This form edit's the currently logged in user's password after inputting the correct credentials -->
        <form action="../functions/editUserPass.php" method="post">
            <input type="password" name="password" id="password" class="settingsField" placeholder="Enter your new password*" required>
            <input type="password" name="confirm_password" id="confirm_password" class="settingsField" placeholder="Re-enter your new password*" required>
            <input type="email" name="email" id="email" class="settingsField" placeholder="Enter your E-mail*" required>
            <input type="text" name="username" id="username" class="settingsField" placeholder="Enter your Username*" required>
            <input onclick="return return_confirm('Are you sure you wish to edit your password?', 'ARE YOU REALLY SURE YOU WISH TO EDIT YOUR PASSWORD?')" type="submit" name="edit_password" id="edit_password" class="editButton" value="Edit Password">
        </form>
    </div>
</main>

<footer>
    <!-- Footer -->
    <?php include '../views/partials/footer.php' ?>
</footer>

</body>
<!-- Script that activates when changing your password -->
<script src="../functions/dangerConfirm.js"></script>
</html>

