<?php
session_start();
require_once 'connexion.php';

// récupère les données de la table
$stmt = $bdd->prepare("SELECT jeux.*, users.name as username, image.name as imagename FROM jeux 
inner join image ON jeux.id=image.id_jeux
inner join users ON jeux.id_users=users.id");

$result2 = $stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

        <h4 class="texth4">Rechercher un jeux</h4>
            <input class="search-bar" type="search" id="site-search" name="search"
                aria-label="Search through site content"><br>
            <button name="search">Rechercher</button>
        </div>
        <?php

foreach ($posts as $post) {
?>


    <div class="border p-3 shadow_image_accueil">
        <div class=""><i class="fa fa-user fa-md"></i><?= $post['username'] ?></div>
        <img class="row justify-content-center image_post mx-auto" src="public/img/<?= $post['imagename'] ?>" alt="">
        <div class="mx-auto">
            <h4 class=""><?= $post['name'] ?></h4>
            <span class=""><?= $post['etat'] ?></span><br>
            <span class=""><?= $post['plateforme'] ?></span><br>
            <span class=""><?= $post['prix'] ?>€</span><br>
            <button class="">Contactez le trader</button>
        </div>
    </div>
<?php
}
?>

</div>


    <footer>
        <?php require_once 'partial/footer.php' ?>
    </footer>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>