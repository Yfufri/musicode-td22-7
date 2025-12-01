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

<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="./style.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    </head>
    <body>
        <?php require "./views/header.php"?>
        <h1>HELLO THEO</h1>
        <?php var_dump($_ENV); ?>
        <?php require "./footer.php"?>
    </body>
</html>
=======




?>
>>>>>>> 25272a94536cb35e1f4378d8d8976f0c8fab5ff3
