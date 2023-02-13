<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <script type="text/javascript" src="./public/js/registerValidation.js" defer></script>
    <title>Register</title>
</head>
<body>
    <div class="container">

        <div class="logo">
            <img src="public/img/logo.svg" alt="logo">
        </div>

        <div class="register-container">
            <form class="register" action="register" method="post">
                <input name="login" type="text" placeholder="Login">
                <input name="email" type="text" placeholder="Email">
                <input name="password" type="password" placeholder="Password">
                <input name="confirmedPassword" type="password" placeholder="Repeat password">
                <div class="message">
                    <?php
                        if(isset($messages)){
                            foreach ($messages as $message){
                                echo $message;
                            }
                        }
                    ?>
                </div>
                <button class="RegisterBtn" type="submit">
                    Register
                </button>
            </form>
        </div>
    </div>
</body>
</html>