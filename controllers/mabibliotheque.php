<?php
if (!isset($_SESSION['user'])) { // check si l'utilisateur est co
    header('Location: connexion');
    exit();
}

$userId = $_SESSION['user']['Id_Utilisateur'];

require_once 'models/musique.php';

$notif = $_SESSION['notif'] ?? null;
unset($_SESSION['notif']);

$musiques = getAllMyMusic($conn, $userId);

require_once 'views/header.php';
require_once 'views/mabibliotheque.php';
require_once 'views/footer.php';
?>