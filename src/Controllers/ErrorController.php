<?php

namespace ESOFT\Controllers;

use ESOFT\Controller;
use ESOFT\Models\User;

class ErrorController extends Controller
{
    public function index()
    {
        $this->render('404', ['title' => 'Page Not Found!']);
    }
}
