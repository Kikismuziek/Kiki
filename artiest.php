<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 16-3-2017
 * Time: 11:48
 */

include ('api.php');

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);
};

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Artiest</title>
</head>
<body>

<?php
$tracks = $api->getArtistTopTracks($id, [
    'country' => 'us',
]);

    print "<pre>";
print_r($tracks);
    print "</pre>";

//foreach($tracks)
?>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="action.js"></script>
</body>
</html>
