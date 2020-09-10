<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Log In</h1>
    <form method="post">
        <input type="mail" name="email" placeholder="Your email adress...">
        <input type="password" name="password" placeholder="Your password....">
        <input type="submit" name="submitUser" value="Log in">
    </form>
    <a href="register.php">
        <h3>Register now !</h3>
    </a>
    <div id="ajaxDiv">...</div>
    <?php
    //Just so user can't get to this page if already logged in
    if (!empty($_SESSION)) {
        header("Location: home.php");
    }

    ?>

    <!--AAAAJJJJAAAAAXXXXXXX-->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $('input[type="submit"]').click(function(e) {
                e.preventDefault();

                $.ajax({
                    url: 'loginPage.php',
                    type: 'post',
                    data: $('form').serialize(),
                    success: function(result) {
                        if (result == 'true') {
                            url = "home.php";
                            $(location).attr('href', url);
                        } else {
                            $('#ajaxDiv').html('Wrong username/password !');
                        }
                    },
                    error: function(err) {
                        console.log("error");
                    }
                })
            })
        })
    </script>
</body>

</html>