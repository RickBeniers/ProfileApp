<?php
session_start();
require '../functions/auth.php';
require_login();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/nav.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="../stylesheets/settings.css">
    <title>Settings - ProfielPlus</title>
</head>
<body>
<header>
    <?php include '../views/partials/nav.php'; ?>
</header>

<main>
    <div class="settingsContainer">
        <h2>Edit password</h2>
        <b>A field with a * is Required</b>
        <form action="../functions/editUserPass.php" method="post">
            <input type="password" name="password" id="password" class="settingsField" placeholder="Enter your new password*" required>
            <input type="password" name="confirm_password" id="confirm_password" class="settingsField" placeholder="Re-enter your new password*" required>
            <input type="email" name="email" id="email" class="settingsField" placeholder="Enter your E-mail*" required>
            <input type="text" name="username" id="username" class="settingsField" placeholder="Enter your Username*" required>
            <input type="submit" name="edit_password" id="edit_password" value="Edit Password">
        </form>
    </div>
</main>

<footer>
    <?php include '../views/partials/footer.php' ?>
</footer>

</body>
</html>

