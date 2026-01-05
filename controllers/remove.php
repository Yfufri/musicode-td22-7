<?php
if (!isset($_SESSION['user'])) { // check si l'utilisateur est co
    header('Location: connexion');
    exit();
}

$userId = $_SESSION['user']['Id_Utilisateur'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id_musique'])) {

        $musicId = (int) $_POST['id_musique'];

        require_once 'models/musique.php';

        $success = deleteMusicFromUser($conn, $userId, $musicId);

        if ($success) {
            $_SESSION['notif'] = "Musique retirée de votre bibliothèque.";
        } else {
            $_SESSION['notif'] = "Erreur lors du retrait de la musique.";
        }

    } else {
        $_SESSION['notif'] = "Identifiant de musique manquant.";
    }

} else {
    $_SESSION['notif'] = "Méthode non autorisée.";
}

header('Location: mabibliotheque');
exit();
?>