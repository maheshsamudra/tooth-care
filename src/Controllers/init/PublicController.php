<?php

namespace APP;

use APP\Models\User;

class PublicController extends Controller
{

    function __construct()
    {
        $user = User::getInstance();

        if ($user) {
            header("Location: /");
            die;
        }
    }
}
