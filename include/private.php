<?php

if(!isset($_SESSION['id'])){
    header('location: inscription.php');
}