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
    <div class="container">
        <a href="index.php">
            <img class="logo pull-right" src="img/Logo.png" alt="">
        </a>
    </div>
    <div class="container">
        <h1 class="bigTitle">
            Artiesten
        </h1>
    <?php
    $tracks = $api->getMyTop('artists', [
        'limit' => 5,
    ]);

//    print "<pre>";
//    print_r($tracks->items[0]->id);
//    print "</pre>";

    foreach ($tracks->items as $item) {
        ?>
        <div class="col-md-4">
            <a href="artiest.php?id=<?php echo $item->id; ?>">
                <div class="options optionMiddel">
                    <p id="options"><?php echo $item->name; ?></p>
                </div>
            </a>
        </div>
        <?php
    }
    ?>
        <div class="col-md-4">
            <a href="index.php">
                <div class="options optionMiddel">
                    <p id="options">Terug</p>
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