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
    <main>
    <header>
        <?php require_once 'partial/header.php' ?>
    </header>
    

        <div class="container text-center">

            <?php
                echo '<h2 class="h2text"> Bonjour ' . $firstname . '<br>
                Que souhaites-tu faire ?</h2><br>';
            ?>
            <h4 class="texth4">Rechercher un jeux</h4>
            <input class="search-bar" type="search" id="site-search" name="search"
                aria-label="Search through site content"><br>
            <button name="search">Rechercher</button>
            </div>
            <hr>
            <div class="container text-center">
            <h4 class="texth4">Echanger un jeux</h4>
            <button name="trade">Trade</button>
        </div>
        <hr class="hr">
        <br>
    
    <footer>
        <?php require_once 'partial/footer.php' ?>
    </footer>
</main>
</body>

</html>