<?php

namespace APP\Models;

use Error;

class User
{

    private static $instance = null;

    public $first_name;
    public $last_name;
    public $email;
    private $password;

    private function __construct($user)
    {
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public static function get_instance($user)
    {
        if (self::$instance != null) {
            return self::$instance;
        } else if (!$user || !$user->email || !$user->first_name || !$user->last_name) {
            throw new Error("Missing user data.");
        } else {
            self::$instance = new User($user);
            $_SESSION['is_logged_in'] = true;
        }

        return self::$instance;
    }

    public function setUser($email, $name = '')
    {
        $this->email = $email;
    }

    public function getUser()
    {
        return $this->email;
    }

    public static function validate_user_login()
    {
        $form = Form::get_instance();

        $users = new Data(
            USERS
        );
        $user =
            array_filter($users->data, fn ($item) => $item->email == $form->post['email'] && $item->password == $form->post["password"]);

        print_r($user);

        if ($user) {
            return reset($user);
        }
        return false;
    }
    public static function validate_user_registration()
    {
        $form = Form::get_instance();
        $users = new Data(
            USERS
        );
        $user =
            array_filter($users->data, fn ($item) => $item->email == $form->post["email"]);

        return $user;
    }

    public static function register()
    {
        $data = new Data();
        $data->register_user();
        return true;
    }
}
