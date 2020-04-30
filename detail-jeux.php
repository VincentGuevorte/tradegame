<?php
session_start();
require_once 'connexion.php';
require_once 'classes/jeux.php';

// récupère les données de la table

$jeux = new Jeux($bdd);

$jeuxInfo = $jeux->selectAllWithInfo();

$id = $_GET['id'];
$jeuxUser = $jeux->select($id);

$posts = $jeux->selectAllByIdUser($_SESSION['id']);



// var_dump($posts);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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


        <div class="container text-center liste-jeux">

            <h4 class="texth4">Detail jeux</h4>
        </div><br>

        <div class=row>
            <div class="col-lg-10 d-flex border shadow_image_accueil mx-auto">
                <div class="col-4">
                    <img class="row justify-content-center image_post mx-auto"
                        src="public/img/<?= $jeuxInfo['image'] ?>" alt="Jeux">
                </div>
                <div class="col-8">
                    <div class="col-lg-12 col-4 mx-auto ">
                        <div class=""><i class="fa fa-user fa-md"></i></div>

                        <div class="col-lg-12 mx-auto">
                            <h4 class=""></h4>
                            <span class=""><?= $jeuxInfo['name'] ?></span><br>
                            <span class=""><?= $jeuxInfo['etat'] ?></span><br>
                            <span class=""><?= $jeuxInfo['prix'] ?>€</span><br>

                            <select name="jeux" id="jeux-select">
                                <?php
                                foreach ($posts as $post) {
                                ?>
                                <option value=""><?= $post['name'] ?></option> <?php
                                 }
                                ?>
                            </select><br>

                            <a href="detail-jeux.php" class="btn btn-light">Contactez le trader</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer>
            <?php require_once 'partial/footer.php' ?>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>