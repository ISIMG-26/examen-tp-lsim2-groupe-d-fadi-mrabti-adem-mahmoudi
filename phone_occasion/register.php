<!DOCTYPE html>
<html>
<head>
    <title>Inscription</title>
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
    <p class="intro">Creer un compte vendeur</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="login.php">Connexion</a>
</nav>

<!-- formulaire d'inscription -->
<form action="php/register.php" method="POST" onsubmit="return validateRegister()">
    <input type="text" name="name" placeholder="Nom" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Mot de passe" required><br>

    <button type="submit">S'inscrire</button>
</form>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
