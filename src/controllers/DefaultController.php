<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        //TODO dispaly login.html
        $this -> render('login');

    }

    public function register()
    {
        //TODO display register.html
        $this -> render('register');
    }

    public function boards()
    {
        //TODO display boards.html
        $this -> render('boards');
    }
}
