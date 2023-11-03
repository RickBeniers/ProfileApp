<?php
require '../connection.php';
global $conn;

//This function checks if you're logged in
function is_user_logged_in(): bool {
    return isset($_SESSION["user_id"]);
}

//If this function is called it will check if you are logged in
//if you aren't then it will direct you to the login page.
function require_login(): void {
    if (!is_user_logged_in()) {
        header("Location: /controllers/login.php");
        exit();
    }
}

//calling this function will logout the user
function logout(): void {
    if(is_user_logged_in()) {
        unset($_SESSION["user_id"]);
        session_destroy();
        header("Location: /controllers/login.php");
        exit();
    }
}

//Calling this function will return the current logged in user's ID
function current_user() {
    if (is_user_logged_in()) {
        return $_SESSION["user_id"];
    }
    return null;
}

//Calling this function will return the current logged in user's Role
function current_user_role($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT role_id FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $roleId = $stmt->fetchColumn();

        return $roleId;
    }
    return null;
}

//Calling this function will return the current logged in user's Username
function current_username($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT username FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $username = $stmt->fetchColumn();

        return $username;
    }
    return null;
}

//Calling this function will return the current logged in user's First name
function current_first_name($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT first_name FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $first_name = $stmt->fetchColumn();

        return $first_name;
    }
    return null;
}

//Calling this function will return the current logged in user's Insertion
function current_insertion($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT insertion FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $insertion = $stmt->fetchColumn();

        if ($insertion == null) {
            return "none";
        }
        return $insertion;
    }
    return null;
}

//Calling this function will return the current logged in user's Last name
function current_last_name($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT last_name FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $last_name = $stmt->fetchColumn();

        return $last_name;
    }
    return null;
}

//Calling this function will return the current logged in user's E-mail
function current_email($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT `e-mail` FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $email = $stmt->fetchColumn();

        return $email;
    }
    return null;
}

//Calling this function will return the current logged in user's Date of Birth
function current_DOB($conn) {
    if (is_user_logged_in()) {
        $query = "SELECT date_of_birth FROM `users` WHERE `id` = ?";
        $stmt = $conn->prepare($query);
        $stmt->execute([$_SESSION["user_id"]]);
        $DOB = $stmt->fetchColumn();

        return $DOB;
    }
    return null;
}