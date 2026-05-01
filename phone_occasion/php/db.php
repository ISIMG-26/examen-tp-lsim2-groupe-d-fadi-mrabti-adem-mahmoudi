<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "phone_occasion_db";

// connexion avec la base de donnees
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erreur connexion: " . $conn->connect_error);
}
?>
