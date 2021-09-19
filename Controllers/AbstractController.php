<?php
namespace Controllers;
use Config\connect;
abstract class AbstractController
{
    public $route;
    public $dbContext;


    public function __construct($route)
    {
        $this->dbContext = connect::Connect();
        $this->route = $route;
    }

    protected function render(string $template, array $params = []): void
    {
        extract($params);

        if(file_exists("Views/Main/" . $template . '.php'))
        {
            ob_start();
            include "Views/Main/" . $template . '.php';
            ob_flush();
        }
        else
        {
            echo "Файл не найден";
        }

    }
}