<?php

class User
{
    private $email;
    private $login;
    private $password;

    public function __construct(string $email, string $login, string $password)
    {
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
    }

    public function getEmail(): string
    {
        return $this -> email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getLogin(): string
    {
        return $this -> login;
    }

    public function setLogin(string $login)
    {
        $this->login = $login;
    }

    public function getPassword(): string
    {
        return $this -> password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }


}