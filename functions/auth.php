<?php

function is_user_logged_in(): bool {
    return isset($_SESSION["user_id"]);
}

function require_login(): void {
    if (!is_user_logged_in()) {
        header("Location: /controllers/login.php");
        exit();
    }
}

function logout(): void {
    if(is_user_logged_in()) {
        unset($_SESSION["user_id"]);
        session_destroy();
        header("Location: /controllers/login.php");
        exit();
    }
}

function current_user() {
    if (is_user_logged_in()) {
        return $_SESSION["user_id"];
    }
    return null;
}