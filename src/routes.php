<?php

use APP\Controllers\AppointmentController;
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

$router->addRoute('/appointments/add', AppointmentController::class, 'add');
$router->addRoute('/appointments/search', AppointmentController::class, 'search');
$router->addRoute('/appointments/view', AppointmentController::class, 'view');
$router->addRoute('/appointments/edit', AppointmentController::class, 'edit');
$router->addRoute('/appointments/mark-as-paid', AppointmentController::class, 'markAsPaid');

$uri =  $_SERVER['REQUEST_URI'];

$router->dispatch(strtok($uri, '?'));
