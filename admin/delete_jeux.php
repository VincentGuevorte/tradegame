<?php

session_start();

require_once '../connexion.php';


if (!isset($_GET['Action'])) $_GET['Action']="";
$Action=$_GET['Action'];
if ($Action=="Suppression")
{
    $id = (int)$_GET['id'];

    $stmt = $bdd->prepare("DELETE FROM post where post.id=:id");
    $result2 = $stmt->execute(['id' => $id ?? 1]);

    header('location:jeux.php');
}