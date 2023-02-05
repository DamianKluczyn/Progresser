<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct() {
        parent::__construct();
        $this -> userRepository = new UserRepository();
    }

    public function login() {

        if (!$this->isPost()) {
           return $this -> render('login');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = $this -> userRepository -> getUser($login);

        if(!$user) {
            return $this -> render('login',['messages' => ['User not exist!']]);
        }

        if($user->getLogin() !== $login) {
            return $this -> render('login',['messages' => ['User with this login not exist!']]);
        }

        if($user->getPassword() !== $password) {
            return $this -> render('login',['messages' => ['Wrong password']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/boards");
    }

    public function register() {

        if(!$this->isPost()) {
            return $this -> render('register');
        }

        $login = $_POST['login'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];

        if($password !== $confirmedPassword) {
            return $this -> render('register', ['messages' => ['Passwords must be the same!']]);
        }

        // TODO hashowanie
        $user = new User($email, $login, $password);

        $this -> userRepository -> addUser($user);

        return $this -> render('login', ['messages' => ['Register successful!']]);
    }

}