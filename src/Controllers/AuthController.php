<?php

namespace APP\Controllers;

use APP\Models\Alert;
use APP\Models\Form;
use APP\Models\User;
use APP\PublicController;

class AuthController extends PublicController
{
    public function index()
    {

        $login_form = Form::get_instance();

        $alert = $login_form->handle_login();

        if (isset($_SESSION["is_logged_in"])) {
            $this->redirect();
        }

        $this->render('auth/login', ['title' => 'Login to Tooth Care!', "alert" => $alert]);
    }

    public function register()
    {
        $login_form = Form::get_instance();

        $alert = $login_form->handle_register();

        if (isset($_SESSION["is_logged_in"])) {
            $this->redirect();
        }

        $this->render('auth/register', ['title' => 'Get started with Tooth Care!', "alert" => $alert]);
    }
}
