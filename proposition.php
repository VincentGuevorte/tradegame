<?php
session_start();
require_once 'connexion.php';
require_once 'classes/proposition.php';

$proposition = new Proposition($bdd);

    $propositionInfo = $proposition->selectAllByIdUser($_SESSION['id']);
// var_dump($propositionInfo);

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


        <div class="container text-center principal">
            <div class="panel panel-default">
                <section>
                <h2 class="jeux">Demande</h2>
                    <table class="table table-striped table-bordered mesJeux">
                        <thead>
                            <tr>
                                <th>Traders</th>
                                <th>Deal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                foreach ($propositionInfo as $proposition){
                    echo '<tr>';
                    echo  '<td>' . $proposition['username'] . '</td>';
                    echo'<td width=200>';
                    echo  '<a class="btn btn-primary" href="trade.php?id='.$proposition['id'] . '">
                    <span class="glyphicon glyphicon-eye-open"></span>Voir</a>';
                    echo'<td width=200>';
                    echo'<a class="btn btn-danger" href="delete-proposition.php?Action=Suppression&id=
                    '.$proposition['id'] . '"><span class="glyphicon glyphicon-remove"></span>Supprimer</a>';

                    echo'</td>';

                    echo'</tr>';

                }

                ?>
                        </tbody>
                    </table>
                </section>
            </div>

        </div>
        <footer>
            <?php require_once 'partial/footer.php' ?>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="public/js/index.js"></script>
</body>

</html>