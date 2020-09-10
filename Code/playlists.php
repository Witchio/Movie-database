<?php
include_once 'nav.php';
include_once 'db.php';

$userId = $_SESSION['userId'];

if (isset($_POST['submitPlaylist'])) {
    $playlistName = $_POST['newPlaylist'];
    $date = date('Y-m-d');
    $queryAddPlaylist = "INSERT INTO playlists(name,date,user_id)VALUES('$playlistName', '$date', $userId)";
    $addPlaylist = mysqli_query($conn, $queryAddPlaylist);
    if ($addPlaylist) {
        echo 'Playlist ' . $playlistName . ' has been added !';
    } else {
        echo 'Error adding the playlist !';
    }
}

$query = "SELECT name,id FROM playlists WHERE playlists.user_id=$userId";
$result = mysqli_query($conn, $query);
$playlists = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Playlists</h1>
    <form method="post">
        <input type="text" name="newPlaylist" placeholder="Create new playlist">
        <input type="submit" name="submitPlaylist" value="Create playlist">
    </form>
    <form method="get">
        <ul>
            <?php foreach ($playlists as $playlist) : ?>
                <li><?= $playlist['name'] ?></li>
                <a href="deletePlaylist.php?id=<?= $playlist['id']; ?>"><input type="button" value="delete"></a>
                <input type="button" value="edit" name="edit">
            <?php endforeach; ?>
        </ul>
    </form>

</body>

</html>