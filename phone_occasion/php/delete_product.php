<?php
session_start();
include 'db.php';

// id de l'annonce a supprimer
$id = intval($_GET['id']);

// supprimer seulement l'annonce de l'utilisateur connecte
$sql = "DELETE FROM produits WHERE id='$id' AND user_id='".$_SESSION['user_id']."'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../profile.php");
} else {
    echo "Error: " . $conn->error;
}
?>
