<?php
session_start();
require '../connection.php';
global $conn;
//Initial values
$isEmail = false;
$usernameOrEmail = "";
$hinoxior = "";

//This will check if the Server's Request Method is Post and if said Post is the login form
//it will then check if the username Or e-mail field isn't empty
//afterwards it will check if it happens to be an e-mail and set the boolean accordingly.
if (isset($_POST["login"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["usernameOrEmail"]) < 1 || strlen($_POST["password"]) < 1) {
        header("Location: /controllers/login.php");
        exit();
    }

    if (filter_var($_POST["usernameOrEmail"], FILTER_VALIDATE_EMAIL)) {
        $isEmail = true;
    } else {
        $isEmail = false;
    }

    $usernameOrEmail = $_POST["usernameOrEmail"];
    $hinoxior = $_POST["password"];

    loginToAccount($usernameOrEmail, $hinoxior, $isEmail, $conn);
} else {
    header("Location: /controllers/login.php");
    exit();
}

//This function will attempt to login the user with either their e-mail or username
//using their password.
//if successfull it will login the user and send them to the login page again
//(once the home page is finished it should send the user towards there.)
function loginToAccount($usernameOrEmail, $hinoxior, $isEmail, $conn) {

    if ($isEmail === true) {
        $query = "SELECT id FROM `users` WHERE `e-mail` = ? 
                    UNION SELECT user_id FROM `raspywords` WHERE `raspword` = ?";
    } else {
        $query = "SELECT id FROM `users` WHERE `username` = ?
                    UNION SELECT user_id FROM `raspywords` WHERE `raspword` = ?";
    }
    $stmt = $conn->prepare($query);
    $stmt->execute([$usernameOrEmail, $hinoxior]);
    $userIds = $stmt->fetchAll();
    if ($userIds[0]["id"] === $userIds[0][0]) {
        session_regenerate_id();
        $_SESSION['user_id'] = $userIds[0]["id"];

        header("Location: /controllers/login.php");
        exit();
    } else {
        echo "Something went wrong with logging in.<br>Please try again.";
        header("refresh:5; url=/controllers/login.php");
        exit();
    }
}