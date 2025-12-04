<?php
$mail = $_POST['mail'] ?? null;
$password = $_POST['password'] ?? null;

if ($mail != null && $password != null) {
    global $conn;
    require_once 'models/utilisateur.php';
    $user = ConnectionUser($conn, $mail);
    if (!empty($user)) {
        if (password_verify($password, $user['Mot_De_Passe_Utilisateur'])) {
            $_SESSION['user'] = $user;
            header("Location: index.php?action=home");
        } else {
            header("Location: index.php?action=connexion&error=1");
        }
    } else {
        header("Location: index.php?action=connexion&error=1");
    }
}

$titlePage = 'Se connecter';
require('views/header.php');
require('views/connexion.php');
require('views/footer.php');
?>