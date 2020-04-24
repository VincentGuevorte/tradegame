<?php

session_start();
require_once 'connexion.php';
require_once 'classes/jeux.php';

if (!isset($_GET['Action'])) $_GET['Action']="";
$Action=$_GET['Action'];
if ($Action=="Suppression")
{
    $jeux =new Jeux($bdd);
    $jeux->setId($_GET['id']);

if ($jeux->delete()){

$msg = 'le jeux a bien été supprimer';

}else{

    $msg = 'jeux non supprimer';

}

   
header('location:mes_jeux.php?message='.$msg.''); 
}