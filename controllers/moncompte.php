<?php

if (!isset($_SESSION['user'])) {
    header('Location: connexion');
    exit();
}

$userId = $_SESSION['user']['Id_Utilisateur'];

require_once 'models/utilisateur.php';

$user = $_SESSION['user'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    $nom = trim($_POST['nom']);
    $nouveauMdp = $_POST['nouveauMdp'] ?? '';
    $confirmMdp = $_POST['confirmMdp'] ?? '';

    if (empty($nom)) {
        $errors[] = "Le nom d'affichage est obligatoire.";
    }

    $updatePassword = false;
    if (!empty($nouveauMdp)) {
        $updatePassword = true;
        if ($nouveauMdp !== $confirmMdp) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }
    }

    if (empty($errors)) {
        $success = true;

        if ($nom !== $user['Nom_Utilisateur']) {
            $success = updateNomUser($conn, $userId, $nom);
            if ($success) {
                $_SESSION['user']['Nom_Utilisateur'] = $nom;
                $user['Nom_Utilisateur'] = $nom;
            }
        }

        if ($updatePassword && $success) {
            $hashedPassword = password_hash($nouveauMdp, PASSWORD_DEFAULT);
            $success = updatePassUser($conn, $userId, $hashedPassword);
        }

        if ($success) {
            $_SESSION['notif'] = "Vos informations ont été mises à jour avec succès !";
        } else {
            $_SESSION['notif'] = "Erreur lors de la mise à jour de vos informations.";
        }

    } else {
        $_SESSION['errors'] = $errors;
    }
}

$notif = $_SESSION['notif'] ?? null;
$errors = $_SESSION['errors'] ?? [];
unset($_SESSION['notif'], $_SESSION['errors']);

$titlePage = 'Mon Compte';
include "views/header.php";
include "views/moncompte.php";
include "views/footer.php";
?>