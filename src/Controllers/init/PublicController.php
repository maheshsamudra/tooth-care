<?php

namespace APP;

use APP\Models\User;

class PublicController extends Controller
{

    function __construct()
    {
        $user = User::getInstance();

        $this->postValues = $_POST ?? array();
        $this->getValues = $_GET ?? array();

        if ($user) {
            header("Location: /");
            die;
        }
    }
}
