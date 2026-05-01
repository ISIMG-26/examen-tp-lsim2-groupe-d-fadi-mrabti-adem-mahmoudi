<?php
session_start();
include 'php/db.php';

// recuperer l'annonce a modifier
$id = intval($_GET['id']);

$sql = "SELECT * FROM produits WHERE id='$id'";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Modifier Telephone</title>
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
    <p class="intro">Modifier votre annonce</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="profile.php">Mes annonces</a>
    <a href="logout.php">Deconnexion</a>
</nav>

<!-- formulaire de modification d'une annonce -->
<form action="php/update_product.php" method="POST" onsubmit="return validateForm()">
    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

    <input type="text" name="titre" value="<?php echo $product['titre']; ?>"><br>
    <textarea name="description"><?php echo $product['description']; ?></textarea><br>
    <input type="number" name="prix" value="<?php echo $product['prix']; ?>"><br>
    <input type="text" name="marque" value="<?php echo $product['marque']; ?>" placeholder="Marque"><br>
    <input type="text" name="etat" value="<?php echo $product['etat']; ?>" placeholder="Etat"><br>
    <input type="text" name="telephone" value="<?php echo $product['telephone']; ?>" placeholder="Telephone vendeur"><br>

    <button type="submit">Modifier</button>
</form>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
