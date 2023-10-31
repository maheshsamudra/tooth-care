<?php

namespace ESOFT;

class Controller
{
    function __construct()
    {
        if (!isset($_SESSION["is_logged_in"]) || !$_SESSION["is_logged_in"]) {
            header("Location: /login");
            die;
        }
    }
    protected function render($view, $data = [])
    {
        extract($data);

        include "Views/layout/header.php";

        include "Views/$view.php";

        include "Views/layout/footer.php";
    }
    protected function redirect($location = "/")
    {
        header("Location: $location");
        die;
    }
}
