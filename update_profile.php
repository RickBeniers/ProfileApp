
<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verbind met de database (vervang de databasegegevens door de juiste gegevens).
    $conn = new mysqli("localhost", "username", "password", "database");

    if ($conn->connect_error) {
        die("Databaseverbinding mislukt: " . $conn->connect_error);
    }

    $user_id = $_SESSION['user_id'];
    $portfolio_info = $_POST['portfolio_info'];

    // Bijwerken van de portfolio-informatie in de database.
    $sql = "UPDATE users SET portfolio_info = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $portfolio_info, $user_id);

    if ($stmt->execute()) {
        header("Location: profile.php");
    } else {
        echo "Fout bij het bijwerken van de portfolio-informatie.";
    }

    $stmt->close();
    $conn->close();
}
?>