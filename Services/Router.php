<?php

namespace Services;

class Router
{
    private $routes = [];
    private $params = [];

    public function __construct()
    {
        $arr = require 'Config/Routes.php';
        foreach ($arr as $key => $val) {
            $this->add($key, $val);
        }
    }

    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    public function match()
    {
        $url = trim($_SERVER['REQUEST_URI'], '/');
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }

    public function run()
    {
        if ($this->match())
        {
            $path = '\\Controllers\\' . $this->params['controller'] . 'Controller';

            if (class_exists($path))
            {
                $action = $this->params['action'];
                if (method_exists($path, $action))
                {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else
                {
                    echo "Метод не найден " . $action;
                }
            } else
            {
                echo 'Класс не найден' . $path;
            }
        } else
        {
            echo '404 Маршрут не найден';
        }
    }
}
