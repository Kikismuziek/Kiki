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
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </div>
    <div class="container">
        <h1 class="bigTitle">Welkom Kiki!</h1>
        <div class="col-md-6">
            <a href="laatst-afgespeeld.php">
                <div class="options" id="option1">
                    <span class="glyphicon glyphicon-time" aria-hidden="true"></span>
<!--                    <img class="icon" src="img/002-replay.png" alt="">-->
                    <p id="options">Onlangs afgespeeld</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="favorieten.php">
                <div class="options" id="option2">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
<!--                    <img class="icon" src="img/005-star.png" alt="">-->
                    <p id="options">Favorietenlijst</p>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="artiesten.php">
                <div class="options" id="option3">
                    <span class="glyphicon glyphicon-music" aria-hidden="true"></span>
<!--                    <img id="elvis" class="icon" src="img/Poppetje.png" alt="">-->
                    <p id="options">Artiesten</p>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="nieuwe-muziek.php">
                <div class="options" id="option4">
                    <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
<!--                    <img class="icon" src="img/Zoek.png" alt="">-->
                    <p id="options">Nieuwe muziek</p>
                </div>
            </a>
        </div>

    </div>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="responsivevoice.js"></script>
    <script type="text/javascript" src="action.js"></script>
    </body>
    </html>


    <?php
} else {
    header('Location: ' . $session->getAuthorizeUrl($scopes));
    die();
} ?>