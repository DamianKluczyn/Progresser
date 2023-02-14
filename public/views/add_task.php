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
    <script src="public/js/add_task_script.js" defer></script>
    <title>Boards</title>
</head>
<body>
<div class="main-page">

    <div class="navbar">

        <a href="task_board?id_board=<?= $_GET['id_board'] ?>">
            <img class="navbar-icon" src="public/img/back.png" alt="back">
        </a>

        <a href="session_destroyer" class = "logout-button">
            <img class="navbar-icon" src="public/img/logout.svg" alt="log out">
        </a>

    </div>

    <div class="add_task_form">
        <form class="add" action="addTask" method="post">
            <div class="message">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message){
                        echo $message;
                    }
                }
                ?>
            </div>

            <div class = "add_task_text">Task name</div>
            <input name = "task_name" type = "text" placeholder = "Task name">

            <div class = "add_task_text">Dfficulty</div>
            <div class = "difficulty-container">
                <div class = "difficulty-bar difficulty-one"></div>
                <div class = "difficulty-bar difficulty-two"></div>
                <div class = "difficulty-bar difficulty-three"></div>
                <div class = "difficulty-bar difficulty-four"></div>
            </div>

            <div class = "add_task_text">Priority</div>
            <div class = "priority-container">
                <div class = "priority priority-low">Low</div>
                <div class = "priority priority-mid">Mid</div>
                <div class = "priority priority-ASAP">ASAP</div>
            </div>

            <button type="submit" class = "AddBtn">Add</button>
        </form>
    </div>
</div>
</body>
</html>
