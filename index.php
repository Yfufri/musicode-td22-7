<?php

use Dotenv\Dotenv;

require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once 'models/bddconnection.php';
$conn = openCon();

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'models/utilisateur.php';

$mail = $_POST['mail'] ?? null;
$password = $_POST['password'] ?? null;


if ($mail != null && $password != null) {
    $user = ConnectionUser($conn, $mail);
    if (!empty($user)) {
        if (password_verify($password, $user[' Mot_De_Passe_Utilisateur'])) {
            $_SESSION['user'] = $user;
        } else {
            header("Location: index.php?action=login&error=1");
        }
    } else {
        header("Location: index.php?action=login&error=1");
    }
}
var_dump($_SESSION,$_POST);
$action = $_GET['action'] ?? 'home';
switch ($action) {
    default:
    case 'home':
        require 'controllers/home.php';
        break;
    case 'inscription':
        require 'controllers/inscription.php';
        break;
    case 'ajoutmusique':
        require 'controllers/ajoutmusique.php';
        break;
    case 'connexion':
        require 'controllers/connexion.php';
        break;
    case 'mabibliotheque':
        require 'controllers/mabibliotheque.php';
        break;
    case 'moncompte':
        require 'controllers/moncompte.php';
        break;
    case 'musique':
        require 'controllers/musique.php';
        break;
}
?>