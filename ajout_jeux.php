<?php
session_start();
require_once 'connexion.php';
require_once 'classes/jeux.php';
require_once 'classes/image.php';

$jeux = new Jeux($bdd);

if (isset($_POST['ajouter'])) {

    $jeux->setName($_POST['name']);
    $jeux->setPlateforme($_POST['plateforme']);
    $jeux->setEtat($_POST['etat']);
    $jeux->setPrix($_POST['prix']);
    $jeux->setId_user($_SESSION['id']);

    $jeux->insert();

$lastIdJeux = $jeux->getLastInsertId();


        
// *******UPLOAD IMAGE*********/
    $target_dir = "public/img/";
$target_file = $target_dir . basename($_FILES["fichier"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filename = $_FILES["fichier"]["name"];
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fichier"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    }
// verifier type mime de l'image sécurité 

    $mimetype = mime_content_type($_FILES['fichier']['tmp_name']);
    if (!in_array($mimetype, array('image/jpeg', 'image/gif', 'image/png'))) {
        $check = false;
        echo "l'element n'est pas une image";
    }
// Check file size
if ($_FILES["fichier"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fichier"]["tmp_name"], $target_file)) {

        $image = new Image($bdd);

        // $imagename = md5(time());
        
                $image->setName($_FILES["fichier"]["name"]);
                $image->setId_jeux($lastIdJeux);
        
                $image->insert();

       function success($success) {echo "The file ". basename( $_FILES["fichier"]["name"]) .$success. "has been uploaded.";}
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}

/************************ */

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
    <main class="mes-jeux">
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>
        <div class="container-fluid text-center principal">
            <div class="panel panel-default">
                <section>
                    <h2 class="jeux">Ajout jeux</h2><br>

                    <span id="reponseAjax"></span>
                    <form action="" method="POST" class="align-items-center p-3 col-12" enctype="multipart/form-data">
                        <div class=row>
                            <div class="col-lg-12">
                                <label for="file-upload" class="custom-file-upload">
                                    <i class="fas fa-upload fa-5x"></i>
                                </label>
                                <input id="file-upload" type="file" name="fichier" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="col-12" for="">Nom</label>
                                <input type="text" class="input_add_jeux" name="name">
                            </div>
                            <div class="col-lg-6">
                                <label class="col-12" for="">Plateforme</label>
                                <input type="text" class="input_add_jeux" name="plateforme">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="col-12" for="">Etat</label>
                                <input type="text" class="input_add_jeux" name="etat">
                            </div>
                            <div class="col-lg-6">
                                <label class="col-12" for="">Prix</label>
                                <input type="text" class="input_add_jeux" name="prix">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light mt-4" name="ajouter">Ajouter</button>
                    </form>
                </section>
                <a href="mes_jeux.php" class="btn btn-primary mt-4 btnReturn">Retour</a>
            </div>
        <?=
        $success = '';
        success($success) ?>
            <footer>
                <?php require_once 'partial/footer_list.php' ?>
            </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>