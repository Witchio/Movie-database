<?php

include_once('nav.php');
include_once('db.php');

if (isset($_GET['id'])) {
    $movieID = (int) $_GET['id'];
}

$query = "SELECT * FROM movies INNER JOIN categories ON movies.category_id=categories.id WHERE movies.id=$movieID";
$result = mysqli_query($conn, $query);

$movie = mysqli_fetch_assoc($result);

echo $movie['title'] . '<br>';
$url = $movie['poster'];
$poster = '<img src="' . $url . '"></img>';
echo $poster . '<br>';
echo $movie['synopsis'] . '<br>';
echo '<hr>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            max-width: 200px;
        }
    </style>
</head>

<body>

</body>

</html>