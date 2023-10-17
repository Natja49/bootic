<?php
include("inc/header.inc.php");

// on vérifie que la variable de session pseudo existe
if (isset($_SESSION['pseudo'])) {
  $pseudo = $_SESSION['pseudo'];
}
?>

 
<main class="d-flex justify-content-center mt-5">
  <div class="container border-danger">
    <form class="mx-auto py-5 shadow p-4 w-25 mt-5 card border-success mb-3"  method="POST" action="./admin/admin.php">
    <h3>Formulaire de connexion</h3>
        <div class="card-body mx-auto">
          <svg xmlns="http://www.w3.org/2000/svg " width="80px" height="100px" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
          </svg>
        </div>
       
        <div class="mb-3">
          <label for="Pseudo">Pseudo</label>
          <input type="text" class="form-control" placeholder="Votre pseudo" aria-label="Pseudo" name="pseudo">
        </div>
        <div class="mb-3">
          <label for="mdp">Mot de passe</label>
          <input type="text" class="form-control" placeholder="" aria-label="mdp" name="pwd">
        </div>
        <div class="mb-3">
          <input type="hidden" name="connexion" value="connexion">
          <input type="submit" class="btn btn-primary" name="submit" value="S'inscrire"></a>
        </div>
      </form>
  </div>
  </div>
</main>
</div>
<br>


<?php
include("./inc/footer.inc.php");
?>