<?php

namespace APP\Models;

use Database;
use Error;

class User extends Database
{

    private static $instance = null;

    public $id;
    public $firstName;
    public $lastName;
    public $username;
    private $password;

    private function __construct($user)
    {

        $this->firstName = $user->firstName;
        $this->lastName = $user->lastName;
        $this->username = $user->username;
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

    public static function getUserByUsername($username)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT id, username, firstName, lastName FROM users WHERE username=?");
        $stmt->execute([$username]);
        return $stmt->fetchObject();
    }

    public function getUserById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }
}
