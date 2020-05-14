<?php
session_start();
require_once 'connexion.php';
require_once 'include/private.php';
require_once 'classes/jeux.php';
require_once 'classes/proposition.php';

// récupère les données de la table

$jeux = new Jeux($bdd);


if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $jeuxInfo = $jeux->selectAllById($id);
    $posts = $jeux->selectAllByIdUser($_SESSION['id']);
    if (isset($_POST["envoyer"])) {

        $proposition = new Proposition($bdd);
        // var_dump($_POST);
        $proposition->setId_user($_SESSION['id']);
        $proposition->setId_jeux_user($_POST['jeux']);
        $proposition->setId_jeux_wanted($id);

        $proposition->insert();
    }
} else {

    // header('location:notfound.php');

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

<body class="accueil">
    <main>
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>


        <div class="container text-center liste-jeux">

            <h4 class="texth4">Detail jeux</h4>
        </div><br>

        <div class=row>
            <div class="col-lg-10 d-flex border shadow_image_accueil mx-auto">
                <div class="col-4">
                    <img class="row justify-content-center image_post mx-auto" src="public/img/<?= $jeuxInfo['imagename'] ?>" alt="Jeux">
                </div>
                <div class="col-8">
                    <div class="col-lg-12 col-4 mx-auto ">
                        <div class=""><i class="fa fa-user fa-md">
                                <span class=""><?= $jeuxInfo['username'] ?></span><br></i>
                        </div>
                    </div>
                    <div class="col-lg-12 mx-auto">
                        <h4 class=""></h4>
                        <span class=""><?= $jeuxInfo['plateforme'] ?></span><br>
                        <span class=""><?= $jeuxInfo['etat'] ?></span><br>
                        <span class=""><?= $jeuxInfo['prix'] ?>€</span><br>
                        <form method="post" action="detail-jeux.php?id=<?= $_GET['id'] ?>" class="">
                            <select name="jeux" id="jeux-select">
                                <?php
                                foreach ($posts as $post) {
                                ?>
                                    <option value="<?= $post['id'] ?>"><?= $post['name'] ?></option> <?php
                                                                                                    }
                                                                                                        ?>
                            </select><br>
                            <button type="submit" name="envoyer" class="btn btn-light">Proposer echange</button>

                            <?php

                            if (isset($_POST['envoyer'])) {

                                echo 'Proposition envoyer';
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <footer>
            <?php require_once 'partial/footer.php' ?>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>