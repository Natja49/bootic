<!DOCTYPE html>
<html lang="fr">
  
<?php
session_start();
$pseudo = "votre pseudo";

//if (isset($_SESSION['pseudo'])) {
//$pseudo = $_SESSION['pseudo'];
//}

?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Autour+One&family=Lobster&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer></script>
  <link rel="stylesheet" href="inc/css/style.css">
  <title>Bootic</title>
</head>

<body class="bg-info position-static">
  <header>
    <h1 class="container text-center pt-5 pb-5">Boo-tic</h1>

    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Nos produits</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="inscription.php">Inscription</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="connexion.php">Connexion</a>
            </li>

            <?php if ($pseudo) {
              echo '<li class="nav-item">
              <a class="nav-link" href="./../profil.php"></a>
              </li>';
            }
            ?>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="profil.php">Profil</a>
            </li>

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="panier.php">Panier</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>
  </header>