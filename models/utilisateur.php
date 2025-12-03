<?php
function ConnectionUser($conn, $mail)
{
    $sql = "SELECT *
            FROM utilisateur
            WHERE Mail_Utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function InscriptionUser($conn, $mail, $nom, $mdp)
{
    // Vérifier si l'email existe déjà
    $sqlCheck = "SELECT Id_Utilisateur FROM utilisateur WHERE Mail_Utilisateur = ?";
    $stmtCheck = $conn->prepare($sqlCheck);
    $stmtCheck->bind_param("s", $mail);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        $stmtCheck->close();
        return false;
    }
    $stmtCheck->close();

    // Insérer le nouvel utilisateur
    $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilisateur (Nom_Utilisateur, Mail_Utilisateur, Mot_De_Passe_Utilisateur) VALUES (?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nom, $mail, $mdpHash);
    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

function updateNomUser($conn, $id, $nouveauNom)
{
    $sql = "UPDATE utilisateur SET Nom_Utilisateur = ? WHERE Id_Utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nouveauNom, $id);
    return $stmt->execute();
}

function updatePassUser($conn, $id, $nouveauMdp)
{
    $sql = "UPDATE utilisateur SET Mot_De_Passe_Utilisateur = ? WHERE Id_Utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $nouveauMdp, $id);
    return $stmt->execute();
}
