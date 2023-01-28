<?php
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class BoardController extends AppController
{
    public function login(){
        $user = new User('jnowak@pk.pl', 'nowak', 'admin');

        if (!$this->isPost()){
           return $this->render('login');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        if($user->getLogin() !== $login){
            return $this -> render('login',['messages' => ['User with this login not exist!']]);
        }

        if($user->getPassword() !== $password){
            return $this -> render('login',['messages' => ['Wrong password']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/boards");
    }

}