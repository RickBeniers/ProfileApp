<?php
session_start();

// Controleer of de gebruiker is ingelogd

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verwerk het formulier voor het bijwerken van de gebruikersgegevens
    $firstname = $_POST['firstname'];
    // Verwerk andere velden hier

    // Upload profielfoto
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "profile_images/";
        $target_file = $target_dir . basename($_FILES['profile_image']['name']);
        move_uploaded_file($_FILES['profile_image']['tmp_name'], $target_file);
        // Sla het pad naar de profielfoto op in de database
    }

    // Update de database met de nieuwe gegevens
    // Voeg code toe om de andere gegevens in de database bij te werken

    header("Location: portfolio.php");
    exit();
}
?>
