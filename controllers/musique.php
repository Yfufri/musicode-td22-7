<?php
if (!isset($_GET['id']) || empty($_GET['id'])) { //Le cas ou on a pas d'id
    $_SESSION['notif'] = "Musique introuvable.";
    header('Location: home');
    exit();
}

$musicId = (int) $_GET['id'];

require_once 'models/musique.php';

$isConnected = isset($_SESSION['user']);
$userId = $isConnected ? $_SESSION['user'] : null;

$musique = getOneMusic($conn, $musicId);

if (!$musique) { // Le cas ou on a un id, mais pas de musique associé
    $_SESSION['notif'] = "Musique introuvable.";
    header('Location: index.php');
    exit();
}

$seconds = (int) $musique['duration']; //conversion des durées
$musique['duration'] = [
    'minutes' => intdiv($seconds, 60),
    'seconds' => $seconds % 60
];

$isInLibrary = false;
$userNote = null;

if ($isConnected) {
    $isInLibrary = isMusicInUserLibrary($conn, $userId, $musicId);
    if ($isInLibrary) {
        $userNote = getUserMusicNote($conn, $userId, $musicId);
    }
}

$notif = $_SESSION['notif'] ?? null;
unset($_SESSION['notif']);

$titlePage = $musique['titre'];
require 'views/header.php';
require 'views/musique.php';
require 'views/footer.php';
?>