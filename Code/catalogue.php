<?php
include_once 'nav.php';
include_once 'db.php';

//Get all the data from the movies
$query = "SELECT * FROM movies ORDER BY release_date DESC LIMIT 3,5";
$result = mysqli_query($conn, $query);
$movies = mysqli_fetch_all($result, MYSQLI_ASSOC);


if (isset($_POST['submit'])) {
    if ($_SESSION['order'] == "asc") {
        $query = "SELECT * FROM movies ORDER BY release_date DESC LIMIT 3";
        $result = mysqli_query($conn, $query);
        $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['order'] = "desc";
    } else {

        $query = "SELECT * FROM movies ORDER BY release_date ASC LIMIT 3";
        $result = mysqli_query($conn, $query);
        $movies = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['order'] = "asc";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            max-width: 300px;
        }
    </style>
</head>

<body>
    <h1>Catalogue</h1>
    <form method="post">
        <input type="submit" name="submit" value="Invert chronological order">
    </form>
    <?php

    foreach ($movies as $movie) : ?>
        <hr>
        <img src="<?= $movie['poster'] ?>">
        <p>
            <?= $movie['id'] ?>
        </p>
        <p>
            <?= $movie['title'] ?>
        </p>
        <p>
            <?= $movie['synopsis'] ?>
        </p>

        <a href='movie.php?id=<?= $movie['id'] ?>'>Details</a><br>
        <a href="">Change Details</a><br>
        <form method="post">
            <input type="submit" name="playlistSubmit" value="Add to playlist">
        </form>
        <hr>
        <?php
        if (isset($_POST['playlistSubmit'])) {
            $movieId = $movie['id'];
            $plQuery = "INSERT INTO playlist(movie_id, playlist_id) VALUES($movieId,1)";
            $result = mysqli_query($conn, $plQuery);
        } ?>
    <?php endforeach; ?>
</body>

</html>