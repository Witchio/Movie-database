<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Register new account!</h1>
    <form method="post">
        <input type="text" name="firstName" placeholder="Your first name...">
        <input type="text" name="lastName" placeholder="Your last name....">
        <input type="mail" name="email" placeholder="Your email adress...">
        <input type="password" name="password" placeholder="Your password....">
        <input type="submit" value="Register" name="submitRegister">
    </form>
    <a href="login.php">
        <h3>Go to Login</h3>
    </a>
    <?php
    session_start();
    //Just to omakee sure user doesn't get to this page when already logged in
    if (!empty($_SESSION)) {
        header("Location: home.php");
    }
    //include db
    include_once('db.php');
    //Register Form
    if (isset($_POST['submitRegister'])) {
        /// Still need to do the mail check
        $errors = [];
        //Catching all the inputs
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //Check if mail is already used
        $checkQuery = "SELECT email FROM users";
        $checkResult = mysqli_query($conn, $checkQuery);
        $mails = mysqli_fetch_all($checkResult, MYSQLI_ASSOC);

        //Create variable that says if mail is already used or not
        $test = true;
        //Mail check
        foreach ($mails as $mail) {
            if ($email == $mail['email']) {
                echo 'E-mail adress already used !';

                $test = false;
                break;
            }
        }
        echo $test;
        //Register will only work if test is ok
        if ($test) {

            $query = "INSERT INTO users(firstName,lastName,email,password) VALUES ('$fName','$lName','$email','$password')";
            //Connect to db
            $result = mysqli_query($conn, $query);
            //Connection check
            if ($result) {
                echo 'db updated!';
            } else {
                echo 'Sumting wong';
            }
        }
    }
    ?>
</body>

</html>