<?php

namespace MVC;


use MVC\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    public function dispatch($uri)
    {
        if (array_key_exists($uri, $this->routes)) {
            $controller = $this->routes[$uri]['controller'];
            $action = $this->routes[$uri]['action'];

            $controller = new $controller();
            $controller->$action();
        } else {
            $controller = ErrorController::class;
            $action = 'index';

            $controller = new $controller();
            $controller->$action();
        }
    }
}
