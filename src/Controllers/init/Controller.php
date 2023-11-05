<?php

namespace APP;

use APP\Models\User;
use APP\Models\Service;

class Controller
{
    private $user = null;
    public $services = [];

    public $postValues;
    public $getValues;

    function __construct()
    {
        $user = User::getInstance();
        $this->postValues = $_POST ?? array();
        $this->getValues = $_GET ?? array();

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
    public function get($variable)
    {
        if (isset($this->getValues[$variable])) {
            return $this->getValues[$variable];
        }
        return null;
    }
    public function post($variable)
    {
        if (isset($this->postValues[$variable])) {
            return $this->postValues[$variable];
        }
        return null;
    }
    public function isPostRequest()
    {
        return $_SERVER["REQUEST_METHOD"] == "POST";
    }
    public function isGetRequest()
    {
        return $_SERVER["REQUEST_METHOD"] == "GET";
    }
}
