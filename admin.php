<?php
session_start();

include("../admin/header_admin.php");

include_once('functions.php');
$dbco = dbConnect();
$action = isset($_POST['action']);


if ($action == "inscription") {
    $civilite = htmlspecialchars($_POST['genre']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['pwd1']);
    $pwd_hash = password_hash($mdp, PASSWORD_DEFAULT);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $ville = htmlspecialchars($_POST['ville']);
    $cp = htmlspecialchars($_POST['cp']);
    $adresse = htmlspecialchars($_POST['adresse']);

    $sql = "INSERT INTO t_membre(pseudo,mdp,nom,prenom,email,civilite,ville,cp,adresse)
    VALUES(:pseudo,:mdp,:nom,:prenom,:email,:civilite,:ville,:cp,:adresse)";

    $req = $dbco->prepare($sql);

    $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindValue(':mdp', $pwd_hash, PDO::PARAM_STR);
    $req->bindValue(':nom', $nom, PDO::PARAM_STR);
    $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':civilite', $civilite, PDO::PARAM_STR);
    $req->bindValue(':ville', $ville, PDO::PARAM_STR);
    $req->bindValue(':cp', $cp, PDO::PARAM_INT);
    $req->bindValue(':adresse', $adresse, PDO::PARAM_STR);

    $req->execute();
    $dbco = null;

    header('Location: ./../index.php');
    // echo '<pre>';
    // var_dump($_POST);
    // echo '</pre>';
} else {
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mdp = htmlspecialchars($_POST['pwd']);


    // On regarde si le pseudo existe dans la base
    $sql = "SELECT * FROM t_membre WHERE pseudo = ?";
    $req = $dbco->prepare($sql);
    $req->bindValue(1, $pseudo, PDO::PARAM_STR);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_BOTH);

    if ($result) {
        if (password_verify($mdp, $result['mdp'])) {
            //On définit des variables de session
            $_SESSION['pseudo'] = $result['pseudo'];
            header('Location: profil.php');
        } else {
            echo "Vous n'êtes pas inscrit";
        }
    } else {
        echo "Vous devez d'abord vous inscrire";
    }
    $dbco = null;
}


$logout = isset($_GET['logout']);
if ($logout == 1) {
    session_destroy();
    header('Location: index.php');
}
?>