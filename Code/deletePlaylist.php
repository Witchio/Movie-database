<?php
include_once 'db.php';
if (isset($_GET['id'])) {
    $playlistId = $_GET['id'];
} else {
    $playlistId = 1;
}

$query = "DELETE FROM playlists WHERE playlists.id=$playlistId";
$result = mysqli_query($conn, $query);

if ($result) {
    echo 'deleted !';
} else {
    echo 'error';
}


header("Location: playlists.php");
