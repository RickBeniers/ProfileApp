<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verwerk de gebruikersgegevens
    $firstname = $_POST['firstname'];
    // Verwerk andere velden hier

    // Verwerk de dynamische velden, bijvoorbeeld hobby's
    $hobbies = $_POST['hobby'];
    // Loop door de hobby's en sla ze op in de database

    $workExperiences = $_POST['job_title'];
    // Loop door de werkervaringen en sla ze op in de database

    $schoolAchievements = $_POST['achievement_name'];
    // Loop door de schoolprestaties en sla ze op in de database

    $lessons = $_POST['lesson_name'];
    // Loop door de lessen en sla ze op in de database

    // Voeg code toe om de gegevens in de database bij te werken

    header("Location: portfolio.php");
    exit();
}?>
// Deze code is niet relevant
