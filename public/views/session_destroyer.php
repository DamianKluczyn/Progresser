<?php
    session_start();
    session_destroy();
    $url = "http://$_SERVER[HTTP_HOST]";
    header("Location: {$url}/login");
?>
