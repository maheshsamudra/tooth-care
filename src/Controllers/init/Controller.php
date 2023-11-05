<?php

namespace APP;

use APP\Models\User;
use APP\Models\Service;

class Controller
{
    private $user = null;
    public $services = [];

    function __construct()
    {
        $user = User::getInstance();

        if (!$user) {
            header("Location: /login");
            die;
        } else {
            $this->user = $user;
            $this->services = Service::findAll();
        }
    }
    protected function render($view, $data = [])
    {
        extract($data);

        extract(["user" => $this->user, "services" => $this->services]);


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
