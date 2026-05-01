<?php
session_start();
include 'php/db.php';

// recuperer l'annonce selectionnee avec les informations du vendeur
$id = intval($_GET['id']);
$sql = "SELECT produits.*, users.name, users.email 
        FROM produits 
        INNER JOIN users ON produits.user_id = users.id 
        WHERE produits.id='$id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Details Telephone</title>
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
    <p class="intro">Details de l'annonce</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="add_product.php">Ajouter Telephone</a>
    <a href="profile.php">Mes annonces</a>
    <?php if (isset($_SESSION['user_id'])) { ?>
    <a href="logout.php">Deconnexion</a>
    <?php } else { ?>
    <a href="register.php">Inscription</a>
    <a href="login.php">Connexion</a>
    <?php } ?>
</nav>

<main>
<?php if ($product) { ?>
    <!-- details d'une seule annonce -->
    <div class="detail-card">
        <img src="uploads/<?php echo $product['fichier']; ?>" alt="<?php echo $product['titre']; ?>">
        <div>
            <h2><?php echo $product['titre']; ?></h2>
            <p><strong>Marque :</strong> <?php echo $product['marque']; ?></p>
            <p><strong>Etat :</strong> <?php echo $product['etat']; ?></p>
            <p><strong>Prix :</strong> <?php echo $product['prix']; ?> DT</p>
            <p><strong>Vendeur :</strong> <?php echo $product['name']; ?></p>
            <p><strong>Telephone :</strong> <?php echo $product['telephone']; ?></p>
            <p class="buy-info">Pour acheter ce telephone, contactez le vendeur.</p>
            <a href="index.php">Retour</a>
        </div>
    </div>
<?php } else { ?>
    <h2>Annonce introuvable</h2>
<?php } ?>
</main>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
