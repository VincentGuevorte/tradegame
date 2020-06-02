<?php
session_start();
require_once '../connexion.php';
require_once '../include/private.php';
require_once '../classes/jeux.php';

// récupère les données de la table

$jeux = new Jeux($bdd);

// var_dump($posts);

if (isset($_POST['prix']) and !empty($_POST['prix'])) {
    $q = htmlspecialchars(trim($_POST['prix']));

    $posts = $jeux->selectByParams($_POST);
}

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