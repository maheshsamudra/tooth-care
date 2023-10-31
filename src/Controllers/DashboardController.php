<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = [
            new User('John Doe', 'john@example.com'),
            new User('Jane Doe', 'jane@example.com')
        ];

        $this->render('dashboard', ['title' => 'Dashboard', 'users' => $users]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }
}
