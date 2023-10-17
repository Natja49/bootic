<?php
include("inc/header.inc.php");
?>


<section class="container">
  <div class="row">
    <form class="col-sm-12 col-lg-8 mx-auto my-5" method="POST" action="./admin/admin.php">

    <div class="mb-3">
        <label class="form-label" for="inputCivility">Civilite</label>
        <input type="text" class="form-control" id="inputCivility" name="genre">
      </div>

      <div class="mb-3">
        <label for="InputPseudo" class="form-label">Pseudo</label>
        <input type="text" class="form-control" id="InputPseudo" name="pseudo">
        <div id="emailHelp" class="form-text">Ne partagez pas votre pseudo avec quelqu'un d'autre.</div>
      </div>

      <div class="mb-3">
        <label for="InputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="InputPassword1" name="pwd1">
      </div>

      <div class="mb-3">
        <label for="InputPassword2" class="form-label">Password verify</label>
        <input type="password" class="form-control" id="InputPassword2" name="pwd2">
      </div>
      
      <div class="mb-3">
        <label class="form-label" for="inputName">Nom</label>
        <input type="text" class="form-control" id="inputName" name="nom">
      </div>
      <div class="mb-3">
        <label class="form-label" for="inputFisrtName">Prenom</label>
        <input type="text" class="form-control" id="inputFisrtName" name="prenom">
      </div>

      <div class="mb-3">
        <label class="form-label" for="inputEmail">Email</label>
        <input type="email" class="form-control" id="inputEmail" name="email">
      </div>

      <div class="mb-3">
        <label class="form-label" for="inputCity">Ville</label>
        <input type="text" class="form-control" id="inputCity" name="ville">
      </div>

      <div class="mb-3">
        <label class="form-label" for="inputCp">CP</label>
        <input type="number" class="form-control" id="inputCp" name="cp">
      </div>

      <div class="mb-3">
        <label class="form-label" for="inputAdress">Adresse</label>
        <input type="text" class="form-control" id="inputAdress" name="adresse">
      </div>

      <div class="mb-3">
        <input type="hidden" name="action" value="inscription">
        <input type="submit" class="btn btn-primary" name="submit" value="S'inscrire">
      </div>
    </form>
  </div>



  <?php
  include("./inc/footer.inc.php");
  ?>