<?php
include 'db.php';

// recuperer le mot cherche
$query = mysqli_real_escape_string($conn, $_GET['query'] ?? "");

// chercher les annonces par modele
$sql = "SELECT * FROM produits WHERE titre LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

<!-- resultat AJAX : carte d'annonce -->
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

<?php
    }
} else {
    echo "Aucun resultat";
}
?>
