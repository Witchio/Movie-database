<?php
include_once 'nav.php';
include_once 'db.php';

//Create a table with the category, use it to create select options
$query = "SELECT name FROM categories";
$result = mysqli_query($conn, $query);

$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Add Movie :</h1>
    <form method="post">
        <input type="text" name="title" placeholder="Title of the movie">
        <input type="date" name="date" placeholder="Releaese Date">
        <input type="text" name="synopsis" placeholder="Synopsis">
        <select name="categories">
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="text" name="poster" placeholder="Poster">
        <input type="submit" name="movieSubmit" value="Add movie">
    </form>

    <?php
    //Movie submit form
    if (isset($_POST['movieSubmit'])) {
        //Retrieve input data
        $title = $_POST['title'];
        $date = $_POST['date'];
        $synopsis = mysqli_real_escape_string($conn, $_POST['synopsis']);
        //Retrieve id of the category selected in the dropdown menu
        $category = $_POST['categories'];
        $queryCategory = "SELECT id from categories WHERE name='$category'";
        $resultCategory = mysqli_query($conn, $queryCategory);
        $category = mysqli_fetch_assoc($resultCategory);
        $categoryId = $category['id'];

        $poster = $_POST['poster'];
        //Push to db
        $query = "INSERT INTO movies(title,release_date,synopsis,category_id,poster) VALUES ('$title','$date','$synopsis','$categoryId','$poster')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'Movie added !';
        } else {
            echo 'Erroor';
        }
    }
    ?>
</body>

</html>