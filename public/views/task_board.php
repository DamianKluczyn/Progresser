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
    <title>Boards</title>
</head>
<body>
<div class="main-page">
    <?php
        include('board_menu.php');
    ?>

    <div class="content">

        <?php foreach($lists as $list): ?>
            <div class="list">

                <div class="list-title">
                    <?= $list -> getLTitle(); ?>
                </div>

                <?php foreach($tasks[$list -> getLTitle()] as $task): ?>
                <div class="task">
                    <div class="task-title <?= $task -> getNamePriority($task -> getTPriority()); ?>">
                        <?= $task -> getTName(); ?>
                    </div>
                    <div class = "difficulty-container-tasks">
                        <div class="difficulty-bar difficulty-one <?= $task -> getNameDifficulty($task -> getTDifficulty()); ?>"></div>
                        <div class="difficulty-bar difficulty-two <?= $task -> getNameDifficulty($task -> getTDifficulty()); ?>"></div>
                        <div class="difficulty-bar difficulty-three <?= $task -> getNameDifficulty($task -> getTDifficulty()); ?>"></div>
                        <div class="difficulty-bar difficulty-four <?= $task -> getNameDifficulty($task -> getTDifficulty()); ?>"></div>
                    </div>
                </div>
                <?php endforeach; ?>
                <a href="addTask?id_list=<?= $list->getIdList(); ?>">
                    <div class="add_task">
                        ADD
                    </div>
                </a>

            </div>
        <?php endforeach; ?>
    </div>

</div>
</body>
</html>

