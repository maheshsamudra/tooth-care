<?php

namespace APP\Models;

use Error;
use Database;

class Form extends Database
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

        $db = $this->getConnection();

        $user = $db->getUserByEmail($this->post['email']);


        if (!$user || md5($this->post['password']) !== $user->password) {
            $alert->add_danger_message("The credentials are incorrect. Please retry.");
        } else {
            $user = User::getInstance($user);
        }

        return $alert;
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

        $user = User::validate_user_registration();

        if ($user) {
            $alert->add_danger_message("The email is already registered.");
        } else {
            User::register();
            $user = User::validate_user_login();
            if ($user) {
                User::get_instance($user);
            } else {
                $alert->add_danger_message("Failed to register. Please retry.");
            }
        }

        return $alert;
    }

    private function register_fields_are_filled()
    {
        return isset($this->post['email']) && isset($this->post['first_name']) && isset($this->post['last_name']) && isset($this->post['password']) && isset($this->post['confirm_password']);
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
