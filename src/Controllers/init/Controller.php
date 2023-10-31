<?php

namespace APP;

use APP\Models\User;

class Controller
{
    function __construct()
    {
        $user = User::getLoggedInUser();

        if (!$user) {
            header("Location: /login");
            die;
        }
    }
    protected function render($view, $data = [])
    {
        extract($data);

        include __DIR__ . "/../../Views/layout/header.php";

        include __DIR__ . "/../../Views/$view.php";

        include __DIR__ . "/../../Views/layout/footer.php";
    }
    protected function redirect($location = "/")
    {
        header("Location: $location");
        die;
    }
}
