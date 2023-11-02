<?php
session_start();
require '../connection.php';
require '../functions/auth.php';
$userId = current_user();
global $conn;
//Initial Values
$error = "";
$updatedColumn = "";
$first_name = "";
$insertion = "";
$last_name = "";
$username = "";
$email = "";
$DOB = date_create();
$possibleVariables = [$first_name, $insertion, $last_name, $username, $email, $DOB];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["edit_first"])) {
        if (strlen($_POST["first_name"]) <= 0) {
            $error .= "first name is empty, <br>";
        } elseif (strlen($_POST["first_name"]) > 64) {
            $error .= "first name is to long, <br>";
        }
        $updatedColumn = "first_name";
        $possibleVariables[0] = $_POST["first_name"];
    }

    if (isset($_POST["edit_insertion"])) {
        if (strlen($_POST["insertion"]) > 16) {
            $error .= "insertion is to long, <br>";
        }
        $updatedColumn = "insertion";
        $possibleVariables[1] = $_POST["insertion"];
    }

    if (isset($_POST["edit_last"])) {
        if (strlen($_POST["last_name"]) <= 0) {
            $error .= "last name is empty, <br>";
        } elseif (strlen($_POST["last_name"]) > 64) {
            $error .= "last name is to long, <br>";
        }
        $updatedColumn = "last_name";
        $possibleVariables[2] = $_POST["last_name"];
    }

    if (isset($_POST["edit_username"])) {
        if (strlen($_POST["username"]) <= 0) {
            $error .= "username is empty, <br>";
        } elseif (strlen($_POST["username"]) > 64) {
            $error .= "username is to long, <br>";
        }
        $updatedColumn = "username";
        $possibleVariables[3] = $_POST["username"];
    }

    if (isset($_POST["edit_email"])) {
        if (strlen($_POST["e-mail"]) <= 0) {
            $error .= "email is empty, <br>";
        } elseif (strlen($_POST["e-mail"]) > 128) {
            $error .= "email is to long, <br>";
        }
        if (!filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)) {
            $error .= "email is not a valid email adress (or we may not have added support yet),<br>";
        }
        $updatedColumn = "`e-mail`";
        $possibleVariables[4] = $_POST["e-mail"];
    }

    if (isset($_POST["edit_DOB"])) {
        if (empty($_POST["date_of_birth"])) {
            $error .= "date of birth has not been filled, <br>";
        }
        $updatedColumn = "date_of_birth";
        $possibleVariables[5] = $_POST["date_of_birth"];
    }

    if (empty($first_name) && empty($insertion) && empty($last_name) && empty($username) && empty($email) && $DOB == date_create()) {
        header("Location: /controllers/userSettings.php");
        exit();
    }

    error_check($error);

    check_if_data_is_unique($conn, $updatedColumn, $possibleVariables, $userId, $error);

    edit_user_data($conn, $updatedColumn, $possibleVariables, $userId);

} else {
    header("Location: /controllers/userSettings.php");
    exit();
}

function check_if_data_is_unique($conn, $updatedColumn, $possibleVariables, $userId, $error) {
    if ($updatedColumn == 'username') {
        $query = "SELECT username FROM `users`";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $usernames = $stmt->fetchAll();
        //die(var_dump($usernames));
        for ($x = 0; $x < count($usernames); $x++) {
            if ($possibleVariables[3] === $usernames[$x]["username"]) {
                $error .= "This username is already taken";
            }
        }
    }
    if ($updatedColumn == '`e-mail`') {
        $query = "SELECT `e-mail` FROM `users`";

        $stmt = $conn->prepare($query);
        $stmt->execute();
        $emails = $stmt->fetchAll();

        for ($x = 0; $x < count($emails); $x++) {
            if ($possibleVariables[3] == $emails[$x][0]) {
                $error .= "This e-mail is already taken";
            }
        }
    }

    error_check($error);
}

function error_check($error) {
    if (!empty($error)) {
        echo $error;
        header("refresh:5;url= /controllers/userSettings.php");
        exit();
    }
}

function edit_user_data($conn, $updatedColumn, $possibleVariables, $userId) {
    $updateVariable = "";
    for ($x = 0; $x < count($possibleVariables); $x++) {
        if (empty($possibleVariables[1]) && $updatedColumn == 'insertion') {
            $updateVariable = "";
            break;
        }
        if (!empty($possibleVariables[$x])) {
            $updateVariable = $possibleVariables[$x];
            break;
        }
    }
    $query = "UPDATE `users` SET $updatedColumn = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$updateVariable, $userId]);

    header("Location: /controllers/userSettings.php");
    exit();
}