<?php

declare(strict_types=1);

namespace App;

use App\Controllers\MainController;

class Application
{
    private $routes = [
        '/' => [
            'controller' => MainController::class,
            'action' => 'mainPage'
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
