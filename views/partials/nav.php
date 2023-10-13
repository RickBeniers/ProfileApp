<?php
session_start();
$_SESSION['loggedin'] = false;
?>

<nav class="navbar">
    <div class="homeButton">
        <a href="./">Home</a>
    </div>
    <div class="navButtons">
        <?php if (!$_SESSION['loggedin']) {
            echo '<a id="registerButton" class="navButton" href="./register">Register</a>
                <a id="loginButton" class="navButton" href="./login">Login</a>';
        } else {
            echo '<a id="myPortfolioButton" class="navButton" href="./myPortfolio">My Portfolio</a>
                <a id="logoutButton" class="navButton" href="./logout">Logout</a>';
        } ?>
    </div>
</nav>
