<?php

namespace MVC\Controllers;

use MVC\Models\Alert;
use MVC\Models\LoginForm;
use MVC\Models\User;
use MVC\PublicController;

class AuthController extends PublicController
{
    public function index()
    {

        $login_form = new LoginForm();

        $alert = $login_form->handle_login();

        if (isset($_SESSION["is_logged_in"])) {
            $this->redirect();
        }

        $this->render('auth/login', ['title' => 'Login to Tooth Care!', "alert" => $alert]);
    }

    public function register()
    {
        $this->render('auth/register', ['title' => 'Get started with Tooth Care!']);
    }
}
