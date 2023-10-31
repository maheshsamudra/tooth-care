<?php

namespace APP\Models;

use Database;
use Error;

class User extends Database
{

    private static $instance = null;

    public $first_name;
    public $last_name;
    public $email;

    private function __construct($user)
    {

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
    }

    public static function getInstance()
    {
        if (self::$instance == null && isset($_SESSION["loggedInUserId"])) {
            $user = self::getLoggedInUser();
            self::$instance = new User($user);
        }

        return self::$instance;
    }

    public static function getLoggedInUser()
    {
        if (isset($_SESSION["loggedInUserId"])) {
            $db = self::getConnection();

            $stmt = $db->connection->prepare("SELECT * FROM users WHERE id=?");
            $stmt->execute([$_SESSION["loggedInUserId"]]);
            return $stmt->fetchObject();
        } else {
            return null;
        }
    }

    public static function getUserByEmail($email)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        return $stmt->fetchObject();
    }

    public function getUserById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }



    public static function validate_user_login()
    {
        $form = Form::get_instance();

        $user = User::getInstance();

        $user = $user->getUserByEmail($form->post['email']);

        return false;

        if ($user) {
            return reset($user);
        }
        return false;
    }
}
