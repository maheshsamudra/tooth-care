<?php

namespace ESOFT\Controllers;

use ESOFT\Controller;
use ESOFT\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = [
            new User('John Doe', 'john@example.com'),
            new User('Jane Doe', 'jane@example.com')
        ];

        $this->render('user/index', ['title' => 'Dashboard', 'users' => $users]);
    }
}
