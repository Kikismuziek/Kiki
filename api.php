<?php

require 'vendor/autoload.php';

$session = new SpotifyWebAPI\Session('381aff990d6b44ff86ec10b075458680', '0dd5204b7030479ca6973dcd8a9b318b', 'http://localhost/Kiki/callback.php');

$scopes = array(
    'playlist-read-private',
    'user-read-private',
    'user-read-recently-played',
    'user-library-read',
    'user-follow-read',
    'user-top-read'
);

$authorizeUrl = $session->getAuthorizeUrl(array(
    'scope' => $scopes
));
$api = new SpotifyWebAPI\SpotifyWebAPI();
session_start();
//if we have an access token set it
if (isset($_SESSION['accessToken'])) {
    $api->setAccessToken($_SESSION['accessToken']);
}
?>