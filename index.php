<?php
session_start();
require_once 'connexion.php';
require_once 'classes/jeux.php';



$stmt = $bdd->prepare("SELECT * FROM users where id=:id");
$result2 = $stmt->execute([':id' => $_SESSION['id']]);
$resultat = $stmt->fetch();
$name = $resultat['name'];
$firstname = $resultat['firstname'];
$email = $resultat['email'];
$telephone = $resultat['telephone'];
$password = $resultat['password'];

if (isset($_POST['q']) and !empty($_POST['q'])) {
    $q = htmlspecialchars(trim($_POST['q']));

    $posts = $jeux->search($q);
}

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


        <div class="container text-center principal">

            <?php
            echo '<h2 class="h2text"> Bonjour ' . $firstname . '<br>
                Que souhaites-tu faire ?</h2><br>';
            ?>
            <h4 class="texth4">Rechercher un jeux</h4>
            <form method="POST" action="liste-jeux.php">
                <input class="search-bar" type="search" name="q" id="site-search" name="search" aria-label="Search through site content"><br>
                <button name="search">Rechercher</button>
            </form>
        </div>
        <hr>
        <div class="container text-center">
            <h4 class="texth4">Echanger un jeux</h4>
            <a href="liste-jeux.php"><button name="trade">Trade</button></a>
        </div>
        <hr class="hr">
        <br>
        <footer>
            <?php require_once 'partial/footer.php' ?>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>