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

        if (!$this -> isPost()) {
            return $this -> render('login');
        }

        $login = $_POST['login'];
        $password = $_POST['password'];

        $user = $this -> userRepository -> getUser($login);

        if(!$user) {
            return $this -> render('login',['messages' => ['User not exist!']]);
        }

        if(($user -> getLogin()) !== $login) {
            return $this -> render('login',['messages' => ['User with this login not exist!']]);
        }

        if(!($this -> decrypt($password, $user -> getPassword()))) {
            return $this -> render('login',['messages' => ['Wrong password']]);
        }

        $cookie_name = "user_id";
        $cookie_value = $this -> encryptCookie($this -> userRepository -> getId($user -> getLogin()));
        setcookie($cookie_name, $cookie_value, 0, "/");

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
        $passwordRegex = '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}/';
        $emailRegex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

        if(!preg_match($emailRegex, $email)) {
            return $this -> render('register', ['messages' => ['Invalid email!']]);
        }

        if(!preg_match($passwordRegex, $password)) {
            return $this -> render('register', ['messages' => ['Password too weak or too long! (8-16 characters, 1 small and capital letter, number, special character)']]);
        }

        if($password !== $confirmedPassword) {
            return $this -> render('register', ['messages' => ['Passwords must be the same!']]);
        }
        $password = $this -> hash($password);

        $user = new User($email, $login, $password);

        $tmpEmail = $this -> userRepository -> getUser($user -> getLogin());
        if($email == $tmpEmail) {
            return $this -> render('register', ['messages' => ['Email already taken!']]);
        }

        $tmpLogin = $this -> userRepository -> getUser($user -> getLogin());
        if($login == $tmpLogin) {
            return $this -> render('register', ['messages' => ['Login already taken!']]);
        }

        $this -> userRepository -> addUser($user);

        $cookie_name = "user_id";
        $cookie_value = $this -> encryptCookie($this -> userRepository -> getId($user -> getLogin()));
        setcookie($cookie_name, $cookie_value, 0, "/");

        return $this -> render('login', ['messages' => ['Register successful!']]);
    }

    public function hash(string $password): string {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public function decrypt(string $password, string $hashed): bool {
        return password_verify($password, $hashed);
    }

    private function encryptCookie(string $x): string {
        return strval(openssl_encrypt($x, "AES-128-CTR", "Progresser", 0, '1234567890'));
    }

    private function decryptCookie(string $x): string {
        return openssl_decrypt($x, "AES-128-CTR", "Progresser", 0, '1234567890');
    }

}