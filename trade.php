<?php
session_start();
require_once 'connexion.php';
require_once 'include/private.php';
require_once 'classes/jeux.php';
require_once 'classes/proposition.php';

// récupère les données de la table


if (isset($_GET['id'])) {

    $proposition = new Proposition($bdd);

    $jeux = new Jeux($bdd);

    $id = (int) $_GET['id'];
    $proposition->setId($id);
    $propositionInfo = $proposition->select($id);
    $jeuxWantedInfo = $jeux->selectAllById($propositionInfo['id_jeux_wanted']);
    $jeuxUserInfo = $jeux->selectAllById($propositionInfo['id_jeux_user']);
} else {

    header('location:notfound.php');
}

// var_dump($jeuxInfo);

// var_dump($posts);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/vincent.css">
    <title>TRADEGAME</title>
</head>

<body>
    <main class="accueil">
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>

        <div class="container-fluid">
            <div class="container text-center liste-jeux">
                <h4 class="texth4">Proposition</h4>
            </div><br>
            <div class="row text-center">
                <div class="col-lg-3 border shadow_image_accueil mx-auto">
                    <h4>Vous</h4>
                    <div class="col-lg-9 mx-auto">
                        <img class="justify-content-center image_post mx-auto" src="public/img/<?= $jeuxUserInfo['imagename'] ?>" alt="Jeux">
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <h4 class=""></h4>
                        <span class="">Pltaeforme : <?= $jeuxUserInfo['plateforme'] ?></span><br>
                        <span class=""> Etat : <?= $jeuxUserInfo['etat'] ?></span><br>
                        <span class="">Prix : <?= $jeuxUserInfo['prix'] ?>€</span><br>
                    </div>
                </div>
                <div class="col-lg-2 my-auto">
                    <h2 class="h2trade">Contre<h2>
                </div>
                <div class="col-lg-3 border shadow_image_accueil mx-auto">
                    <h4>Traders</h4>
                    <div class="col-lg-9 mx-auto">
                        <img class="justify-content-center image_post mx-auto" src="public/img/<?= $jeuxWantedInfo['imagename'] ?>" alt="Jeux">
                    </div>
                    <div class="col-lg-8 mx-auto">
                        <h4 class=""></h4>
                        <span class="">Pltaeforme : <?= $jeuxWantedInfo['plateforme'] ?></span><br>
                        <span class=""> Etat : <?= $jeuxWantedInfo['etat'] ?></span><br>
                        <span class="">Prix : <?= $jeuxWantedInfo['prix'] ?>€</span><br>
                    </div>
                </div>
            </div>
            <br>
            <div class="row text-center">
                <div class="col-lg-6">
                    <a href="" class="btn btn-light modif_status" data-id="<?= $id ?>">OUI</a>
                </div>
                <div class="col-lg-6">
                    <a href="proposition.php" class="btn btn-danger modif_status" data-id="<?= $id ?>">NON</a>
                </div>
            </div>
        </div>
        </div>
        <footer>
            <?php require_once 'partial/footer.php' ?>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>