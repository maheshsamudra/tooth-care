<?php

namespace APP\Models;

class User
{

    private static $instance = null;
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public static function get_instance()
    {
        if (self::$instance == null) {
            self::$instance = new Form();
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
}
