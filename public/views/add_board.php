<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/CSS/board.css">
    <script src="public/scripts/boards.js"></script>
    <title>Boards</title>
</head>
<body>
    <div class="main-page">

        <?php
        include('board_menu.php');
        ?>

        <!-- TODO przy odswiezeniu strony automatycznie sie dodaja kolejne boardy -->
        <div class="add_board_form">
            <form class="add" action="addBoard" method="post" ENCTYPE="multipart/form-data">
                <div class="message">
                    <?php
                    if(isset($messages)){
                        foreach ($messages as $message){
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <input name="title" type="text" placeholder="title">
                <input name="file" type="file">
                <button type="submit" class="FileBtn">Add</button>
            </form>
        </div>
    </div>
</body>
</html>