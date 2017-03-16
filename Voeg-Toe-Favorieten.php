<?php
/**
 * Created by PhpStorm.
 * User: Plaisir
 * Date: 16-3-2017
 * Time: 00:35
 */

include('api.php');

$id = '';

if (isset($_GET['id'])) {
    $id = ($_GET['id']);
};

$api->addMyTracks([
    $id,
]);