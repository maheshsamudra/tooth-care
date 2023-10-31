<?php

namespace APP;

use APP\Models\User;

class Controller
{
    private $user = null;
    function __construct()
    {
        $user = User::getInstance();

        if (!$user) {
            header("Location: /login");
            die;
        }
        $this->user = $user;
    }
    protected function render($view, $data = [])
    {
        extract($data);

        extract(["user" => $this->user]);

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
