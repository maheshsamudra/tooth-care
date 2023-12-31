<?php

namespace APP;


use APP\Controllers\ErrorController;

class Router
{
    protected $routes = [];

    // Adding the routes
    public function addRoute($route, $controller, $action)
    {
        $this->routes[$route] = ['controller' => $controller, 'action' => $action];
    }

    // serving the selected method from the controller
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
