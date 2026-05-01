<?php
session_start();
include 'php/db.php';

// verifier si l'utilisateur est connecte
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// recuperer seulement les annonces de l'utilisateur connecte
$sql = "SELECT * FROM produits WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mes annonces</title>
    <link rel="stylesheet" href="css/style.css?v=4">
    <script src="js/script.js"></script>
</head>
<body>

<button class="menu-btn" type="button" onclick="toggleMenu()">
    <span></span>
    <span></span>
    <span></span>
</button>

<header>
    <h1>Phone Occasion</h1>
    <p class="intro">Vos annonces publiees</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="add_product.php">Ajouter Telephone</a>
    <a href="logout.php">Deconnexion</a>
</nav>

<div class="products">

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <!-- carte d'une annonce personnelle -->
    <div class="card">
        <img src="uploads/<?php echo $row['fichier']; ?>" alt="<?php echo $row['titre']; ?>">
        <h3><?php echo $row['titre']; ?></h3>
        <p><?php echo $row['description']; ?></p>
        <p class="details"><?php echo $row['marque']; ?> - <?php echo $row['etat']; ?></p>
        <span><?php echo $row['prix']; ?> DT</span><br>

        <a href="uploads/<?php echo $row['fichier']; ?>" target="_blank">
            Voir photo
        </a><br>

        <a href="details.php?id=<?php echo $row['id']; ?>">Details</a><br>

        <a href="php/delete_product.php?id=<?php echo $row['id']; ?>" onclick="return confirmDelete()">
            Supprimer
        </a><br>
        <a href="edit_product.php?id=<?php echo $row['id']; ?>">Modifier</a>
    </div>

<?php
    }
} else {
    echo "Aucune annonce";
}
?>

</div>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
