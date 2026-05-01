<?php
session_start();
include 'db.php';

// verifier que l'utilisateur est connecte
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// validation avant l'ajout
if (empty($_POST['marque']) || empty($_POST['etat']) || empty($_POST['telephone'])) {
    die("Marque, etat et telephone obligatoires");
}

$titre = mysqli_real_escape_string($conn, $_POST['titre']);
$description = mysqli_real_escape_string($conn, $_POST['description']);
$prix = mysqli_real_escape_string($conn, $_POST['prix']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$marque = mysqli_real_escape_string($conn, trim($_POST['marque']));
$etat = mysqli_real_escape_string($conn, trim($_POST['etat']));
$telephone = mysqli_real_escape_string($conn, trim($_POST['telephone']));

// id du vendeur connecte
$user_id = $_SESSION['user_id'];

// upload image
if (isset($_FILES['fichier']) && $_FILES['fichier']['error'] == 0) {

    $file = mysqli_real_escape_string($conn, $_FILES['fichier']['name']);
    $tmp = $_FILES['fichier']['tmp_name'];
    $destination = "../uploads/" . $file;
    $extension = strtolower(pathinfo($file, PATHINFO_EXTENSION));

    if ($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "webp") {
        die("Format image non accepte");
    }

    move_uploaded_file($tmp, $destination);

} else {
    die("Erreur upload image");
}

// insert DB
$sql = "INSERT INTO produits (titre, description, prix, type, marque, etat, telephone, fichier, user_id)
        VALUES ('$titre', '$description', '$prix', '$type', '$marque', '$etat', '$telephone', '$file', '$user_id')";

if ($conn->query($sql) === TRUE) {
    header("Location: ../index.php");
} else {
    echo "Error: " . $conn->error;
}
?>
