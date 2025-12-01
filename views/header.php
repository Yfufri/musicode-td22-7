<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($title) && $title) {
            echo $title;
        } else {
            echo 'Musicode';
        }
        ?>
    </title>
    <link href="style.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo">
            <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M27.7778 3.33337H12.2223C7.31306 3.33337 3.33337 7.31306 3.33337 12.2223V27.7778C3.33337 32.687 7.31306 36.6667 12.2223 36.6667H27.7778C32.687 36.6667 36.6667 32.687 36.6667 27.7778V12.2223C36.6667 7.31306 32.687 3.33337 27.7778 3.33337Z"
                    fill="#0F172A" />
                <path d="M15.3889 12.8333L26.5 19.5L15.3889 26.1667V12.8333Z" fill="url(#paint0_linear_2468_56)" />
                <defs>
                    <linearGradient id="paint0_linear_2468_56" x1="17.7778" y1="13.3333" x2="1329.25" y2="1106.23"
                        gradientUnits="userSpaceOnUse">
                        <stop stop-color="#38BDF8" />
                        <stop offset="1" stop-color="#6366F1" />
                    </linearGradient>
                </defs>
            </svg>
            Musicode
        </div>
        <nav>
            <a href="#">Catalogue</a>
            <a href="#">Connexion</a>
            <a href="#">Inscription</a>
        </nav>
    </header>