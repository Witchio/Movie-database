<?php
$conn = mysqli_connect('localhost', 'root', 'root', '', '8889');
$db_name = 'movieProject';
$db_found = mysqli_select_db($conn, $db_name);
$conn->set_charset("utf8");
if ($db_found) {
    echo '<font color=green> Db Connected  ! </font>' . '<br>';
} else {
    echo 'No db found :(';
}
