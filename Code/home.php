    <?php

    include_once 'nav.php';
    include_once 'db.php';

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <style>
            img {
                max-width: 200px;
            }
        </style>
    </head>

    <body>

        <h1>Home</h1>
        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Itaque non, iure perferendis, est excepturi laudantium minus facilis deserunt dignissimos porro facere necessitatibus recusandae minima delectus! Nostrum quam deserunt cupiditate error.</p>
        <form method="post">
            <input type="text" name="text">
            <input type="submit" value="search" name="searchSubmit">
        </form>



        <?php

        //Show categories with number of views
        $query = "SELECT categories.name as name,count(movies.title) as number FROM movies INNER JOIN categories ON movies.category_id=categories.id GROUP BY categories.name";
        $result = mysqli_query($conn, $query);
        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        echo '<ul>';
        foreach ($categories as $category) {
            echo '<li>' . $category['name'] . '(' . $category['number'] . ')' . '</li>';
        }

        //Search form
        if (isset($_POST['searchSubmit']) && !empty($_POST['text'])) {
            echo '<h2>Search Results</h2>';
            $text = $_POST['text'];
            $querySearch = "SELECT * FROM movies WHERE title LIKE '%$text%'";
            $resultsSearch = mysqli_query($conn, $querySearch);
            $moviesMatch = mysqli_fetch_all($resultsSearch, MYSQLI_ASSOC);
            foreach ($moviesMatch as $movie) : ?>
                <p>
                    <?= $movie['title'] ?>
                </p>
                <img src="<?= $movie['poster'] ?>">

            <?php endforeach; ?>

            <?php
        }
        //Show last added movies
        else {
            echo '<h2>Last added Movies</h2>';

            $queryTopMovies = "SELECT * FROM movies ORDER BY id DESC LIMIT 3";
            $resultTopMovies = mysqli_query($conn, $queryTopMovies);
            $topMovies = mysqli_fetch_all($resultTopMovies, MYSQLI_ASSOC);
            foreach ($topMovies as $movie) : ?>
                <p>
                    <?= $movie['title'] ?>
                </p>
                <a href="movie.php?id=<?= $movie['id'] ?>"><img src="<?= $movie['poster'] ?>"></a>

        <?php endforeach;
        }
        ?>


    </body>

    </html>