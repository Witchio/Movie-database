<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

        nav ul {
            list-style-type: none;
            display: flex;
            justify-content: space-between;
        }

        nav ul li {
            border: 10px black solid;
            border-radius: 15px;
            padding: 5px;
            background-color: lightcyan;

        }

        nav ul li a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 3rem;
        }
    </style>
</head>

<body>
    <nav>
        <ul>
            <li><a href="home.php">Home</a></li>
            <li><a href="catalogue.php">Movie Catalogue</a></li>
            <li><a href="categories.php">Manage Categories</a></li>
            <li><a href="addMovie.php">Add Movie</a></li>
            <li><a href="playlists.php">Playlists</a></li>
            <li>
                <a href="logout.php">Logout</a>
            </li>
        </ul>
    </nav>
    <hr>
    <?php

    session_start();
    if (empty($_SESSION)) {
        header("Location: login.php");
    } else {
        echo '<font color=red> Hello ' . $_SESSION['username'] . '!' .  '</font>' . '<br>';
    }
    ?>
</body>

</html>