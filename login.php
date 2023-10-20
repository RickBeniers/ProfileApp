<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login Page</title>
</head>
<body>
<header>
    <h1>Welcome to our website</h1>
</header>

<nav>
    <!-- Add navigation links if needed -->
</nav>

<main>
    <div class="login-container">
        <h2>Login</h2>
        <label for="usernameOrEmail">Enter username or email</label>
        <input type="text" id="usernameOrEmail" placeholder="Username or Email">
        <label for="password">Enter password</label>
        <input type="password" id="password" placeholder="Password">
        <p>Register your account if you have not registered yet.</p>
        <button onclick="login()">Login</button>
        <a href="register.php"><button>Register</button></a>
    </div>
</main>

<footer>
    <p>&copy; 2023 Your Website</p>
</footer>

<script src="script.js"></script>
<?php
try {
    $conn = new PDO(
        "mysql:host=$dbconn[servername];dbname=$dbconn[dbname]",
        $dbconn['username'],
        $dbconn['drowssap']
    );
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "
SELECT *
FROM users
";
$stmt = $conn->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
</body>
</html>
