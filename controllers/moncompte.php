<?php
if (!isset($_SESSION['user'])) { // check si l'utilisateur est co
    header('Location: connexion');
    exit();
}

$user = $_SESSION['user'];
$userId = $user['Id_Utilisateur'];
require_once 'models/utilisateur.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    $nom = trim($_POST['nom']);
    $nouveauMdp = $_POST['nouveauMdp'] ?? '';
    $confirmMdp = $_POST['confirmMdp'] ?? '';

    if (empty($nom)) { //pour empecher d'effacer le nom et d'avoir un pseudo vide
        $errors[] = "Le nom d'affichage est obligatoire.";
    }

    $updatePassword = false; //Si on essaie de modif le mdp, on check si il y a un confirm de mdp. Mais si il y a un nouveau mdp et rien en confirm de mdp, on ajoute une erreur.
    if (!empty($nouveauMdp)) {
        $updatePassword = true;
        if ($nouveauMdp !== $confirmMdp) {
            $errors[] = "Les mots de passe ne correspondent pas.";
        }
    }

    if (empty($errors)) {
        $success = true;

        if ($nom !== $user['Nom_Utilisateur']) { // comme le cas où le nom est vide est deja gerer, il suffit juste de voir si le nom recup est different pour lancer la modif.
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