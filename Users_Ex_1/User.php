<?php

namespace Users_Ex_1;

use http\Exception\InvalidArgumentException;
use \Users_Ex_1\AUser;

class User extends AUser
{
    private string $login;
    private string $password;
    private string $email;

    public function __construct(string $login = "", string $password = "", string $email = "")
    {
        if (empty($login) or empty($password) or empty($email))
            throw new InvalidArgumentException();

        $this->login = $login;
        $this->password = $password;
        $this->email = $email;
    }

    public function __clone(): void
    {
        $this->email = "iceiceice@mail.ru";
        $this->login = "guest";
        $this->password = "qwerty";
    }

    public function GetLogin(): string
    {
        return $this->login;
    }

    public function GetPassword(): string
    {
        return $this->password;
    }

    public function GetEmail(): string
    {
        return $this->email;
    }

    public function ShowFields(): void
    {
        echo sprintf("Login: %s \nPassword: %s\nEmail:  %s", $this->GetLogin(), $this->GetPassword(), $this->GetEmail());
        echo "<br>";
    }
}
