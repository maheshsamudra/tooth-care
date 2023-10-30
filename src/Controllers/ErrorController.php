<?php

namespace MVC\Controllers;

use MVC\Controller;
use MVC\Models\User;

class ErrorController extends Controller
{
    public function index()
    {
        $this->render('404', ['title' => 'Page Not Found!']);
    }
}
