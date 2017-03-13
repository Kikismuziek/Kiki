<?php

include('api.php');

if (isset($_GET['id'])) {
    $id = ($_GET['id']);
};

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<iframe src="https://embed.spotify.com/?uri=spotify:track:<?php echo $id; ?>" width="750px" height="700px" style="float: left" frameborder="0" allowtransparency="true"></iframe>

<a href="nummer.php?id=<?php echo $id ?>">
    <div class="optionsKlein optionsKlein">
        <p id="options">Opnieuw</p>
    </div>
</a>

<a href="#" onclick="function () {
        $api->addMyTracks([
        '<?php echo $id ?>'
        ]);
        }">
    <div class="optionsKlein optionsKlein">
        <p id="options">Voeg toe aan favorieten</p>
    </div>
</>

<a href="index.php">
    <div class="optionsKlein optionsKlein">
        <p id="options">Vorig nummer</p>
    </div>
</a>

<a href="index.php">
    <div class="optionsKlein optionsKlein">
        <p id="options">Volgend nummer</p>
    </div>
</a>

<a href="javascript:history.back()">
    <div class="optionsKlein optionsKlein">
        <p id="options">Terug</p>
    </div>
</a>

<a href="index.php">
    <div class="optionsKlein optionsKlein">
        <p id="options">Home</p>
    </div>
</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#play-button").on("click",function(e){
            console.log(e);
        });
    });
</script>
</body>
</html> 