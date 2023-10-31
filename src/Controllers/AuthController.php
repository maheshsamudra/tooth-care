<?php

namespace APP\Controllers;

use APP\Models\Alert;
use APP\Models\Form;
use APP\Models\User;
use APP\PublicController;
use Database;

class AuthController extends PublicController
{
    public function index()
    {

        $login_form = Form::get_instance();

        $alert = $login_form->handle_login();
        $user = User::getInstance();

        if ($user) {
            $this->redirect();
        }

        $this->render('auth/login', ['title' => 'Login to Tooth Care!', "alert" => $alert]);
    }
}
