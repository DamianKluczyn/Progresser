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
    <title>User Settings</title>
</head>

<body>

    <?php
        include('user_settings_menu.php');
    ?>

    <div class="container">
        <div class="user-settings-container">
            <form class="change" action="user_settings" method="post">
                <div class="message">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="premium" id="premium-checkbox" type="checkbox" value="premium">
                <label for="premium-checkbox"> Premium </label><br>
                <button type="submit" class="SaveBtn">Save</button>
            </form>
        </div>
    </div>
</body>
</html>
