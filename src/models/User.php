<?php

class User
{
    private $email;
    private $login;
    private $password;
    private $premium;

    public function __construct(string $email, string $login, string $password, bool $premium = false)
    {
        $this->email = $email;
        $this->login = $login;
        $this->password = $password;
        $this->premium = $premium;
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

    public function isPremium(): bool
    {
        return $this->premium;
    }

    public function setPremium(bool $premium = false): void
    {
        $this->premium = $premium;
    }


}