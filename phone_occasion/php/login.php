<?php
session_start();
include 'db.php';

// recuperer email et mot de passe
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = $_POST['password'];

// chercher l'utilisateur avec son email
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // verify password
    if (password_verify($password, $user['password'])) {

        // enregistrer les informations dans la session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];

        header("Location: ../index.php");
    } else {
        echo "Wrong password";
    }

} else {
    echo "User not found";
}
?>
