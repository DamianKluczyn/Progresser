<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login(){
        $user = new User('jnowak@pk.pl', 'nowak', 'admin');

        var_dump($_POST);
        die();
    }

}