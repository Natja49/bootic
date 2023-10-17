<?php
include("./inc/header.inc.php");

$idproduit = $_GET['id_produit'];

try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $db->query('SELECT * FROM t_produit INNER JOIN t_categorie ON 
    t_categorie.id_categorie=t_produit.id_categorie WHERE id_produit = ' . $idproduit);

    echo "<div class = \"container \">";
    echo "<div class = \"row justify-content-center\">";
    while ($value = $req->fetch()) {
        echo "<div class = \"col-sm-12 col-md-8 col-lg-5 mt-5\">";
        echo "<h2 class= \"card-title-center mb-3 \">$value[3]</h2>";
        echo "<div class=\"card text-dark bg-info mb-3\" style=width:28rem\">";
        echo "<div class= \"card-body mx-auto \">";
        echo "<img src=\"inc/img/$value[12]/$value[8]\" class=\"card-img-top mt-3 mb-3\" alt=\"\">";
        echo "<h3 class= \"card-text\">$value[4]</h3>";
        echo "<p class= \"card text-danger mt-3 text-center h4 \"> Taille : $value[6]</p>";
        echo "<p class= \"card text-success mt-3 text-center h4\"> Prix : $value[9]€</p>";
        echo "<div class=\" row justify-content-center \">";
        echo "<a href='produit.php?id_produit=$value[0]' class='btn btn-warning col-6'>Voir mon panier</a>";
        echo "</div>";
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";

} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}



include("./inc/footer.inc.php");
