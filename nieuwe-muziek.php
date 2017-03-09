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
    </head>
    <body>
    <?php
    $playlist = $api->getUserPlaylist('spotify_netherlands', '1EnTBEgCWiTX2YHyAzkcFn');
    $playlist2 = $api->getUserPlaylist('spotifycharts', '37i9dQZEVXbKCF6dqVpDkS')

        ?>
        <a href="">
            <div class="options option">
                <p id="options"><?php echo $playlist->name ?></p>
            </div>
        </a>
        <a href="">
            <div class="options option">
                <p id="options"><?php echo $playlist2->name ?></p>
            </div>
        </a>
        <?php
    ?>
    <a href="index.php">
        <div class="options option">
            <p id="options">Terug</p>
        </div>
    </a>
    <a href="index.php">
        <div class="options option">
            <p id="options">Home</p>
        </div>
    </a>

    </body>
    </html>


    <?php
} else {
    header('Location: ' . $session->getAuthorizeUrl($scopes));
    die();
} ?>