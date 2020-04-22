<?php
session_start();
require_once 'connexion.php';

$stmt = $bdd->prepare("SELECT * FROM users where id=:id");
$result2 = $stmt->execute([':id' => $_SESSION['id']]);
$resultat = $stmt->fetch();
$name = $resultat['name'];
$firstname = $resultat['firstname'];
$email = $resultat['email'];
$telephone = $resultat['telephone'];
$password = $resultat['password'];

if (isset($_POST['modifier'])) {

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    // var_dump($_POST);
    // die;
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $update = "UPDATE users SET 
    name=:name,
    firstname=:firstname,
    telephone=:telephone,
    email=:email,
    password=:password 
                            WHERE id=:id";


    $stmt = $bdd->prepare($update);
    $result2 = $stmt->execute([':name' => $name, ':firstname' => $firstname,
     ':telephone' => $telephone, ':email' => $email,':password' => $password, ':id' => ($_SESSION['id'])]);

    header('location: mon_compte.php');
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
    <main class="monCompte col-12 d-md-flex">
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>
        <div class="container text-center">

            <div class="profil_user mx-auto">
                <?php

                echo '<h3 class="colorh3"> Nom : ' . $name . '</h3>';
                echo '<h3 class="colorh3"> Prenom : ' . $firstname . '</h3>';
                echo '<h3 class="colorh3"> Email : ' . $email . '</h3>';
                ?>

                <button type="submit" id="btnPopup" class="btnPopup">Modifier mon profil</button>
                <a href="mes-jeux.php" class=""><button>Mes jeux</button></a><br><br>
                <a href="proposition.php" class=""><button>Proposition</button></a>


                <div id="overlay" class="overlay">

                    <div id="popup" class="popup">

                        <form action="" method="POST" class="align-items-center col-12">
                            <span id="btnClose" class="btnClose">&times;</span>
                            <div>
                                <label class="col-4 querie_iphone" for="">Name :</label>
                                <input class="col-6" type="text" name="name" value="<?= $name ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Firstname :</label>
                                <input class="col-6" type="text" name="firstname" value="<?= $firstname ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Telephone :</label>
                                <input class="col-6" type="text" name="telephone" value="<?= $telephone ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Email :</label>
                                <input class="col-6" type="email" name="email" value="<?= $email ?>">
                            </div>
                            <div>
                                <label class="col-4 querie_iphone" for="">Password :</label>
                                <input class="col-6" type="password" name="password" value="<?= $password ?>">
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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>