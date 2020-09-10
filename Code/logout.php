<?php

session_start();
session_unset();


echo 'Logged out !';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="login.php"><input type="button" value="Go back to login page"></a>
</body>

</html>