<?php

namespace MVC\Models;

use Error;

class Form
{
    private static $instance = null;

    public $post;
    public $valid_method = false;

    private function __construct()
    {
        $this->valid_method = $_SERVER["REQUEST_METHOD"] == "POST";
        $this->post = $_POST ?? array();
    }

    public static function get_instance()
    {
        if (self::$instance == null) {
            self::$instance = new Form();
        }

        return self::$instance;
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
            $user = new User($this->post['email']);
        }


        return $alert;
    }

    private function valid_credentials()
    {
        return $this->post['email'] == "maheshsamudra@gmail.com" && $this->post['password'] == "mahesh123";
    }
}
