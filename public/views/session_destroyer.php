<?php
    session_start();
    session_destroy();

    foreach ($_COOKIE as $key => $value) {
        unset($value);
        setcookie($key, '', time() - 3600);
    }

    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
?>
