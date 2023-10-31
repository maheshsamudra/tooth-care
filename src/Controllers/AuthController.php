<?php

namespace ESOFT\Controllers;

use ESOFT\Models\Alert;
use ESOFT\Models\Form;
use ESOFT\Models\User;
use ESOFT\PublicController;

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
