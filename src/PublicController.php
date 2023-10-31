<?php

namespace APP;

class PublicController extends Controller
{

    function __construct()
    {
        if (isset($_SESSION["is_logged_in"]) && $_SESSION["is_logged_in"]) {
            header("Location: /");
            die;
        }
    }
}
