<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">

        <div class="logo">
            <img src="public/img/logo.svg" alt="logo">
        </div>
        <!-- TODO user premium - nielimitowana liczba boardow, user normalny max 5 -->
        <div class="login-container">
            <form class="login" action="login" method="post">
                <input name="login" type="text" placeholder="Login">
                <input name="password" type="password" placeholder="Password">
                <div class="message">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <button class="LoginBtn" type="submit">
                    Login
                </button>
                <a href="register.php" id="registerLink">Register</a>
            </form>
        </div>

    </div>

</body>
</html>