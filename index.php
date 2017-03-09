<?php
error_reporting(-1);
ini_set('display_errors', 1);
require 'vendor/autoload.php';
$session = new SpotifyWebAPI\Session('381aff990d6b44ff86ec10b075458680', '0dd5204b7030479ca6973dcd8a9b318b', 'http://localhost/Kiki/callback.php');
$scopes = array(
    'playlist-read-private',
    'user-read-private',
    'user-read-recently-played',
    'user-library-read',
    'user-follow-read'
);
$authorizeUrl = $session->getAuthorizeUrl(array(
    'scope' => $scopes
));
$api = new SpotifyWebAPI\SpotifyWebAPI();
session_start();
if (isset($_SESSION['token'])) {
    $api = new SpotifyWebAPI\SpotifyWebAPI();
    $accessToken = $_SESSION['token'];
    $api->setAccessToken($accessToken);

    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <link href="style.css" type="text/css" rel="stylesheet"/>
    </head>
    <body>
    <div class="container">
        <a href="laatst-afgespeeld.php">
            <div class="options option1">
                <p id="options">Laatst afgespeeld</p>
            </div>
        </a>
        <a href="favorieten.php">
            <div class="options option2">
                <p id="options">Favorieten lijst</p>
            </div>
        </a>
        <a href="artiesten.php">
            <div class="options option3">
                <p id="options">Artiesten</p>
            </div>
        </a>
        <a href="nieuwe-muziek.php">
            <div class="options option4">
                <p id="options">Nieuwe muziek</p>
            </div>
        </a>
    </div>
    </body>
    </html>


    <?php
} else {
    header('Location: ' . $session->getAuthorizeUrl($scopes));
    die();
} ?>