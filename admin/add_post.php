<?php
session_start();
require_once('../connexion.php');
require_once('../include/private_admin.php');


if (isset($_POST['ajouter'])) {

    $name = $_POST['name'];
    $description = $_POST['description'];
    $type = $_POST['type'];
    $isActive = $_POST['isActive'];
    $idCategory = $_POST['id_category'];
    $idUser = $_POST['id_user'];

    $insert = "INSERT INTO post (name, description, type, isActive, id_category, id_user)
               VALUES (:name, :description, :type, :isActive, :id_category, :id_user)";
    $stmt = $bdd->prepare($insert);
    $stmt->execute(['name' => $name, 'description' => $description, 'type' => $type, 'isActive' => $isActive,
                    'id_category' => $idCategory, ':id_user' => $idUser]);
                    header("location:post.php");
}
?>

<!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin_Connection</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet" media="screen">
        <link href="../css/vincent.css" rel="stylesheet">
    </head>
    <body>
    <?php require_once "../admin_partial/header_admin.php" ?>
    <div class="col-md-10 content">
        <div class="panel panel-default">
            <section>
               
            <form method="post" action="">
                <div class="arkalogin">
                    <div class="loginbaslik">Ajouter un poste</div>
                    <hr style="border: 1px solid #ccc;">
                    <input class="giris" type="text" name="name" placeholder="name">
                    <input class="giris" type="text" name="type" placeholder="type de poste">
                    <input class="giris" type="number" name="isActive" placeholder="0 or 1">
                    <input class="giris" type="number" name="id_category" placeholder="id category">
                    <input class="giris" type="number" name="id_user" placeholder="id user">
                    <input class="giris" type="text" name="description" placeholder="entre ton texte ici...">
                    <a href="https://dogukankeskin.com" target="blank"><input class="butonlogin" type="submit" name="ajouter" value="ajouter"></a>
                </div>
            </form>
                 
            </section>
        </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </html>

