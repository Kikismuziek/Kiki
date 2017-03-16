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
<div class="container">
    <a href="index.php">
        <img class="logo pull-right" src="img/Logo.png" alt="">
    </a>
</div>
<div class="container">

    <?php

$tracks = $api->getArtistTopTracks($id, [
    'country' => 'us',
]);
//    print '<pre>';
//    print_r($tracks);
//    print '</pre>';

$count = 0;
$number = 0;
$array1 = array();

?>
    <h1 class="bigTitle"><?php echo $tracks->tracks[0]->album->artists[0]->name; ?></h1>

<?php
foreach(array_chunk($tracks->tracks, 4, true) as $array){
    $count++;
    echo "<div class='wrapper wrapper$count' data-wrapperid='$count' id='wrapper$count'>";
    foreach ($array as $item) {
        $number++;
        ?>
        <div class="col-md-3">
            <a href="nummer.php?id=<?php echo $item->id ?>">
                <div class="options option optionsSmall" href="nummer.php?id=<?php echo $item->id ?>" id="option<?php echo $number ?>" data-text="<?php echo $item->track->name; ?>">
                    <p id="optionSmall"><?php echo mb_strimwidth($item->name, 0, 15, '...'); ?></p>
                </div>
            </a>
        </div>

        <?php
        array_push($array1, $item->id);
    }
    echo "</div>";
}
$_SESSION['songs'] = $array1;

?>
<div class="backBtn col-md-3">
    <a href="javascript:history.back()">
        <div class="options optionBackHome optionsSmall">
            <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
            <p id="optionSmall">Terug</p>
        </div>
    </a>
</div>
<div class="homeBtn col-md-3">
    <a href="index.php">
        <div class="options optionBackHome optionsSmall">
            <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
            <p id="optionSmall">Home</p>
        </div>
    </a>
</div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript">
    var back = $(".backBtn");
    var home = $(".homeBtn");

    var wrapper = $(".wrapper");
    var wrapper3 = $(".wrapper3");

    back.appendTo(wrapper3);
    home.appendTo(wrapper3);
</script>
</body>
</html>
