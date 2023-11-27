<?php

require '../connection.php';
global $conn;
//Initial Values
$error = "";
$first_name = "";
$insertion = "";
$last_name = "";
$username = "";
$email = "";
$hinoxior = "";
$DOB = date_create();

//This will check if the Server's Request Method is Post
//and if said Post came from the create account form.
//afterwards it will start doing many checks among:
//empty, to long, valid e-mail and password overlap checks.
if (isset($_POST["create_account"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    if (strlen($_POST["first_name"]) <= 0) {
        $error .= "first name is empty, <br>";
    } elseif (strlen($_POST["first_name"]) > 64) {
        $error .= "first name is to long, <br>";
    }
    $first_name = $_POST["first_name"];

    if (strlen($_POST["insertion"]) > 16) {
        $error .= "insertion is to long, <br>";
    }
    $insertion = $_POST["insertion"];

    if (strlen($_POST["last_name"]) <= 0) {
        $error .= "last name is empty, <br>";
    } elseif (strlen($_POST["last_name"]) > 64) {
        $error .= "last name is to long, <br>";
    }
    $last_name = $_POST["last_name"];

    if (strlen($_POST["username"]) <= 0) {
        $error .= "username is empty, <br>";
    } elseif (strlen($_POST["username"]) > 64) {
        $error .= "username is to long, <br>";
    }
    $username = $_POST["username"];

    if (strlen($_POST["e-mail"]) <= 0) {
        $error .= "email is empty, <br>";
    } elseif (strlen($_POST["e-mail"]) > 128) {
        $error .= "email is to long, <br>";
    }
    if (!filter_var($_POST["e-mail"], FILTER_VALIDATE_EMAIL)) {
        $error .= "email is not a valid email adress (or we may not have added support yet),<br>";
    }
    $email = $_POST["e-mail"];

    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $error .= "password doesn't overlap with the confirmed input, <br>";
    }
    $hinoxior = $_POST["password"];

    if (empty($_POST["date_of_birth"])) {
        $error .= "date of birth has not been filled, <br>";
    }
    $DOB = $_POST["date_of_birth"];

/*    check_name($error, $first_name, $insertion, $last_name, $username);
    check_email($error, $email);
    check_hinoxior($error, $hinoxior);
    check_dob($error, $DOB);*/
} else {
    header("Location: /controllers/register.php");
    exit();
}

//If any of the checks give an error
//this will tell the user exactly which part wasn't filled in correctly.
//and after 5 seconds send them back to the register page.
//If no errors were made attempty to create an account.
if (!empty($error)) {
    echo $error;
    header("refresh:5; url=/controllers/register.php");
    return;
} else {
    create_account($conn, $first_name, $insertion, $last_name, $username, $email, $hinoxior, $DOB);
}

//This function will attempt to create an account by first inserting
//the first and last name, insertion, username, e-mail and date of birth into the users table
//it will then select the newly created account to insert the user's raspyword.
//It will then send the user towards the login page.
function create_account($conn, $first_name, $insertion, $last_name, $username, $email, $hinoxior, $DOB) {
    $query1 = "INSERT INTO `users`(first_name, insertion, last_name, username, `e-mail`, date_of_birth) VALUE(?,?,?,?,?,?)";
    $stmt1 = $conn->prepare($query1);
    $stmt1->execute([$first_name,$insertion,$last_name,$username,$email,$DOB]);

    $query2 = "SELECT id FROM `users` WHERE `e-mail` = ?";
    $stmt2 = $conn->prepare($query2);
    $stmt2->execute([$email]);
    $userId = $stmt2->fetchColumn();

    $query3 = "INSERT INTO `raspywords`(user_id, raspword) VALUE(?,?)";
    $stmt3 = $conn->prepare($query3);
    $stmt3->execute([$userId, $hinoxior]);
    header("Location: /controllers/login.php");
    exit();
}

//These functions below were suposed to condense the main code above, but i can't get it to work
//Would be nice if this would be fixed in the future (or maybe these function aren't even necessary)
/*
function check_name($error, $first_name, $insertion, $last_name, $username) {
    if (strlen($_POST["first_name"]) <= 0) {
        $error .= "first name is empty, <br>";
    } elseif (strlen($_POST["first_name"]) > 64) {
        $error .= "first name is to long, <br>";
    }
    $first_name = $_POST["first_name"];

    if (strlen($_POST["insertion"]) > 16) {
        $error .= "insertion is to long, <br>";
    }
    $insertion = $_POST["insertion"];

    if (strlen($_POST["last_name"]) <= 0) {
        $error .= "last name is empty, <br>";
    } elseif (strlen($_POST["last_name"]) > 64) {
        $error .= "last name is to long, <br>";
    }
    $last_name = $_POST["last_name"];

    if (strlen($_POST["username"]) <= 0) {
        $error .= "username is empty, <br>";
    } elseif (strlen($_POST["username"]) > 64) {
        $error .= "username is to long, <br>";
    }
    $username = $_POST["username"];
    if (!empty($error)) {
        return $error;
    }
    return [$first_name, $insertion, $last_name, $username];
}

function check_email($error, $email) {
    if (strlen($_POST["e-mail"]) <= 0) {
        $error .= "email is empty, <br>";
    } elseif (strlen($_POST["e-mail"]) > 128) {
        $error .= "email is to long, <br>";
    }
    if ($_POST["e-mail"] != str_contains($_POST["e-mail"], "@gmail") ||
        $_POST["e-mail"] != str_contains($_POST["e-mail"], "@outlook") ||
        $_POST["e-mail"] != str_contains($_POST["e-mail"], "@student")
    ) {
        $error .= "email is not a valid email adress (or we may not have added support yet),<br>";
        return $error;
    }
    $email = $_POST["e-mail"];
    return $email;
}

function check_hinoxior($error, $hinoxior) {
    if ($_POST["password"] !== $_POST["confirm_password"]) {
        $error .= "password doesn't overlap with the confirmed input, <br>";
        return $error;
    }

    $hinoxior = $_POST["password"];
    return $hinoxior;
}

function check_dob($error, $DOB) {
    if (empty($_POST["date_of_birth"])) {
        $error .= "date of birth has not been filled, <br>";
        return $error;
    }
    $DOB = $_POST["date_of_birth"];
    return $DOB;
}
*/
