<?php
require 'Controllers/MainController.php';

class Application
{
    private $routes = [
        '/' => [
            'controller' => MainController::class,
            'action' => 'mainPage'
        ],
        '/save' =>[
            'controller'=>MainController::class,
            'action'=>'save'
        ]
    ];
    public function run(): void
    {
        $url = $_SERVER['REQUEST_URI'] ?? '';
        $urlInfo = parse_url($url);
        $path = $urlInfo['path'];

        if (!isset($this->routes[$path])) {
            echo '404 not found';
            return;
        }

        $route = $this->routes[$path];
        $controller = $route['controller'];
        $action = $route['action'];

        (new $controller)->$action();
    }
}