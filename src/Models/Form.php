<?php

namespace APP\Models;

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
            $alert->add_danger_message("Failed to Login. Please try again.");
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

    public function handle_register()
    {
        if (!$this->valid_method) {
            return;
        }

        $alert = new Alert();

        if (!$this->register_fields_are_filled()) {
            $alert->add_danger_message("All the fields are required.");
            return $alert;
        }

        if (!$this->register_passwords_match()) {
            $alert->add_danger_message("Passwords should match.");
        }
        if (!$this->is_valid_email()) {
            $alert->add_danger_message("Please add a valid email address.");
        }

        if (!$alert->type) {
            $_SESSION['is_logged_in'] = true;
        }
        return $alert;
    }

    private function register_fields_are_filled()
    {
        return isset($this->post['email']) && isset($this->post['name']) && isset($this->post['password']) && isset($this->post['confirm_password']);
    }

    private function register_passwords_match()
    {
        return $this->post["password"] == $this->post["confirm_password"];
    }

    private function is_valid_email()
    {
        return filter_var($this->post["email"], FILTER_VALIDATE_EMAIL);
    }
}
