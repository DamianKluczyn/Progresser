<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {
    public  function getUser(string $login): ?User {

        $stmt = $this -> database -> connect() -> prepare('
            SELECT * FROM public.users WHERE login = :login
        ');
        $stmt -> bindParam(':login', $login, PDO::PARAM_STR);
        $stmt -> execute();

        $user = $stmt -> fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            //TODO wyjatek zamiast nulla ktorego odbierze security controller w login()
            return null;
        }

        return new User(
            $user['email'],
            $user['login'],
            $user['password']
        );
    }
}