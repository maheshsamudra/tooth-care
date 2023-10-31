<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\User;

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
