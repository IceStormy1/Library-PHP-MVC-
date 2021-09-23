<?php

namespace Controllers;

use Config\connect;

abstract class AbstractController
{
    public $route;
    public $dbContext;
    public $model;

    public function __construct($route)
    {
        $this->dbContext = connect::Connect();
        $this->route = $route;
        $this->model = $this->loadModel($route['controller']);
    }

    protected function render(string $template, array $params = []): void
    {
        extract($params);

        if (file_exists("Views/Main/" . $template . '.php')) {
            ob_start();
            include "Views/Main/" . $template . '.php';
            ob_flush();
        } else {
            echo "Файл не найден";
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