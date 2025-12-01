<?php 
$titlePage = 'Ma Bibliothèque';
require_once 'models/musique.php';
$musiques = getAllMyMusic($conn, $_SESSION['user']['Id_Utilisateur']);
require('views/header.php');
require('views/mabibliotheque.php');
require('views/footer.php');
?>