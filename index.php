<?php
include("./inc/header.inc.php");

try {
    $username = "root";
    $password = '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $req = $db->query('SELECT * FROM t_produit inner join t_categorie on t_categorie.id_categorie=t_produit.id_categorie');
    $res = $req->fetchAll();

echo "<div class = \"container-fluid\">";
    echo "<div class = \"row \">";
    foreach ($res as $key => $value) {
        echo "<div class = \"col-sm-12 col-md-4 col-lg-3\">";
                    echo "<h2>$value[3]</h2>";
                    echo "<div class=\"card\" style=width:18rem\">";
                        echo "<div class= \"card-body\">";
                        echo "<img src=\"inc/img/$value[12]/$value[8]\" class=\"card-img-top\" alt=\"\">";
                        echo "<p class= \"card-text\"> Prix : $value[9]€</p>";
                        echo "<a href='produit.php?id_produit=$value[0]' class='btn btn-warning'>voir la fiche du produit</a>";
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
?>