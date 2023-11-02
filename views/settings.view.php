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
    <div class="wrapper">
        <h2><?php echo current_username($conn)?>'s settings</h2>
        <div class="settingsContainer">
            <form action="../functions/editUser.php" method="post">
                <label for="first_name">Current first name: <?php echo current_first_name($conn)?></label>
                <div class="editInputFields">
                    <input type="text" name="first_name" id="first_name" class="settingsField" placeholder="First name" required>
                    <input onclick="return confirm('Are you sure you wish to edit your first name?')" type="submit" name="edit_first" id="edit_first" class="editButton" value="Change">
                <!--<div id="confirmModal"></div>-->
                </div>
            </form>
            <form action="../functions/editUser.php" method="post">
                <label for="insertion">Current insertion: <?php echo current_insertion($conn)?></label>
                <div class="editInputFields">
                    <input type="text" name="insertion" id="insertion" class="settingsField" placeholder="Insertion">
                    <input onclick="return confirm('Are you sure you wish to edit your name Insertion?')" type="submit" name="edit_insertion" id="edit_insertion" class="editButton" value="Change">
                </div>
            </form>
            <form action="../functions/editUser.php" method="post">
                <label for="last_name">Current last name: <?php echo current_last_name($conn)?></label>
                <div class="editInputFields">
                    <input type="text" name="last_name" id="last_name" class="settingsField" placeholder="Last name" required>
                    <input onclick="return confirm('Are you sure you wish to edit your last name?')" type="submit" name="edit_last" id="edit_last" class="editButton" value="Change">
                </div>
            </form>
            <form action="../functions/editUser.php" method="post">
                <label for="username">Current username: <?php echo current_username($conn)?></label>
                <div class="editInputFields">
                    <input type="text" name="username" id="username" class="settingsField" placeholder="Username" required>
                    <input onclick="return confirm('Are you sure you wish to edit your username?')" type="submit" name="edit_username" id="edit_username" class="editButton" value="Change">
                </div>
            </form>
            <form action="../functions/editUser.php" method="post">
                <label for="e-mail">Current e-mail: <?php echo current_email($conn)?></label>
                <div class="editInputFields">
                    <input type="email" name="e-mail" id="e-mail" class="settingsField" placeholder="E-mail" required>
                    <input onclick="return return_confirm('are you sure you wish to edit your e-mail?', 'ARE YOU REALLY SURE YOU WISH TO EDIT YOUR EMAIL?')" type="submit" name="edit_email" id="edit_email" class="editButton" value="Change">
                </div>
            </form>
            <form action="../functions/editUser.php" method="post">
                <label for="date_of_birth">Current date of birth: <?php echo current_DOB($conn)?></label>
                <div class="editInputFields">
                    <input type="date" name="date_of_birth" id="date_of_birth" class="settingsField" value="2000-01-01" placeholder="" required>
                    <input onclick="return confirm('Are you sure you wish to edit your date of birth?')" type="submit" name="edit_DOB" id="edit_DOB" class="editButton" value="Change">
                </div>
            </form>
        </div>

        <div class="linkButtonContainer">
            <a class="editPassButton" href="../controllers/passSettings.php">Edit Password</a>
        </div>
    </div>
</main>

<footer>
    <?php include '../views/partials/footer.php' ?>
</footer>

</body>
<script src="../functions/dangerConfirm.js"></script>
</html>
