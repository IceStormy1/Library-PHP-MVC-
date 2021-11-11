<?php

namespace Controllers;

use Config\connect;

abstract class AbstractController
{
    protected $route;
    protected $dbContext;
    protected $model;
    protected $sessions;

    public function __construct($route)
    {
        $this->dbContext = connect::Connect();
        $this->route = $route;
        $this->model = $this->loadModel($route['controller']);

    }

    protected function render(string $template, array $params = []): void
    {
        extract($params);
        $controller = $this->route['controller'];
        if (file_exists("Views/$controller/" . $template . '.php'))
        {
            ob_start();
            include "Views/$controller/" . $template . '.php';
            ob_flush();
        }
        else
        {
            echo "Файл $template не найден";
        }
    }

    protected function loadModel($name)
    {
        $path = 'Models\\' . $name . 'Model';

        if (class_exists($path)) {
            return new $path;
        }
    }
}