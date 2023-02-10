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

            <?php foreach($boards as $board): ?>
            <div class="board">
                <div class="red-section">
                    <div class="board-icon">
                       <img src="public/uploads/<?= $board->getBackground_img() ?>" class="board-img">
                    </div>
                    <div class="board-title">
                        <?= $board -> getTitle(); ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="board">
                <div class="red-section">
                    <a href="addBoard" class="add">
                        <button class = "add_board" type="submit"></button>
                    </a>
                </div>
            </div>
        </div>

    </div>
</body>
</html>