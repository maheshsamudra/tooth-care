<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\User;

use SQLite3;

class DashboardController extends Controller
{
    public function index()
    {
        $this->render('dashboard', ['title' => 'Dashboard', 'users' => array()]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }
}
