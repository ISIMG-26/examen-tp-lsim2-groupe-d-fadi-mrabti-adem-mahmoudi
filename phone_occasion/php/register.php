<?php
include 'db.php';

// recuperer les donnees du formulaire d'inscription
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

// crypter le mot de passe avant l'enregistrement
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// ajouter le nouvel utilisateur
$sql = "INSERT INTO users (name, email, password)
        VALUES ('$name', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../login.php");
} else {
    echo "Error: " . $conn->error;
}
?>
