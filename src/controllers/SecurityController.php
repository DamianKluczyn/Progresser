<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login(){
        $user = new User('jnowak@pk.pl', 'nowak', 'admin');

        $login = $_POST['login'];
        $password = $_POST['password'];

        if($user->getLogin() !== $login){
            return $this -> render('login',['messages' => ['User with this login not exist!']]);
        }

        if($user->getPassword() !== $password){
            return $this -> render('password',['messages' => ['Wrong password']]);
        }
    }

}