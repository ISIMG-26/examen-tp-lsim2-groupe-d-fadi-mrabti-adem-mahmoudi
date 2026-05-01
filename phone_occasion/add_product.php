<?php
session_start();

// obliger l'utilisateur a se connecter avant d'ajouter une annonce
if (!isset($_SESSION['user_id'])) header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ajouter Telephone</title>
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
    <p class="intro">Ajouter une nouvelle annonce</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="profile.php">Mes annonces</a>
    <a href="logout.php">Deconnexion</a>
</nav>

<!-- formulaire d'ajout d'une annonce -->
<form action="php/add_product.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

    <input type="text" name="titre" placeholder="Modele (ex: iPhone 11)" required><br>

    <textarea name="description" placeholder="Description: stockage, batterie, accessoires..."></textarea><br>

   <input type="number" name="prix" min="0" placeholder="Prix en DT" required><br>

    <select name="type">
        <option value="smartphone">Smartphone</option>
        <option value="accessoire">Accessoire</option>
    </select><br>

   <input type="text" name="marque" placeholder="Marque (Samsung, Apple...)" required>
<input type="text" name="etat" placeholder="Etat (neuf, bon, moyen...)" required><br>
<input type="text" name="telephone" placeholder="Telephone vendeur (ex: 55 123 456)" required><br>

    <input type="file" name="fichier" accept="image/*" required><br>

    <button type="submit">Ajouter</button>
</form>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
