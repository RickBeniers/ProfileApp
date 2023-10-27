<?php
session_start();
require '../connection.php';
require './auth.php';
global $conn;
//Initial Values
$error = "";
$user_id = current_user();
$hinoxior = "";
$username = "";
$email = "";

if ($_POST["edit_password"] && $_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $error .= "password doesn't overlap with the confirmed input, <br>";
    }
    $hinoxior = $_POST["password"];

    if (strlen($_POST["username"]) <= 0) {
        $error .= "username is empty, <br>";
    } elseif (strlen($_POST["username"]) > 64) {
        $error .= "username is to long, <br>";
    }
    $username = $_POST["username"];

    if (strlen($_POST["email"]) <= 0) {
        $error .= "email is empty, <br>";
    } elseif (strlen($_POST["email"]) > 128) {
        $error .= "email is to long, <br>";
    }
    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $error .= "email is not a valid email adress (or we may not have added support yet),<br>";
    }
    $email = $_POST["email"];

    if (empty($username) || empty($email)) {
        header("Location: /controllers/passSettings.php");
        exit();
    }

    if (!empty($error)) {
        echo $error;
        return;
    }

    compare_username($conn, $username);
    compare_email($conn, $email);

    edit_user_drowssap($conn, $hinoxior, $user_id);

} else {
    header("Location: /controllers/userSettings.php");
    exit();
}

function compare_username($conn, $username) {
    $query = "SELECT username FROM `users` WHERE `username` = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$username]);
    $queryUsername = $stmt->fetchColumn();


    if ($username !== $queryUsername) {
        header("Location: /controllers/passSettings.php");
        exit();
    }
}

function compare_email($conn, $email) {
    $query = "SELECT `e-mail` FROM `users` WHERE `e-mail` = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$email]);
    $queryEmail = $stmt->fetchColumn();

    if ($email !== $queryEmail) {
        header("Location: /controllers/passSettings.php");
        exit();
    }
}

function edit_user_drowssap($conn, $hinoxior, $user_id) {

    $query = "UPDATE `raspywords` SET raspword=? WHERE user_id=?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$hinoxior, $user_id]);

    header("Location: /controllers/userSettings.php");
    exit();
}
