<nav class="navbar">
    <div class="pageTitle">
        <!--Replace the Placeholder text with the actual page title-->
        <h3>Placeholder</h3>
    </div>
    <div class="navButtons">
        <a id="homeButton" class="navButton" href="../views/index.view.php">Home</a>
        <?php if (!$_SESSION['loggedin']) {
            echo '<a id="registerButton" class="navButton" href="../controllers/newAccount.php">Register</a>
                <a id="loginButton" class="navButton" href="../controllers/login.php">Login</a>';

        } else {
            if (current_user_role($conn) == 2) {
                echo '<a id="adminPanelButton" class="navButton" href="../views/admin.php">Admin Panel</a>';
            }
            echo '<a id="myPortfolioButton" class="navButton" href="../controllers/myPortfolio.php">My Portfolio</a>
                <a id="userSettingsButton" class="navButton" href="../controllers/userSettings.php">Settings</a>
                <a id="logoutButton" class="navButton" href="../controllers/logout.php">Logout</a>';
        } ?>
    </div>
</nav>
