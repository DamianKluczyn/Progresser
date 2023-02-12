<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public  function getUser(string $login): ?User {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE login = :login
        ');
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['login'],
            $user['password']
        );
    }

    public function addUser(User $user) {

        $stmt = $this -> database -> connect() -> prepare('
        INSERT INTO users (email, login, password)
        VALUES (?, ?, ?)
        ');

        $stmt -> execute([
            $user -> getEmail(),
            $user -> getLogin(),
            $user -> getPassword(),
        ]);
    }

    public function getUserById(string $id_user): ?User {

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE id_user = :id_user
        ');
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['login'],
            $user['password']
        );
    }

    public function getId(string $login): ?string {
        $stmt = $this -> database -> connect() -> prepare('
            SELECT id_user FROM public.users WHERE login = :login
        ');
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $userId = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$userId) {
            return null;
        }

        return $userId['id_user'];
    }

    private function decryptCookie(string $x): string
    {
        return openssl_decrypt($x, "AES-128-CTR", "Progresser", 0, '1234567890');
    }

}