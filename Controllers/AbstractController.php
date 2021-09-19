<?php
namespace Controllers;

abstract class AbstractController
{
    public $route;

    public function __construct($route)
    {
        $this->route = $route;
    }

    protected function render(string $template, array $params = []): void
    {
        ob_start();
        include "Views/" . $template . '.php';
        ob_flush();
    }
}