<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 9-3-2017
 * Time: 14:09
 */
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
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <?php
    $playlist = $api->getUserPlaylist('spotify_netherlands', '1EnTBEgCWiTX2YHyAzkcFn');
    $playlist2 = $api->getUserPlaylist('spotifycharts', '37i9dQZEVXbKCF6dqVpDkS');
    $playlist3 = $api->getUserPlaylist('spotifycharts', '37i9dQZEVXbMQaPQjt027d');

        ?>
    <div class="container">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </div>
    <div class="container">
        <h1 class="bigTitle">Nieuwe Muziek</h1>
        <div class="col-md-6">
            <a href="New-Music-Friday-NL.php">
                <div class="options" id="option1">
                    <p id="optionsNoIcon"><?php echo $playlist->name ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="Netherlands-Top-50.php">
                <div class="options" id="option2">
                    <p id="optionsNoIcon"><?php echo $playlist2->name ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="Netherlands-Viral-50.php">
                <div class="options" id="option3">
                    <p id="optionsNoIcon"><?php echo $playlist3->name ?></p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="index.php">
                <div class="options optionBackHome" id="option4">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    <p id="options">Terug</p>
                </div>
            </a>
        </div>
    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="responsivevoice.js"></script>
    <script type="text/javascript" src="action-new-music.js"></script>
    </body>
    </html>


    <?php
} else {
    header('Location: ' . $session->getAuthorizeUrl($scopes));
    die();
} ?>