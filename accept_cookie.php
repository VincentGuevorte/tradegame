<?php 

setcookie('accept_cookie', true, time() +3600);

if(isset($_SERVER['HTTP_REFERER']) AND !empty($_SERVER['HTTP_REFERER'])){
header('location:'.$_SERVER['HTTP_REFERER']);
}else{
    header('location: index.php');
    die();
}

?>