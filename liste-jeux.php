<?php
session_start();
require_once 'connexion.php';
require_once 'include/private.php';
require_once 'classes/jeux.php';

// récupère les données de la table

$jeux = new Jeux($bdd);

$posts = $jeux->selectAllWithInfo();

// var_dump($posts);

if (isset($_POST['q']) and !empty($_POST['q'])) {
    $q = htmlspecialchars(trim($_POST['q']));

    $posts = $jeux->search($q);
}

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

<body class="listeJeux">
    <main>
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>


        <div class="text-center liste-jeux">

            <h4 class="texth4">Rechercher un jeux</h4>
            <form method="POST" action="liste-jeux.php">
                <input class="search-bar" type="search" id="site-search" name="q" aria-label="Search through site content"><br>
                <input type='submit' value="Rechercher">
            </form>
        </div>
        <div class="container-fluid">
            <?php

            foreach ($posts as $post) {
            ?>
                <div class="row my-2">
                    <div class="col-lg-10 d-flex border shadow_image_accueil mx-auto">
                        <div class="col-4">
                            <img class="row justify-content-center image_post mx-auto" src="public/img/<?= $post['imagename'] ?>" alt="">
                        </div>
                        <div class="col-8">
                            <div class="col-lg-12 col-4 mx-auto ">
                                <div class=""><i class="fa fa-user fa-md"></i><?= $post['username'] ?></div>

                                <div class="col-lg-12 mx-auto">
                                    <h4 class=""><?= $post['name'] ?></h4>
                                    <span class=""><?= $post['etat'] ?></span><br>
                                    <span class=""><?= $post['plateforme'] ?></span><br>
                                    <span class=""><?= $post['prix'] ?>€</span><br>
                                    <?= '<a href="detail-jeux.php?id=' . $post['id'] . '" class="btn btn-light">Details</a>' ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <footer>
            <?php require_once 'partial/footer_list.php' ?>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>