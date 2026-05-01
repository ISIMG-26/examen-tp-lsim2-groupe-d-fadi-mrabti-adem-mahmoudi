<?php
session_start();

// fermer la session de l'utilisateur
session_destroy();

header("Location: index.php");
?>
