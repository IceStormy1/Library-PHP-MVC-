<?php

use \Services\Router;
use \Users_Ex_1\User;
use \Users_Ex_1\SuperUser;
use \Sessions_Ex_3\Session;

spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class . '.php');

    if (file_exists($path)) {
        require $path;
    }
});



$router = new Router;

$user = new User("MISHAAA", "1234567", "icestormyy@mail.ru");
$user->ShowFields();
$userClone = clone($user);

$superUser = new SuperUser("Aboba", "qwertyui", "icesdf@mail.ru", "admin");
$superUser->ShowFields();


$router->run();
