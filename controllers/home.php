<?php
$titlePage = 'Musicode';
require_once 'models/musique.php';
$notif = null;

if (isset($_SESSION['notif'])) {
    $notif = $_SESSION['notif'];
    unset($_SESSION['notif']);
}

if (isset($_SESSION['user'])) {
    $userId = $_SESSION['user']['Id_Utilisateur'];
    $musiques = getAllMusicButMine($conn, $userId);
    $isConnected = true;
} else {
    $musiques = getAllMusic($conn);
    $isConnected = false;
}

require('views/header.php');
require('views/home.php');
require('views/footer.php');
?>