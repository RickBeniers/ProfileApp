<nav class="navbar">
    <div class="pageTitle">
        <!--Replace the Placeholder text with the actual page title-->
        <h3>Placeholder</h3>
    </div>
    <!-- This contains the navButtons that lead to various parts of the website -->
    <div class="navButtons">
        <!-- Homebutton -->
        <a id="homeButton" class="navButton" href="../views/index.view.php">Home</a>
        <?php
        /*
         * when not logged in display the register and login buttons
         * if logged in display the My portfolio, settings and logout buttons
        */
        if (!$_SESSION['loggedin']) {
            echo '<a id="registerButton" class="navButton" href="../controllers/newAccount.php">Register</a>
                <a id="loginButton" class="navButton" href="../controllers/login.php">Login</a>';

        } else {
            //if the user is an Administrator (Beheerder) then show the admin panel button
            if (current_user_role($conn) == 2) {
                echo '<a id="adminPanelButton" class="navButton" href="../views/admin.php">Admin Panel</a>';
            }
            echo '<a id="myPortfolioButton" class="navButton" href="../controllers/myPortfolio.php">My Portfolio</a>
                <a id="userSettingsButton" class="navButton" href="../controllers/userSettings.php">Settings</a>
                <a id="logoutButton" class="navButton" href="../controllers/logout.php">Logout</a>';
        } ?>
    </div>
</nav>
