<?php

function dbConnect()
{
    try {

        $db = new PDO("mysql:host=localhost; dbname=dbbootic; port=3306; charset=utf8", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}



function getProfile($pseudo)
{
    $getBdd = dbConnect();
    $sql = "SELECT * FROM t_membre WHERE pseudo = '$pseudo'";
    $profil = $getBdd->prepare($sql);
    $profil->execute();
    if ($profil->rowCount() == 1)
        return $profil->fetch(); // Accès à la première ligne de résultat
    else
        throw new Exception("Aucun profil ne correspond au pseudo '$pseudo'");
}


function getAllProfiles()
{
    $getBdd = dbConnect();
    $sql = "SELECT pseudo FROM t_membre";
    $profils = $getBdd->prepare($sql);
    $profils->execute();

    return $profils->fetchAll();
}
