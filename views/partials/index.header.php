<?php
echo '
<html>
    <head>
        <title></title>
        <meta>
        <link rel="stylesheet" href="../stylesheets/index.viewStyling.css?ver=3">
    </head>
    <body>
        <header>
            <!-- Div below contains the header on the top of the page.-->
            <div class="indexHeader">
                <div class="pageTitle">
                    <h2 id="hTagTitle">Page title</h2>
                </div>
                <!-- --Div below contains buttons in the header.-->
                <div class="pageButtons flex-container">
                    <a href="../controllers/newAccount.php"><div class="button grid-item">Register</div></a>
                    <a href="../controllers/login.php"><div class="button grid-item">Login</div></a>
                </div>
            </div>
        </header>';
