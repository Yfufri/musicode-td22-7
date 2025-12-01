<?php

function getAllMusic($conn){
    $sql = "SELECT Id_Musique, Titre_Musique as titre, Artiste_Musique as artist, Album_Musique as album, Duree_Musique as duration FROM musique";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    // C'est pour avoir un tableau minute/seconde
    $seconds = (int)$row['duration'];
    $row['duration'] = [
        'minutes' => intdiv($seconds, 60),
        'seconds' => $seconds % 60
    ];
    return $row;
}

?>