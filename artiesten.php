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
    $tracks = $api->getMyTop('artists', [
        'limit' => 5,
    ]);

    foreach ($tracks->items as $item) {
        ?>
        <a href="<?php echo $item->external_urls->spotify; ?>">
            <div class="optionsMiddel optionMiddel">
                <p id="options"><?php echo $item->name; ?></p>
            </div>
        </a>
        <?php
    }
    ?>
    <a href="index.php">
        <div class="optionsMiddel optionMiddel">
            <p id="options">Terug</p>
        </div>
    </a>

    </body>
    </html>


    <?php
} else {
    header('Location: ' . $session->getAuthorizeUrl($scopes));
    die();
} ?>