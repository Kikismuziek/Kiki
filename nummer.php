<?php

include('api.php');

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);
};

$track = $api->getTrack($id);

//print "<pre>";
//print_r($track);
//print "</pre>";

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
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
        <?php echo $track->album->artists[0]->name; ?>
    </h1>
    <h2 class="songTitle">
        Gekozen nummer: <?php echo mb_strimwidth($track->name, 0, 25, '...'); ?>
    </h2>
    <div class="col-md-6">
        <iframe class="currentSong" src="https://embed.spotify.com/?uri=spotify:track:<?php echo $id; ?>" frameborder="0" allowtransparency="true"></iframe>
    </div>
    <div class="col-md-6">
        <div class="col-md-6">
            <a href="nummer.php?id=<?php echo $id ?>">
                <div class="options optionsSong option">
                    <span class="glyphicon glyphicon-repeat" aria-hidden="true"></span>
                    <p id="options">Opnieuw</p>
                </div>
            </a>
        </div>

        <div class="col-md-6">
            <a href="Voeg-Toe-Favorieten.php?id=<?php echo $id; ?>">
                <div class="options optionsSong option optionFavorite" data-id="<?php echo $id;?>">
                    <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                    <p id="options">Toevoegen favoriet</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="nummer.php?id=<?php if(isset($_SESSION['songs'])){
    echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionPrev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <p id="options">Vorig nummer</p>
                </div>
            </a>

        </div>
        <div class="col-md-6">
            <a href="nummer.php?id=<?php if(isset($_SESSION['songs'])){
                echo $_SESSION['songs'][array_rand($_SESSION['songs'])];}; ?>">
                <div class="options optionsSong option optionNext">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <p id="options">Volgend nummer</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="javascript:history.back()">
                <div class="options optionsSong optionBackHome">
                    <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                    <p id="options">Terug</p>
                </div>
            </a>
        </div>
        <div class="col-md-6">
            <a href="index.php">
                <div class="options optionsSong optionBackHome">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    <p id="options">Home</p>
                </div>
            </a>
        </div>

    </div>

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="responsivevoice.js"></script>
<script type="text/javascript" src="action.js"></script>
<script>
    $(document).ready(function() {
        $("#play-button").on("click",function(e){
            console.log(e);
        });
    });
</script>
</body>
</html> 