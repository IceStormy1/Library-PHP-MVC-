<?php

use \Services\Router;

spl_autoload_register(function ($class)
{
    $path = str_replace('\\', '/', $class . '.php');

    if (file_exists($path))
    {
        require $path;
    }
});

session_start();

//$authorr = R::dispense('authors');
//
//$authorr->full_name="fullname fds fsd";
//$authorr->author_biography = "authorBiography";
//$authorr->date_of_birth = "2021-10-31";
//$authorr->date_of_death = "2021-10-31";
//$authorr->place_of_birth = "placeOfBirth";
////если что переделать все таблицы под _
//R::store($authorr);


$router = new Router;
$router->run();
