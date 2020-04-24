<?php
session_start();
require_once 'connexion.php';
require_once 'classes/user.php';

$user = new User($bdd);

    $user->setId($_SESSION['id']);

    $userInfo = $user->select();

if (isset($_POST['modifier'])) {

    $user->setId($_SESSION['id']);
    $user->setName($_POST['name']);
    $user->setFirstname($_POST['firstname']);
    $user->setEmail($_POST['email']);
    $user->setTelephone($_POST['telephone']);

    if ($_POST['password']==''){

        $password = $userInfo['password'];
    }else{
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    }
    $user->setPassword($password);
    
    if ($user->update()){

header('location: mon_compte.php');

    }else{

$error = 'modification echoué';

    }
}

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
    <main class="monCompte">
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>
        <div class="container text-center">

            <div class="profil_user mx-auto">
                <?php

                echo '<h3 class="colorh3"> Nom : '.$userInfo['name'].'  </h3>';
                echo '<h3 class="colorh3"> Prenom : '.$userInfo['firstname'].'  </h3>';
                echo '<h3 class="colorh3"> Email : '.$userInfo['email'].' </h3>';
                ?>

                <button type="submit" id="btnPopup" class="btnPopup">Modifier mon profil</button>
                <a href="mes_jeux.php" class=""><button>Mes jeux</button></a><br><br>
                <a href="proposition.php" class=""><button>Proposition</button></a>


                <div id="overlay" class="overlay">

                    <div id="popup" class="popup">

                        <form action="" method="POST" class="align-items-center col-12">
                            <span id="btnClose" class="btnClose">&times;</span>
                            <div>
                                <label class="col-4 querie_iphone" for="">Name :</label>
                                <input class="col-6" type="text" name="name" value="<?= $userInfo['name'] ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Firstname :</label>
                                <input class="col-6" type="text" name="firstname" value="<?= $userInfo['firstname'] ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Telephone :</label>
                                <input class="col-6" type="text" name="telephone" value="<?= $userInfo['telephone'] ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Email :</label>
                                <input class="col-6" type="email" name="email" value="<?= $userInfo['email'] ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Password :</label>
                                <input class="col-6" type="password" name="password" value="">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" name="modifier">modifier</button>
                            </div>
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>