<?php

namespace APP;

class PublicController extends Controller
{

    function __construct()
    {
        if (isset($_SESSION["loggedInUserId"]) && $_SESSION["loggedInUserId"]) {
            header("Location: /");
            die;
        }
    }
}
