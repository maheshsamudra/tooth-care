<?php

use APP\Controllers\AuthController;
use APP\Controllers\DashboardController;
use APP\Router;
use APP\Controllers\UserController;


define("DANGER", "danger");
define("WARNING", "warning");
define("SUCCESS", "success");

define("USERS", "users");
define("APPOINTMENTS", "appointments");

define("DATABASE", __DIR__ . "/database");


// echo password_hash("mahesh123", PASSWORD_DEFAULT);

$router = new Router();

$router->addRoute('/login', AuthController::class, 'index');
$router->addRoute('/register', AuthController::class, 'register');
$router->addRoute('/logout', DashboardController::class, 'logout');

$router->addRoute('/', DashboardController::class, 'index');
$router->addRoute('/user', UserController::class, 'index');



$router->dispatch($uri);
