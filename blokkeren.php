<?php
if (isset($_GET['id'])) {
    $gebruikerId = $_GET['id'];

    // Verbinding maken met de database (herhaal de verbindingscode hier)
    $dbHost = 'localhost'; // De host van je database
    $dbGebruikersnaam = 'username'; // Je database gebruikersnaam
    $dbWachtwoord = 'raspywords'; // Je database wachtwoord
    $dbNaam = 'profielplus'; // Naam van je database
    $mysqli = new mysqli($dbHost, $dbGebruikersnaam, $dbWachtwoord, $dbNaam);

    if ($mysqli->connect_error) {
        die('Verbindingsfout: ' . $mysqli->connect_error);
    }

    // Query om de gebruiker te blokkeren
    $query = "UPDATE users SET is_deleted = 1 WHERE id = $gebruikerId";
    if ($mysqli->query($query)) {
        header('Location: admin.php');
    } else {
        echo 'Fout bij blokkeren van de gebruiker: ' . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo 'Geen gebruiker geselecteerd voor blokkeren.';
}
?>
