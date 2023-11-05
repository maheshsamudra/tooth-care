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


        if ($this->isPostRequest()) {
            $user = User::getUserByUsername($this->post('username'));

            if ($user && !password_verify($this->post('password'), $user->password)) {
                $_SESSION["loggedInUserId"] = $user->id;
            } else {
                $this->addErrorMessage("The credentials are incorrect. Please retry.");
            }
        }

        $user = User::getInstance();

        if ($user) {
            $this->redirect();
        }

        $this->render('auth/login', ['title' => 'Login to Tooth Care!']);
    }
}
