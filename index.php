<?php
use Dotenv\Dotenv;
require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

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