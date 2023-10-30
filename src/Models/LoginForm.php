<?php

namespace MVC\Models;

use Error;

class LoginForm
{
    public $email;
    public $password;
    public $valid_method;

    public function __construct()
    {
        $this->valid_method = $_SERVER["REQUEST_METHOD"] == "POST";
        $this->email = $_POST['email'] ?? '';
        $this->password = $_POST['password'] ?? '';
    }

    public function handle_login()
    {
        if (!$this->valid_method) {
            return;
        }

        $alert = new Alert();

        if (!$this->valid_credentials()) {
            $alert->setDangerMessage("Failed to Login. Please try again.");
        } else {
            $_SESSION['is_logged_in'] = true;
            $user = new User($this->email);
        }


        return $alert;
    }

    private function valid_credentials()
    {
        return $this->email == "maheshsamudra@gmail.com" && $this->password == "mahesh123";
    }
}
