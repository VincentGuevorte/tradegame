<?php

session_start();
require_once '../connexion.php';
require_once '../classes/user.php';

if (isset($_POST['login'])) {

    $user = new User($bdd);

    $resultat = $user->getUserByEmail($_POST['email']);
    //   var_dump($resultat);
    if (count($resultat) > 0 && password_verify($_POST['password'], $resultat['password'])) {
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['role'] = $resultat['role'];

        header('location: index.php');

    } else {
        $erreur = 'Non valide';
    };
}

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

<body class=" w-100">
    <div class="col-lg-12 content admin_index">
        <div class="panel panel-default mx-auto">
                <div class="globe_login p-2">
                        <form action="" method="POST">
                            <div class="align-items-center col-12">
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
                            </div><br>
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
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</html>