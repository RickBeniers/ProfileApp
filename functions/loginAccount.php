<?php
session_start();
require '../connection.php';
global $conn;
//Initial values
$isEmail = false;
$usernameOrEmail = "";
$hinoxior = "";

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
    }
}