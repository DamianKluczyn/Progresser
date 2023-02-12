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
    <div class="navbar">
        <img class="navbar-icon icon" src="public/img/settings.svg" alt="logo">
        <img class="navbar-icon icon" src="public/img/logout.svg" alt="logo">
    </div>

    <div class="content">

        <?php foreach($lists as $list): ?>
            <div class="list">
                <div class="header">
                    <div class="list-title">
                        <?= $list -> getTitle(); ?>
                    </div>
                </div>
                <?php foreach($tasks as $task): ?>
                    <div class="task">
                        <div class="task-title">
                            <?= $task -> getTitle(); ?>
                        </div>
                        <div class="difficulty">
                            <?= $task -> getDifficulty(); ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>

</div>
</body>
</html>

