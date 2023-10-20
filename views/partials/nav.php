<nav class="navbar">
    <div class="pageTitle">
        <!--Replace the Placeholder text with the actual page title-->
        <h3>Placeholder</h3>
    </div>
    <div class="navButtons">
        <a id="homeButton" class="navButton" href="../index.view.php">Home</a>
        <?php if (!$_SESSION['loggedin']) {
            echo '<a id="registerButton" class="navButton" href="../controllers/newAccount.php">Register</a>
                <a id="loginButton" class="navButton" href="../controllers/login.php">Login</a>';

        } else {
            echo '<a id="myPortfolioButton" class="navButton" href="../controllers/myPortfolio.php">My Portfolio</a>
                <a id="logoutButton" class="navButton" href="../controllers/logout.php">Logout</a>';
        } ?>
    </div>
</nav>
