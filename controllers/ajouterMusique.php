<?php // S'occupe de l'ajout des musique à la bibliotheque de l'utilisateur
if (!isset($_SESSION['user'])) { // check si l'utilisateur est co
    header("Location: connexion");
    exit();
}

$musicId = $_POST['musicId'] ?? null;
if ($musicId != null) {
    require_once 'models/musique.php';
    global $conn;
    $userId = $_SESSION['user']['Id_Utilisateur'];

    if (addMusicToUser($conn, $userId, $musicId)) {
        $_SESSION['notif'] = 'Musique ajoutée à votre bibliothèque.';
    } else {
        $_SESSION['error'] = 'Erreur lors de l\'ajout de la musique.';
    }
}

header("Location: mabibliotheque");
exit();
?>