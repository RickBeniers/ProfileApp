<?php

if (isset($_GET['id'])) {
    $gebruikerId = $_GET['id'];

    // Verbinding maken met de database (herhaal de verbindingscode hier)

    // Query om de gebruiker te ontgrendelen
    $query = "UPDATE users SET is_deleted = 0 WHERE id = $gebruikerId";
    if ($mysqli->query($query)) {
        header('Location: admin.php');
    } else {
        echo 'Fout bij ontgrendelen van de gebruiker: ' . $mysqli->error;
    }

    $mysqli->close();
} else {
    echo 'Geen gebruiker geselecteerd voor ontgrendelen.';
}
