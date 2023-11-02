<?php

use APP\Controllers\AuthController;
use APP\Controllers\DashboardController;
use APP\Router;
use APP\Controllers\UserController;


$router = new Router();

$router->addRoute('/login', AuthController::class, 'index');
$router->addRoute('/register', AuthController::class, 'register');
$router->addRoute('/logout', DashboardController::class, 'logout');

$router->addRoute('/', DashboardController::class, 'index');
$router->addRoute('/user', UserController::class, 'index');

$router->addRoute('/add-appointment', DashboardController::class, 'addAppointment');
$router->addRoute('/search-appointment?', DashboardController::class, 'searchAppointment');

$uri =  $_SERVER['REQUEST_URI'];

$router->dispatch(strtok($uri, '?'));
