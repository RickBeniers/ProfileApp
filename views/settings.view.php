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
        <h2><?php echo current_username($conn)?>'s settings</h2>
        <form action="../functions/editUser.php" method="post">
            <label for="first_name">Current first name: <?php echo current_first_name($conn)?></label><input type="text" name="first_name" id="first_name" class="settingsField" placeholder="First name">
            <input type="submit" name="edit_first" id="edit_first" value="Change">
        </form>
        <form action="../functions/editUser.php" method="post">
            <label for="insertion">Current insertion: <?php echo current_insertion($conn)?></label><input type="text" name="insertion" id="insertion" class="settingsField" placeholder="Insertion">
            <input type="submit" name="edit_insertion" id="edit_insertion" value="Change">
        </form>
        <form action="../functions/editUser.php" method="post">
            <label for="last_name">Current last name: <?php echo current_last_name($conn)?></label><input type="text" name="last_name" id="last_name" class="settingsField" placeholder="Last name">
            <input type="submit" name="edit_last" id="edit_last" value="Change">
        </form>
        <form action="../functions/editUser.php" method="post">
            <label for="username">Current username: <?php echo current_username($conn)?></label><input type="text" name="username" id="username" class="settingsField" placeholder="Username">
            <input type="submit" name="edit_username" id="edit_username" value="Change">
        </form>
        <form action="../functions/editUser.php" method="post">
            <label for="e-mail">Current e-mail: <?php echo current_email($conn)?></label><input type="email" name="e-mail" id="e-mail" class="settingsField" placeholder="E-mail">
            <input type="submit" name="edit_email" id="edit_email" value="Change">
        </form>
        <form action="../functions/editUser.php" method="post">
            <label for="date_of_birth">Current date of birth: <?php echo current_DOB($conn)?></label><input type="date" name="date_of_birth" id="date_of_birth" class="settingsField" value="2000-01-01" placeholder="">
            <input type="submit" name="edit_DOB" id="edit_DOB" value="Change">
        </form>
        <a href="../controllers/passSettings.php">Edit Password</a>
    </div>
</main>

<footer>
    <?php include '../views/partials/footer.php' ?>
</footer>

</body>
</html>
