<?php
$mail = $_POST['mail'] ?? null;
$password = $_POST['password'] ?? null;
$password_confirm = $_POST['password_confirm'] ?? null;
$nom = $_POST['nom'] ?? null;
$error = null;

if ($mail != null && $password != null && $nom != null && $password_confirm != null) {
    if ($password === $password_confirm) {
        require_once 'models/utilisateur.php';
        global $conn;

        $result = InscriptionUser($conn, $mail, $nom, $password); //si le mail est deja dans la bdd, on n'ajoute rien et on retourne false

        if ($result === true) {
            $_SESSION['notif'] = 'Votre compte a été créé avec succès. Veuillez vous connecter.';
            header("Location: connexion");
            exit();
        } else {
            $error = "Cette adresse e-mail est déjà utilisée. Veuillez en essayer une autre.";
        }
    } else {
        $error = "Les mots de passe ne correspondent pas.";
    }
}
$titlePage = 'Inscription';
require('views/header.php');
require('views/inscription.php');
require('views/footer.php');
?>