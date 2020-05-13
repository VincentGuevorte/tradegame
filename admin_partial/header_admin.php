<?php 

// if ($_SESSION['role']!= 'ROLE_ADMIN'){
// // var_dump($_SESSION);
// // exit;
// header('location: index.php');

// }

?>



<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid d-flex">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

        </div>
    </div><!-- /.container-fluid -->
    <div>
        <h1 class="" style="text-align: center">Admin Panel</h1>
        
    </div>
    
</nav>
<div class="container-fluid main-container">
    <div class="col-md-2 sidebar">
        <div class="row">
            <!-- uncomment code for absolute positioning tweek see top comment in css -->
            <div class="absolute-wrapper"> </div>
            <!-- Menu -->
            <div class="side-menu">
                <nav class="navbar navbar-default" role="navigation">
                    <!-- Main Menu -->
                    <div class="side-menu-container">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="users.php"><span class="glyphicon glyphicon-user"></span>Users</a></li>
                            <li><a href="jeux.php"><span class="glyphicon glyphicon-book"></span>Jeux</a></li>
                            <li><a href="proposition.php"><span class="glyphicon glyphicon-sort"></span>Proposition</a></li>
                            <li><a href="message.php"><span class="glyphicon glyphicon-envelope"></span>Messages</a></li>
                            <li><a class="nav-link lien_mon_compte btn-light border" href="deconnexion.php"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </div>
        </div>
    </div>
