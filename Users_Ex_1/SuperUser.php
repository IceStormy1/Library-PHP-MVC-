<?php

namespace Users_Ex_1;

use Users_Ex_1\User;
use JetBrains\PhpStorm\Pure;

class SuperUser extends User
{
    private string $role;

    public function __construct(string $login, string $password, string $email, $role)
    {
        parent::__construct($login, $password, $email);
        $this->role = $role;
    }

    public function GetRole():string
    {
        return $this->role;
    }

    public function ShowFields():void
    {
        echo sprintf("Login: %s Password: %s Email: %s Role: %s", $this->GetLogin(), $this->GetPassword(), $this->GetEmail(), $this->role);
        echo "<br>";
    }
}