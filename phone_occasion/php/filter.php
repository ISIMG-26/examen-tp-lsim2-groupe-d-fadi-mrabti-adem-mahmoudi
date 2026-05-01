<?php
include 'db.php';

// recuperer les valeurs envoyees par AJAX
$marque = mysqli_real_escape_string($conn, $_GET['marque'] ?? "");
$etat = mysqli_real_escape_string($conn, $_GET['etat'] ?? "");

// requete de base
$sql = "SELECT * FROM produits WHERE 1";

// filtrer par marque
if (!empty($marque)) {
    $sql .= " AND marque = '$marque'";
}

// filtrer par etat
if (!empty($etat)) {
    $sql .= " AND etat = '$etat'";
}

// chercher par modele
if (!empty($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $sql .= " AND titre LIKE '%$search%'";
}

// trier par prix croissant
if (!empty($_GET['tri']) && $_GET['tri'] == "prix_asc") {
    $sql .= " ORDER BY prix ASC";
}

// trier par prix decroissant
if (!empty($_GET['tri']) && $_GET['tri'] == "prix_desc") {
    $sql .= " ORDER BY prix DESC";
}

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
