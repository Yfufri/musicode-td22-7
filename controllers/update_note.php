<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: connexion');
    exit();
}

$userId = $_SESSION['user']['Id_Utilisateur'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['id_musique']) && isset($_POST['note'])) {

        $musicId = (int) $_POST['id_musique'];
        $note = (int) $_POST['note'];

        if ($note >= 0 && $note <= 5) {

            require_once 'models/musique.php';

            $success = updateMusicNote($conn, $userId, $musicId, $note);

            if ($success) {
                $_SESSION['notif'] = "Note mise à jour avec succès !";
            } else {
                $_SESSION['notif'] = "Erreur lors de la mise à jour de la note.";
            }

        } else {
            $_SESSION['notif'] = "La note doit être entre 0 et 5.";
        }

    } else {
        $_SESSION['notif'] = "Données manquantes.";
    }

} else {
    $_SESSION['notif'] = "Méthode non autorisée.";
}

header('Location: mabibliotheque');
exit();
?>