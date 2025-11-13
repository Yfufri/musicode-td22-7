<?php
use Dotenv\Dotenv;
require_once 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

var_dump($_ENV);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link href="./style.css" rel="stylesheet" />
    </head>
    <body>
        <?php require "./header.php"?>
        <h1>HELLO THEO</h1>
        
    </body>
</html>