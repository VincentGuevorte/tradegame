<?php
session_start();
require_once 'connexion.php';
require_once 'include/private.php';
require_once 'classes/jeux.php';

// var_dump($_SESSION);
$jeux = new Jeux($bdd);

    $jeuxInfo = $jeux->selectAllByIdUser($_SESSION['id']);

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

<body class="mes-jeux">
    <main >
        <header>
            <?php require_once 'partial/header.php' ?>
        </header>

<div class="container-fluid">
        <div class="container text-center principal">
            <div class="panel panel-default">
                <section>
                <h2 class="jeux">Mes jeux</h2>


                    <table class="table table-striped table-bordered mesJeux">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Plateforme</th>
                                <th>Prix</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                foreach ($jeuxInfo as $jeux){

                    echo '<tr>';
                    echo  '<td>' . $jeux['name'] . '</td>';
                    echo '<td>'  . $jeux['plateforme'] .'</td>';
                    echo '<td>'  . $jeux['prix'] .'€</td>';
                    echo'<td>';
                    echo'<a class="btn btn-danger" href="delete-jeux.php?Action=Suppression&id='.$jeux['id'] . '">
                    <span class="glyphicon glyphicon-remove"></span><i class="fas fa-trash"></i></a>';

                    echo'</td>';

                    echo'</tr>';

                }

                ?>
                        </tbody>
                    </table>
                </section>
                <a class="btn btn-light ajoutJeux" href="ajout_jeux.php"><span class="glyphicon glyphicon-plus"></span>Ajouter</a>
            </div>
                <?php
if (isset($_GET['message'])){

echo $_GET['message'];

}
                ?>
        </div>
        </div>
        
            <?php require_once 'partial/footer_list.php' ?>
        
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>