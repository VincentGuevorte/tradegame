<?php
require_once __DIR__.'/vendor/autoload.php';

session_start();

$client = new Google_Client();
$client->setAuthConfigFile('include/client_secret.json');
$client->setRedirectUri('http://' . $_SERVER['HTTP_HOST'] . '/tradegame/index.php');
$client->addScope(Google_Service_Drive::DRIVE_METADATA_READONLY);
// var_dump($_GET['code']);
// die;
if (! isset($_GET['code'])) {
  $auth_url = $client->createAuthUrl();
  header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
} else {
  $client->authenticate($_GET['code']);
  var_dump($client);
  $_SESSION['access_token'] = $client->getAccessToken();
  $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/tradegame/connect.php';
  var_dump($_SESSION);
  die;
  header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}