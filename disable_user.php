<?php
// Verbind met de database
$db = new mysqli('localhost', 'username', 'raspywords', 'profielplus');

// Controleer de verbinding
if ($db->connect_error) {
    die("Databaseverbinding is mislukt: " . $db->connect_error);
}

if (isset($_GET['usernaam'])) {
    $gebruikersnaam = $_GET['username'];

    // Query om een gebruiker uit te schakelen
    $query = "UPDATE user SET is_deleted = 1 WHERE username = '$gebruikersnaam'";
    $result = $db->query($query);

    if ($result) {
        echo "Gebruiker '$gebruikersnaam' is succesvol uitgeschakeld.";
    } else {
        echo "Er is een fout opgetreden bij het uitschakelen van de gebruiker.";
    }
}

// Sluit de databaseverbinding
$db->close();
?>


