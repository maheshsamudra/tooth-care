<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\User;

class ErrorController extends Controller
{
    public function index()
    {
        $this->render('404', ['title' => 'Page Not Found!']);
    }
}
