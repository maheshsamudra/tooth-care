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

        $user = User::getUserByEmail($this->post['email']);

        var_dump($user);


        if (!$user || md5($this->post['password']) !== $user->password) {
            $alert->add_danger_message("The credentials are incorrect. Please retry.");
        } else {
            $_SESSION["loggedInUserId"] = $user->id;
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
