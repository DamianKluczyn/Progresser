<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('register', 'SecurityController');
Routing::get('boards', 'BoardController');
Routing::post('login', 'SecurityController');
Routing::post('addBoard', 'BoardController');
Routing::run($path);