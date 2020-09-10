<?php
include_once 'nav.php';
include_once 'db.php';


if (isset($_POST['catSubmit'])) {
    $selectCat = $_POST['categories'];
    $newCat = $_POST['catText'];
    if ($selectCat == "addCategory") {
        $query = "INSERT INTO categories(name) VALUES('$newCat')";
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo 'You added a new category : ' . $newCat;
        } else {
            echo 'Oops, something went wrong when adding a new category !';
        }
    }
    //$querySelect = "SELECT name from categories WHERE name='$selectCat'";
    else {
        //Retrieve thhe categories.id of the selected category
        $queryCategory = "SELECT id FROM categories WHERE name='$selectCat'";
        $resultCategory = mysqli_query($conn, $queryCategory);
        $category = mysqli_fetch_assoc($resultCategory);
        $categoryId = $category['id'];
        //Update database with user input
        $query = "UPDATE categories 
        SET name='$newCat' WHERE id='$categoryId'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo 'You changed ' . $selectCat . ' to ' . $newCat . '!';
        } else {
            echo 'Error !';
        }
    }
}

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
    <h1>Categories</h1>
    <form method="post">

        <select name="categories">
            <option value="addCategory" selected></option>
            <?php foreach ($categories as $category) : ?>
                <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <br>
        <br>
        <textarea name="catText" placeholder="Change category name"></textarea>
        <input type="submit" name="catSubmit">
    </form>
    <?php
    ?>
</body>

</html>