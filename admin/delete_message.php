<?php

session_start();

require_once '../connexion.php';
require_once('../include/private_admin.php');



if (!isset($_GET['Action'])) $_GET['Action']="";
$Action=$_GET['Action'];
if ($Action=="Suppression")
{
    $id = (int)$_GET['id'];
    $stmt = $bdd->prepare("DELETE FROM messages where messages.id=:id");
    $result2 = $stmt->execute(['id' => $id ?? 1]);

    header('location:message.php');
}
