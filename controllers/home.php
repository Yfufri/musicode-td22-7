<?php
$titlePage = 'Musicode';
require_once 'models/musique.php';
$musiques = getAllMusic($conn);
require('views/header.php');
require('views/home.php');
require('views/footer.php');
?>