<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="public/CSS/style.css">
    <script src="public/scripts/boards.js"></script>
    <title>Boards</title>
</head>
<body>
    <div class="main-page">
        <div class="navbar">
            <img class="navbar-icon icon" src="public/img/settings.svg" alt="logo">
            <img class="navbar-icon icon" src="public/img/logout.svg" alt="logo">
        </div>
        <div class="content-form" id="content-form">
            <h1>UPLOAD</h1>
            <form action="addBoard" method="POST" ENCTYPE="multipart/form-data">
                <?php
                if(isset($messages)){
                    foreach ($messages as $message){
                        echo $message;
                    }
                }
                ?>
                <input name="title" type="text" placeholder="title">
                <textarea name="description" rows="5" placeholder="description"></textarea>

                <input name="file" type="file">
                <button type="submit" class="FileBtn">send</button>
            </form>
        </div>
    </div>
</body>
</html>