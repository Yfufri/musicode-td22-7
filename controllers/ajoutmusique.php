<?php // S'occupe de la creation d'une musique
if (!isset($_SESSION['user'])) { // check si l'utilisateur est co
    header('Location: connexion');
    exit();
}

$userId = $_SESSION['user']['Id_Utilisateur'];

require_once 'models/musique.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['title']) && isset($_POST['artist']) && isset($_POST['duration_min']) && isset($_POST['duration_sec'])) {

        $title = trim($_POST['title']);
        $artist = trim($_POST['artist']);
        $album = isset($_POST['album']) && !empty(trim($_POST['album'])) ? trim($_POST['album']) : null; //on mets null si pas d'album car on a le droit de pas le mettre
        $durationMin = (int) $_POST['duration_min'];
        $durationSec = (int) $_POST['duration_sec'];

        $errors = []; // si on passe pas un test, on rajoute une erreur. Si il n'y pas d'erreur, on continue sinon on renvoie la ou les erreurs.

        if (empty($title)) {
            $errors[] = "Le titre est obligatoire.";
        }
        if (empty($artist)) {
            $errors[] = "L'artiste est obligatoire.";
        }
        if ($durationMin < 0 || $durationMin > 99) {
            $errors[] = "Les minutes doivent être entre 0 et 99.";
        }
        if ($durationSec < 0 || $durationSec > 59) {
            $errors[] = "Les secondes doivent être entre 0 et 59.";
        }
        if ($durationMin == 0 && $durationSec == 0) {
            $errors[] = "La durée doit être supérieure à 0.";
        }

        if (empty($errors)) {

            $musicId = publishMusic($conn, $title, $artist, $album, $durationMin, $durationSec);

            if ($musicId) {
                $addSuccess = addMusicToUser($conn, $userId, $musicId);

                if ($addSuccess) {
                    $_SESSION['notif'] = "Musique ajoutée avec succès au catalogue et à votre bibliothèque !";
                    header('Location: mabibliotheque');
                } else {
                    $_SESSION['notif'] = "Musique ajoutée au catalogue mais erreur lors de l'ajout à votre bibliothèque.";
                    header('Location: home');
                }
            } else {
                $_SESSION['notif'] = "Erreur lors de l'ajout de la musique.";
                header('Location: ajoutMusique');
            }
            exit();

        } else {
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
        }

    } else {
        $_SESSION['notif'] = "Données manquantes.";
    }
}

$notif = $_SESSION['notif'] ?? null;
$errors = $_SESSION['errors'] ?? [];
$formData = $_SESSION['form_data'] ?? [];

unset($_SESSION['notif'], $_SESSION['errors'], $_SESSION['form_data']);

$titlePage = 'Ajouter une Musique';
require('views/header.php');
require('views/ajoutmusique.php');
require('views/footer.php');
?>