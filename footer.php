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
        <h1>HELLO WORLD</h1>
        
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<footer>
    <p>© 2025 Musicode · IUT Laval - R3.01 Développement web 2025-2026.</p>
</footer>
</html>