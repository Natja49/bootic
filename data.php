<?php
include("./header_admin.php");


$reference = $_POST['reference'];
$categorie = $_POST['id_categorie'];
$titre = $_POST['titre'];
$description = $_POST['description'];
$couleur = $_POST['couleur'];
$taille = $_POST['taille'];
$public = $_POST['public'];
//$photo = $_FILES['photo']['name'];
$prix = $_POST['prix'];
$stock = $_POST['stock'];
$action = $_POST['action'];

try {

    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($action === "Modifier") {
        // Requête SQL pour la modification
        $id_produit = $_POST['id_produit'];
        $req = $db->prepare('UPDATE t_produit SET reference = :reference, id_categorie = :id_categorie, titre = :titre, description
        = :description, couleur = :couleur, taille = :taille, public = :public, prix = :prix, stock = :stock WHERE id_produit = UPDATE id_produit');

        if (isset($_FILES['photo'])) {
            $tmpName = $_FILES['photo']['tmp_name'];
            $name = $_FILES['photo']['name'];
            $size = $_FILES['photo']['size'];
            $error = $_FILES['photo']['error'];

            /******************************************
             * vérification sur l’extension du fichier 
             * de sa taille et qu'il n'y a pas d'erreur
             *****************************************/
            // explode(« . » , « image.jpg »). Ce qui nous donne un tableau avec 2 éléments, comme ceci [« image », « jpg »].
            // Il faut donc récupérer le dernier élément de ce tableau avec la fonction end().
            // La fonction strtolower permet de mettre en minuscule tout une chaîne de caractère. 
            $tabExtension = explode('.', $name);
            $extension = strtolower(end($tabExtension));

            //Tableau des extensions que l'on accepte
            $extensions = ['jpg', 'png', 'jpeg', 'gif', 'webp'];

            //Taille max que l'on accepte
            $maxSize = 400000;

            if (in_array($extension, $extensions) && $size <= $maxSize && $error == 0) {
                move_uploaded_file($tmpName, './../inc/img/' . $name);
            } else {
                echo "Une erreur est survenue";
            }
        }

        $req->bindValue(':id_produit', $id_produit, PDO::PARAM_INT);
        $req->bindValue(':reference', $reference, PDO::PARAM_STR);
        $req->bindValue(':id_categorie', $categorie, PDO::PARAM_STR);
        $req->bindValue(':titre', $titre, PDO::PARAM_STR);
        $req->bindValue(':description', $description, PDO::PARAM_STR);
        $req->bindValue(':couleur', $couleur, PDO::PARAM_STR);
        $req->bindValue(':taille', $taille, PDO::PARAM_STR);
        $req->bindValue(':public', $public, PDO::PARAM_STR);
        //$req->bindValue(':photo', $photo, PDO::PARAM_STR);
        $req->bindValue(':prix', $prix, PDO::PARAM_STR);
        $req->bindValue(':stock', $stock, PDO::PARAM_STR);

        $req->execute();
    } elseif ($action === "creation") {
        // Requête SQL pour l'ajout
        $req = $db->prepare('INSERT INTO t_produit (reference, id_categorie, titre, description, couleur, taille, public, prix, stock) 
        VALUES (:reference, :id_categorie, :titre, :description, :couleur, :taille, :public, :prix, :stock)');
    } else {
        echo "Action non reconnue.";
    }

    //La commande UPDATE permet d’effectuer des modifications sur des lignes existantes. 
    //Très souvent cette commande est utilisée avec WHERE pour spécifier sur quelles lignes doivent porter la ou les modifications.
    //$req = $db->prepare('UPDATE t_produit SET id_produit(reference, id_categorie, titre, description, couleur, taille, public, photo, prix, stock) 
    //VALUES (:reference, :id_categorie, :titre, :description, :couleur, :taille, :public, :photo, :prix, :stock)');

} catch (Exception $e) {
    echo ('Erreur : ' . $e->getMessage());
}

include("../inc/footer.inc.php");
