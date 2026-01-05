<?php

function getAllMusic($conn)
{
    $sql = "SELECT Id_Musique, Titre_Musique as titre, Artiste_Musique as artist, Album_Musique as album, Duree_Musique as duration FROM musique";
    $result = mysqli_query($conn, $sql);
    $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);

    foreach ($rows as &$row) {
        $seconds = (int) $row['duration'];
        $row['duration'] = [
            'minutes' => intdiv($seconds, 60),
            'seconds' => $seconds % 60
        ];
    }

    return $rows;
}

function getAllMusicButMine($conn, $userId)
{
    $sql = "SELECT m.Id_Musique, 
                   m.Titre_Musique as titre, 
                   m.Artiste_Musique as artist, 
                   m.Album_Musique as album, 
                   m.Duree_Musique as duration
    FROM musique m
    LEFT JOIN bibliotheque b
    ON m.Id_Musique = b.Id_Musique
    AND b.Id_Utilisateur = ?
    WHERE b.Id_Utilisateur IS NULL";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    foreach ($rows as &$row) {
        $seconds = (int) $row['duration'];
        $row['duration'] = [
            'minutes' => intdiv($seconds, 60),
            'seconds' => $seconds % 60
        ];
    }

    return $rows;
}

function getAllMyMusic($conn, $userId)
{
    $sql = "SELECT musique.Id_Musique, 
                   Titre_Musique as titre, 
                   Artiste_Musique as artist, 
                   Album_Musique as album, 
                   Duree_Musique as duration, 
                   bibliotheque.Note
    FROM musique 
    INNER JOIN bibliotheque ON musique.Id_Musique = bibliotheque.Id_Musique
    WHERE bibliotheque.Id_Utilisateur = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = $result->fetch_all(MYSQLI_ASSOC);
    $stmt->close();

    foreach ($rows as &$row) {
        $seconds = (int) $row['duration'];
        $row['duration'] = [
            'minutes' => intdiv($seconds, 60),
            'seconds' => $seconds % 60
        ];
    }

    return $rows;
}

function publishMusic($conn, $titre, $artist, $album = null, $durationMin, $durationSec)
{
    $sql = "INSERT INTO musique (Titre_Musique, Artiste_Musique, Album_Musique, Duree_Musique)
            VALUES (?,?,?,?)";
    $duration = $durationMin * 60 + $durationSec;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $titre, $artist, $album, $duration);
    $stmt->execute();
    $id = $stmt->insert_id;
    $stmt->close();
    return $id;
}

function addMusicToUser($conn, $userId, $musicId)
{
    $sql = "INSERT INTO bibliotheque (Id_Utilisateur, Id_Musique) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $musicId);
    return $stmt->execute();
}

function deleteMusicFromUser($conn, $userId, $musicId)
{
    $sql = "DELETE FROM bibliotheque WHERE Id_Utilisateur = ? AND Id_Musique = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $musicId);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}

function getOneMusic($conn, $musicId)
{
    $sql = "SELECT Id_Musique, Titre_Musique as titre, Artiste_Musique as artist, Album_Musique as album, Duree_Musique as duration FROM musique WHERE Id_Musique = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $musicId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row;
}

function isMusicInUserLibrary($conn, $userId, $musicId): bool
{
    $sql = "SELECT COUNT(*) as count FROM bibliotheque WHERE Id_Utilisateur = ? AND Id_Musique = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $musicId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row['count'] > 0;
}

function getUserMusicNote($conn, $userId, $musicId)
{
    $sql = "SELECT Note FROM bibliotheque WHERE Id_Utilisateur = ? AND Id_Musique = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $userId, $musicId);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    return $row ? $row['Note'] : null;
}
function updateMusicNote($conn, $userId, $musicId, $note)
{
    $sql = "UPDATE bibliotheque SET Note = ? WHERE Id_Utilisateur = ? AND Id_Musique = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $note, $userId, $musicId);
    $success = $stmt->execute();
    $stmt->close();
    return $success;
}
?>