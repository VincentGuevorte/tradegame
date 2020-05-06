<?php
session_start();
require_once('../connexion.php');
require_once('../classes/proposition.php');
if(isset($_POST['status'])){

$id=$_POST['id'];
$status=($_POST['status'] == 'OUI') ? 'Accepter' : 'Refuser' ;

$proposition = new Proposition($bdd);
$result = $proposition->updateStatus($id, $status);

if($result){

echo 'statue mise a jour';

}else{

echo "statue n'a pas était mise a jour";

}
}

?>