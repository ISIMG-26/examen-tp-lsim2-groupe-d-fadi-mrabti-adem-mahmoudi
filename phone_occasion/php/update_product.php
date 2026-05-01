<?php
session_start();
include 'db.php';

// recuperer les donnees du formulaire de modification
$id = intval($_POST['id']);
$titre = mysqli_real_escape_string($conn, $_POST['titre']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$prix = mysqli_real_escape_string($conn, $_POST['prix']);
$marque = mysqli_real_escape_string($conn, $_POST['marque']);
$etat = mysqli_real_escape_string($conn, $_POST['etat']);
$telephone = mysqli_real_escape_string($conn, $_POST['telephone']);

// modifier seulement l'annonce de l'utilisateur connecte
$sql = "UPDATE produits 
        SET titre='$titre', description='$description', prix='$prix', marque='$marque', etat='$etat', telephone='$telephone'
        WHERE id='$id' AND user_id='".$_SESSION['user_id']."'";

if ($conn->query($sql) === TRUE) {
    header("Location: ../profile.php");
} else {
    echo "Error: " . $conn->error;
}
?>
