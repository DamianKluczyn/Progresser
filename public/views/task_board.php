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
                <div class="header">
                    <div class="list-title">
                        <?= $list -> getLTitle(); ?>
                    </div>
                </div>
                    <?php for($i = 0; $i <= $list->countTask(); $i++ ): ?>
                    <div class="task">
                        <div class="task-title">
                            <?= $list -> getTName(); ?>
                        </div>
                        <div class="difficulty">
                            <?= $list -> getTDifficulty(); ?>
                        </div>
                    </div>
                    <?php endfor; ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</body>
</html>

