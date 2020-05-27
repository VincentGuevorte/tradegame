

<div class="footer row justify-content-center m-0">
    <a class="titre_footer d-flex align-items-center" href="mentions.php">LEGAL NOTICE</a>
    <a class="titre_footer d-flex align-items-center" href="politique.php">PDC</a>
    <a class="titre_footer d-flex align-items-center" href="contact.php">CONTACT</a>
</div>
<?php

if(isset($_COOKIE['accept_cookie'])){
    $showcookie = false;
    }else{
    $showcookie = true;
    }

if($showcookie){ ?>
<div class="cookie-alert">
    <div class="sp-cookie-alert">
        Nous utilisons des cookies pour améliorer votre expérience, réaliser des statistiques d’audience,
        vous proposer des services adaptés à vos centres d’intérêtet vous offrir des fonctionnalités
        relatives aux réseaux sociaux.<br><a class="btn btn-primary" href="accept_cookie.php">OK</a>
    </div>
</div>
<?php } ?>