<?php
session_start();
include 'php/db.php';

// recuperer toutes les annonces pour la page d'accueil
$sql = "SELECT * FROM produits";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
<title>Phone Occasion</title>
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
<p class="intro">Acheter et vendre des telephones occasion pour tout le monde.</p>
</header>

<nav>
<a href="index.php">Accueil</a>
<a href="add_product.php">Ajouter Telephone</a>
<a href="profile.php">Mes annonces</a>

<!-- afficher connexion ou deconnexion selon l'etat de session -->
<?php if (isset($_SESSION['user_id'])) { ?>
<a href="logout.php">Deconnexion</a>
<?php } else { ?>
<a href="register.php">Inscription</a>
<a href="login.php">Connexion</a>
<?php } ?>
</nav>

<!-- zone de recherche, filtres et tri -->
<section class="filters">
<input type="text" id="search" placeholder="Chercher un modele..." onkeyup="filterProduct()">
<select id="marque" onchange="filterProduct()">
<option value="">Toutes les marques</option>

<?php
// remplir la liste des marques depuis la base
$res = $conn->query("SELECT DISTINCT marque FROM produits");

while($row = $res->fetch_assoc()) {
    echo "<option value='".$row['marque']."'>".$row['marque']."</option>";
}
?>
</select>
<select id="etat" onchange="filterProduct()">
<option value="">Tous les etats</option>

<?php
// remplir la liste des etats depuis la base
$res = $conn->query("SELECT DISTINCT etat FROM produits");

while($row = $res->fetch_assoc()) {
    echo "<option value='".$row['etat']."'>".$row['etat']."</option>";
}
?>
</select>
<select id="tri" onchange="filterProduct()">
<option value="">Trier par prix</option>
<option value="prix_asc">Moins cher</option>
<option value="prix_desc">Plus cher</option>
</select>
<button type="button" class="clear-filter" onclick="clearFilter()">Clear</button>
</section>

<main>
<div class="products">
<?php if ($result->num_rows == 0) { ?>
<p>Aucune annonce disponible.</p>
<?php } ?>
<!-- affichage des annonces -->
<?php while($row = $result->fetch_assoc()) { ?>
<div class="card">
<img src="uploads/<?php echo $row['fichier']; ?>" alt="<?php echo $row['titre']; ?>">
<h3><?php echo $row['titre']; ?></h3>
<p><?php echo $row['description']; ?></p>
<p class="details"><?php echo $row['marque']; ?> - <?php echo $row['etat']; ?></p>
<span><?php echo $row['prix']; ?> DT</span><br>
<a href="uploads/<?php echo $row['fichier']; ?>" target="_blank">
Voir photo
</a><br>
<a href="details.php?id=<?php echo $row['id']; ?>">Details</a>
</div>
<?php } ?>
</div>
</main>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
