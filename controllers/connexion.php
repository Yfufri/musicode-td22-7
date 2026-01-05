<?php
$mail = $_POST['mail'] ?? null; // reset sinon bug
$password = $_POST['password'] ?? null;
$error = null;
$notif = null;

if (isset($_SESSION['notif'])) {
    $notif = $_SESSION['notif'];
    unset($_SESSION['notif']);
}

if ($mail != null && $password != null) {
    global $conn;
    require_once 'models/utilisateur.php';
    $user = ConnectionUser($conn, $mail);
    if (!empty($user)) {
        if (password_verify($password, $user['Mot_De_Passe_Utilisateur'])) {
            $_SESSION['user'] = $user;
            header("Location: home");
            exit();
        } else {
            $error = "Adresse e-mail ou mot de passe incorrect.";
        }
    } else {
        $error = "Adresse e-mail ou mot de passe incorrect.";
    }
}

$titlePage = 'Se connecter';
require('views/header.php');
require('views/connexion.php');
require('views/footer.php');
?>