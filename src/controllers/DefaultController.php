<?php

require_once 'AppController.php';

class DefaultController extends AppController
{

    public function index()
    {
        //TODO dispaly login.php
        $this -> render('login');

    }

    public function register()
    {
        //TODO display register.php
        $this -> render('register');
    }

    public function boards()
    {
        //TODO display boards.php
        $this -> render('boards');
    }
}
