<?php

namespace APP;

use APP\Models\User;
use APP\Models\Service;
use APP\Models\Slot;
use Error;

class Controller
{
    private $user = null;
    public $services = [];
    public $slots = [];

    private $successMessages = [];
    private $warningMessages = [];
    private $errorMessages = [];

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
            $this->slots = Slot::findAll();
        }
    }
    protected function render($view, $data = [])
    {
        extract($data);

        extract(["user" => $this->user, "services" => $this->services, "slots" => $this->slots]);


        extract(['errorMessages' => $this->errorMessages, 'successMessages' => $this->successMessages, 'warningMessages' => $this->warningMessages]);

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
    public function addErrorMessage($message)
    {
        if (!$message) {
            throw new Error("Alert message cannot be null!", 0);
        }
        array_push($this->errorMessages, $message);
    }
    public function addSuccessMessage($message)
    {
        if (!$message) {
            throw new Error("Alert message cannot be null!", 0);
        }
        array_push($this->successMessages, $message);
    }
    public function addWarningMessage($message)
    {
        if (!$message) {
            throw new Error("Alert message cannot be null!", 0);
        }
        array_push($this->warningMessages, $message);
    }
}
