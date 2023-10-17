<?php
include("./header_admin.php");
?>

<div class="container-fluid-border ">
    <div class="row-8 p-3 ms-5">
        <div class="col-sm-12 col-md-8 col-lg-4 mt-5">
            <form method="POST" action="data.php" enctype="multipart/form-data">
                <div class="mb-2">
                    <h3>Formulaire produits</h3>
                    <label for="Reference">reference</label>
                    <input type="text" name="reference" class="form-control" placeholder="" aria-label="">
                </div>

                <div class="mb-2">
                    <label for="id_categorie">categorie</label>
                    <input type="text" name="id_categorie" class="form-control" placeholder="" aria-label="">
                </div>

                <div class="mb-2">
                    <label for="titre">titre</label>
                    <input type="text" name="titre" class="form-control" placeholder="" aria-label="">
                </div>

                <div class="mb-2">
                    <label for="exampleFormControlTextarea1" class="form-label">description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
                </div>

                <div class="mb-2">
                    <label for="mdp">couleur</label>
                    <input type="text" class="form-control" name="couleur" placeholder="" aria-label="" rows="3">
                </div>

                <div class="mb-2 mt-3">
                    <h5>taille</h5>
                    <select name="taille">
                        <option value="XS">XS</option>
                        <option value="S">S</option>
                        <option value="M">M</option>
                        <option value="L">L</option>
                        <option value="XL">XL</option>
                    </select>
                </div>

                <div class="mb-2 mt-3">
                    <h5>public</h5>
                    <input type="radio" id="huey" name="public" value="H" checked />
                    <label for="huey">Homme</label>
                    <input type="radio" id="huey" name="public" value="F" checked />
                    <label for="huey">Femme</label>
                </div>

                <div class="mb-2">
                    <label for="photo">photo</label>
                    <input type="file" id="photo" name="photo" value="photo" class="mx-auto text-center" >
                </div>
                
                <div class="mb-2">
                    <label for="prix">prix</label>
                    <input type="text" class="form-control" name="prix" placeholder="" aria-label="" value="">
                </div>

                <div class="mb-2">
                    <label for="stock">stock</label>
                    <input type="text" class="form-control" name="stock" placeholder="" aria-label="">
                </div>
                <input type='hidden' name='action' value='creation'>
                <div class="mb-2 mt-4"><input type="submit" value="Enregistrement" class="mx-auto d-block">
                </div>

        </div>
        </form>
    </div>
</div>


<?php
include("../inc/footer.inc.php");
?>