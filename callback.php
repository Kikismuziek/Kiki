<?php
error_reporting(-1);
ini_set('display_errors', 1);
require 'vendor/autoload.php';
$session = new SpotifyWebAPI\Session('381aff990d6b44ff86ec10b075458680', '0dd5204b7030479ca6973dcd8a9b318b', 'http://localhost/Kiki/callback.php');
$api = new SpotifyWebAPI\SpotifyWebAPI();
if (isset($_GET['code'])) {
    $session->requestAccessToken($_GET['code']);
    session_start();
    $_SESSION['token'] = $session->getAccessToken();
    header('Location: index.php');
} else {
    $scopes = [
        'scope' => [
            'playlist-read-private',
            'user-read-private',
            'user-read-recently-played'
        ],
    ];
    header('Location: ' . $session->getAuthorizeUrl($scopes));
}

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href=""/>
</head>
<body>

</body>
</html> 