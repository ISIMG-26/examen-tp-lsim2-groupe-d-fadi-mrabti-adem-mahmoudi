<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
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
    <p class="intro">Connectez-vous a votre compte</p>
</header>

<nav>
    <a href="index.php">Accueil</a>
    <a href="register.php">Inscription</a>
</nav>

<!-- formulaire de connexion -->
<form action="php/login.php" method="POST" onsubmit="return validateLogin()">
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>

    <button type="submit">Connexion</button>
</form>

<footer>
2026 © Copyright FADI MRABTI-ADEM MAHMOUDI - Tous droits reserves
</footer>

</body>
</html>
