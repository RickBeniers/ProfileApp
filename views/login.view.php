<?php
session_start();
require '../functions/auth.php';
if (current_user() == null) {
    $_SESSION['loggedin'] = false;
} else {
    $_SESSION['loggedin'] = true;
}
/*if($_SESSION["loggedin"] == true) {
    header("Location: /index.view.php");
    exit();
}*/
?>

<!DOCTYPE html>
<!--HTML-structuur:

<!DOCTYPE html>: Geeft aan dat het document een HTML5-document is.
<html lang="en">: Het begin van het HTML-document, waarbij "en" staat voor Engels als de taal van de pagina. -->
<html lang="en">
<head>
    <!--Meta-tags:

Metatags bevatten informatie over het document zelf, zoals de tekenset, de viewport-instellingen en de compatibiliteit met Internet Explorer. -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import the header, footer and this page's css -->
    <!--Stylesheets:

Er zijn drie koppelingen naar externe CSS-bestanden (nav.css, footer.css, en login.css) die verantwoordelijk zijn voor de stijl van de navigatiebalk, de voettekst en het inlogformulier. -->
    <link rel="stylesheet" href="../stylesheets/nav.css">
    <link rel="stylesheet" href="../stylesheets/footer.css">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <!--Titel:

<title>Login Page</title>: Geeft de titel van de webpagina weer, die in de titelbalk van de browser verschijnt. -->
    <title>Login Page</title>
</head>
<body>
<!--Body-sectie:

<header>: Hier wordt PHP gebruikt om een navigatiebalk in te voegen met behulp van het nav.php-bestand.
<main>: De hoofdinhoud van de pagina, die het inlogformulier bevat. -->
<header>
    <?php include '../views/partials/nav.php'; ?>
</header>

<main>
    <div class="login-container">
        <h2>Login</h2>
        <!--Inlogformulier:

<form>: Het formulier voor het inloggen. Het actieattribuut verwijst naar loginAccount.php en de methode is ingesteld op POST.
<label>: Beschrijft de invoervelden.
<input>: De invoervelden voor gebruikersnaam/e-mail en wachtwoord.
<p>: Een paragraaf die aangeeft dat de gebruiker zich kan registreren als hij nog geen account heeft.
<input type="submit">: Een knop waarmee het formulier kan worden verzonden.
<a> en <button>: Een link naar de registratiepagina (newAccount.view.php). -->
        <form action="../functions/loginAccount.php" method="post">
            <label for="usernameOrEmail">Enter username or email</label>
            <input type="text" name="usernameOrEmail" id="usernameOrEmail" class="inputFields"
                   placeholder="Username or Email" value="" required>
            <label for="password">Enter password</label>
            <input type="password" name="password" id="password" class="inputFields" placeholder="Password" value=""
                   required>
            <p>Register your account if you have not registered yet.</p>
            <input type="submit" name="login" id="login" class="loginButton" value="Login">
            <a href="newAccount.view.php">
                <button type="button" class="registerButton">Register</button>
            </a>
        </form>
    </div>
</main>

<footer>
    <!--Footer:

<footer>: Hier wordt opnieuw PHP gebruikt om de voettekst in te voegen met behulp van het footer.php-bestand. -->
    <?php include '../views/partials/footer.php' ?>
</footer>

</body>
</html>
