<?php
$mail = $_POST['mail'] ?? null;
$password = $_POST['password'] ?? null;
$nom = $_POST['nom'] ?? null;

if ($mail != null && $password != null && $nom != null) {
    require_once 'models/utilisateur.php';
    global $conn;
    InscriptionUser($conn, $mail, $nom, $password);
    header("Location: index.php?action=connexion&notif=1");
}
$titlePage = 'Inscription';
require('views/header.php');
require('views/inscription.php');
require('views/footer.php');
?>