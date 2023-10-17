<?php
include("./header_admin.php");

//UPDATE permet de dire qu'on va modifier une entrée.//
$UPDATE_produit = $_GET['id'];

try {
    $username = "root";
    $password =  '';
    $dsn = 'mysql:host=localhost;dbname=dbbootic;port=3306;charset=utf8';
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $req = $db->query("SELECT * FROM t_produit WHERE id_produit=$UPDATE_produit");
    $value = $req->fetch();

    //var_dump — Affiche les informations d'une variable
    //echo '<pre>';
    //var_dump($value);
    //echo '</pre>';
?>


    <div class = " container-fluid" >
    <div class = " row-8 p-3 ms-5" >
        <div class = " col-sm-12 col-md-8 col-lg-4 mt-5" >
            <form method = "POST"  action = "data.php" enctype="multipart/form-data" >
            <input type='hidden' name='id_produit' value='$update_produit'>
                <div class = " mb-3" >
                    <h3>Formulaire produits</h3>
                    <label for="Reference" >reference</label>
                    <input type="text"  name ="reference"  class="form-control"  placeholder=""  aria-label=" reference" value="<?= $value[1]?>">
                </div>

                <div class = " mb-3" >
                    <label for = " id_categorie" >categorie</label>
                    <input type = " text"  name = " id_categorie"  class= " form-control"  placeholder =""  aria-label =" "   value="<?= $value[2]?>">
                </div>

                <div class = " mb-3" >
                    <label for = " titre" >titre</label>
                    <input type = " text"  name = " titre"  class = " form-control"  placeholder =" "  aria-label =" " value="<?= $value[3]?>"> 
                </div>

                <div class= " mb-3" >
                    <label for = " exampleFormControlTextarea1"  class= " form-label" >description</label>
                    <textarea class = " form-control"  id = " exampleFormControlTextarea1"  name = " description"  rows = " 3"  ><?= $value[4]?></textarea>
                </div>

                <div class = " mb-3" >
                    <label for = " mdp" >couleur</label>
                    <input type = " text"  class = " form-control"  name = " couleur"  placeholder =" "  aria-label =" "  rows =" 3"  value ="<?=$value[5] ?>">
                </div>

                <div class = " mb-3" >
                <h6>taille</h6>
                <select name = " taille" >
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="U">U</option>
                </select>
                </div>

                <div class = " mb-2" >
                <h6>public</h6>
                <input type="radio" id="huey" name="public"  checked value="<?= $value[7] ?>" />
                    <label for = " public" >Homme</label>   
                <input type="radio" id="huey" name="public"  checked value="<?= $value[7] ?>" />
                    <label for = " public" >Femme</label>
                </div>

                <div class= " mb-2" >
                <label for = "photo" >photo</label>
                <input type="file" id="avatar" name="photo" accept="imgage/jpg,image/ png,image/jpeg,image/gif,image'webp,image"  value="<?= $value[8] ?>"/>

                 
                </div>

                <div class = " mb-3" >
                    <label for = " prix" >prix</label>
                    <input type = " text"  class = " form-control"  name = " prix"  placeholder =" "  aria-label =" "  value="<?= $value[9] ?>"/>
                </div>

                <div class = " mb-3" >
                    <label for = " stock" >stock</label>
                    <input type = " text"  class = " form-control"  name = " stock"  placeholder =" "  aria-label =" "  value="<?= $value[10] ?>"/>
                </div>
                <input type='hidden' name='action' value='Modifier'>
                <div class = " mb-3" >
                <input type="submit" value = " Modification d'un produit"  class = " mx-auto d-block" >
                </div>
        </div>
        </form>
    </div>
</div>



<?php

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}


include("../inc/footer.inc.php");
?>