<?php
session_start();
require_once 'vendor/autoload.php'; //Include PHP Client Library

//Create client object and set its configuration
$client = new Google_Client();
$client->setAuthConfig('include/client_secret.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/index.php');
$client->setAccessType('offline');
$client->setApprovalPrompt('force');
$client->addScope(array("email", "profile"));

//Check if the access token is already set and if it is, var dump access token
if(isset($_SESSION["access_token"]) && $_SESSION["access_token"] ) {

    $client->setAccessToken($_SESSION['access_token']);

    var_dump($_SESSION['access_token']);

} else { // if access token is not set, authenticate client

  if( !isset($_GET["code"]) ) { // if there is no access code

    $auth_url = $client->createAuthUrl();
    header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));

  } else { //if there is an access code
    

    // $client->authenticate($_GET['code']); //authenticate client
    // var_dump($client);
    // die;
    $_SESSION['access_token'] = $client->fetchAccessTokenWithAuthCode(urldecode($_GET['code'])); //save access token to session
    $redirect_uri = "http://".$_SERVER['HTTP_HOST']."/tradegame/index.php";
    header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));

  }
}