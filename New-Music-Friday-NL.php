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
        <link href="style.css" type="text/css" rel="stylesheet"/>
        <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
    <div class="container">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </div>
    <div class="container">
    <?php
    $tracks = $api->getUserPlaylistTracks('spotify_netherlands', '1EnTBEgCWiTX2YHyAzkcFn', array('limit' => 14));
    $playlist = $api->getUserPlaylist('spotify_netherlands', '1EnTBEgCWiTX2YHyAzkcFn');
    ?>

        <h1 class="bigTitle"><?php echo $playlist->name; ?></h1>

    <?php
    foreach(array_chunk($tracks->items, 4, true) as $array){
        echo "<div class='wrapper'>";
        foreach ($array as $item) {
            ?>
            <div class="col-md-3">
                <a href="nummer.php?id=<?php echo $item->track->id ?>">
                    <div class="options option optionsSmall" data-text="<?php echo $item->track->name; ?>">
                        <p id="optionSmall"><?php echo mb_strimwidth($item->track->name, 0, 15, '...'); ?></p>
                    </div>
                </a>
            </div>

            <?php
        }
        echo "</div>";
    }

    ?>

        <div class="wrapper">
            <div class="col-md-3">
                <a href="javascript:history.back()">
                    <div class="options optionBackHome optionsSmall">
                        <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                        <p id="optionSmall">Terug</p>
                    </div>
                </a>
            </div>
            <div class="col-md-3">
                <a href="index.php">
                    <div class="options optionBackHome optionsSmall">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                        <p id="optionSmall">Home</p>
                    </div>
                </a>
            </div>
        </div>

    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
    </html>


    <?php
} else {
    header('Location: ' . $session->getAuthorizeUrl($scopes));
    die();
} ?>