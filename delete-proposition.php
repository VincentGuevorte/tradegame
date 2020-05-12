<?php

session_start();

require_once 'connexion.php';
require_once 'include/private.php';
require_once 'classes/proposition.php';

if (!isset($_GET['Action'])) $_GET['Action']="";
$Action=$_GET['Action'];
if ($Action=="Suppression")
{
    $proposition =new Proposition($bdd);
    $proposition->setId($_GET['id']);

if ($proposition->delete()){

$msg = 'la proposition a bien été supprimer';

}else{

    $msg = 'proposition non supprimer';

}

   
header('location:proposition.php?message='.$msg.''); 
}