<?php

use ESOFT\Controllers\AuthController;
use ESOFT\Controllers\DashboardController;
use ESOFT\Router;
use ESOFT\Controllers\UserController;


define("DANGER", "danger");
define("WARNING", "warning");
define("SUCCESS", "success");

$router = new Router();

$router->addRoute('/login', AuthController::class, 'index');
$router->addRoute('/register', AuthController::class, 'register');
$router->addRoute('/logout', DashboardController::class, 'logout');

$router->addRoute('/', DashboardController::class, 'index');
$router->addRoute('/user', UserController::class, 'index');



$router->dispatch($uri);
