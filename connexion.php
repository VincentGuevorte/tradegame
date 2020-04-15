<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=bdd_tradegame;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}