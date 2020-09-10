<?php
session_start();
//Connecting to database
// Not including db.php because it has an echo in it which will disturb the return of the ajax call
$conn = mysqli_connect('localhost', 'root', 'root', '', '8889');
$db_name = 'movieProject';
$db_found = mysqli_select_db($conn, $db_name);
$conn->set_charset("utf8");
//Form to retrieve user login input
if (isset($_POST)) {
    //Calling variables for input
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Create query to get email/password from users table on db
    $mailQuery = "SELECT * FROM users";
    $mailResult = mysqli_query($conn, $mailQuery);
    //Query check ok
    /*
        if ($mailResult) {
            echo 'Query ok !';
        } else {
            echo 'Query not ok!';
        }
        */
    $testMails = mysqli_fetch_all($mailResult, MYSQLI_ASSOC);
    //Create variable to see if mail/pw check was positive or noot
    $pwCheck = false;
    foreach ($testMails as $test) {
        if ($test['email'] == $email && password_verify($password, $test['password'])) {
            $pwCheck = true;
            $_SESSION['username'] = $test['firstName'];
            $_SESSION['userId'] = $test['id'];
            $_SESSION['order'] = "desc";
        }
    }
    if ($pwCheck) {
        echo 'true';
    } else {
        echo 'false';
    }
}
