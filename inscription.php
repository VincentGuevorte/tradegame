<?php
session_start();
require_once('connexion.php');
// echo password_hash("123", PASSWORD_DEFAULT);
if (isset($_POST['inscription'])) {

    $name = $_POST['name'];
    $firstname = $_POST['firstname'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    // var_dump($_POST);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $insert = "INSERT INTO users (name, firstname, email, telephone, password)
     VALUES (:name, :firstname, :email, :telephone, :password)";
    $stmt = $bdd->prepare($insert);
    $stmt->execute(['email' => $email, 'firstname' => $firstname, 'name' => $name,
     'telephone' => $telephone, ':password' => $password]);
     header('location: login.php');
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Rokkitt&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/vincent.css">
    <title>TradeGame</title>
</head>

<body class="image_fond">


    <div class="container">
        <div class="row justify-content-center">
            <div class="globe p-2">
                <h2 class="mx-auto text-center">Bienvenue sur TradeGame !</h2>
                <h3 class="mx-auto text-center">Inscrivez vous</h3>
                <form action="" method="POST" class="align-items-center p-3 col-12">
                    <div class="col-12 p-0">
                        <div>
                            <label class="col-4" for="">Name :</label>
                            <input class="col-7" type="text" name="name">
                        </div>
                        <div>
                            <label class="col-4 p-0" for="">Firstname :</label>
                            <input class="col-7" type="text" name="firstname">
                        </div>
                    </div>



                    <div class="col-12 p-0">
                        <div>
                            <label class="col-4" for="">Email :</label>
                            <input class="col-7" type="email" name="email">
                        </div>
                        <div>
                            <label class="col-4 p-0" for="">Telephone :</label>
                            <input class="col-7" type="text" name="telephone">
                        </div>
                        <div>
                            <label class="col-4 p-0" for="">Password :</label>
                            <input class="col-7" type="password" name="password">
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-warning mt-4" name="inscription">S'inscrire</button>
                    </div>
                </form>

                <br>
                <div class="text-center">
                    <a href="login.php">Tu as déjà un compte?</a>
                </div>
            </div>
        </div>
    </div>



</body>

</html>