<?php
//On démarre une nouvelle session
session_start();

// on vérifie que la variable de session pseudo existe
if (isset($_SESSION['pseudo'])) {
    $pseudo = $_SESSION['pseudo'];
}

require 'functions.php';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Fifth navbar example">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Expand at lg</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample05">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inscription.php">inscription</a>
                    </li>
                    <?php if ($pseudo) {
                        echo '<li class="nav-item">
                        <a class="nav-link active" href="#">profil</a>
                        </li>';
                    }
                    ?>
                </ul>

            </div>
        </div>
    </nav>



    <main class="container">
        <div class="row">
            <div class="col-sm-12 col-md-6 offset-md-3 my-5">
                <div class="card">
                    <h5 class="card-header">Voici vos informations de profil</h5>
                    <div class="card-body">
                        <?php
                        if ($pseudo) {
                            $membre = getProfile($pseudo);
                        ?>
                            <h5 class="card-title">Bonjour <?= $_SESSION['pseudo']; ?></h5>
                            <p class="card-text">Votre email est : <?= $membre[5]; ?></p>
                            <p class="card-text">Votre ville est : <?= $membre[7]; ?></p>
                            <p class="card-text">Votre cp est : <?= $membre[8]; ?></p>
                            <p class="card-text">Votre adresse est : <?= $membre[9]; ?></p>
                        <?php
                        } else {
                            echo 'non';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>