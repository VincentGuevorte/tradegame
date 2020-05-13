<?php 
session_start();
require_once('connexion.php');
require_once('classes/user.php');


if (isset($_POST['login'])) {

      $resultat = $user->getUserByEmail($_POST['email']);
    //   var_dump($resultat);
      if (count($resultat) > 0 && password_verify($_POST['password'], $resultat['password'])) {
          $_SESSION['email'] = $resultat['email'];
          $_SESSION['id'] = $resultat['id'];
          header('location: accueil.php');
      } else {
          $erreur = 'Non valide';
      };
  }

?>



<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/vincent.css">
    <title>PICTRAVEL</title>
</head>


<body class="image_fond">


    <div class="container">
        <div class="row justify-content-center">
            <div class="globe_login p-2">
                <h4 class="mx-auto text-center">Heureux de te retrouver !<br>
                    Mais dis moi ?<br>
                    Tu peux me rappeler ton adresse mail ainsi que ton mot de passe ?</h4><br>
                <form action="" method="POST" class="align-items-center col-12">
                    <div>
                        <label class="col-4" for="">Email :</label>
                        <input class="col-6" type="email" name="email">
                    </div>
                    <div>
                        <label class="col-4 p-0" for="">Password :</label>
                        <input class="col-6" type="password" name="password">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-warning mt-3" name="login">Se connecter</button>
                    </div>
                </form>
                <?php
   
                        if (isset($erreur)) {
                                echo "<div>
                                        <span>$erreur</span>
                                    </div>";
                            }

    ?>

            </div>
        </div>
    </div>


</body>

</html>