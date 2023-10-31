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
    private $password;

    private function __construct($user)
    {

        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->password = $user->password;
    }

    public static function getInstance($user =  null)
    {
        if (self::$instance != null) {
            return self::$instance;
        } else if (!$user || !$user->email || !$user->first_name || !$user->last_name) {
            if (isset($_SESSION["loggedInUserId"])) {
                $user = Database::getLoggedInUser();
                var_dump($user);
            } else {
                throw new Error("Missing user data.");
            }
        } else {
            self::$instance = new User($user);
            $_SESSION['loggedInUserId'] = $user->id;
        }

        return self::$instance;
    }



    public static function validate_user_login()
    {
        $form = Form::get_instance();

        $db = Database::getConnection();

        $user = $db->getUserByEmail($form->post['email']);

        return false;

        if ($user) {
            return reset($user);
        }
        return false;
    }
}
