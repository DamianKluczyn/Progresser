<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'SecurityController');
Routing::get('boards', 'BoardController');
Routing::post('login', 'SecurityController');
Routing::post('addBoard', 'BoardController');
Routing::get('session_destroyer', 'DefaultController');
Routing::get('task_board', 'BoardController');
Routing::get('user_settings', 'SecurityController');
Routing::get('board_settings', 'BoardController');

Routing::run($path);