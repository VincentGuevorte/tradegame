<?php

session_start();

require_once '../connexion.php';
require_once '../classes/proposition.php';

$proposition = new Proposition($bdd);

    $propositionInfo = $proposition->selectAll();


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
            <table class="table table-striped table-bordered">
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
                    echo  '<a class="btn btn-primary" href="view_proposition.php?id='.$proposition['id'] . '">
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