<?php

class Database
{
    private static $instance = null;
    private $connection;

    private $sqlite_db = __DIR__ . "/../../data/db.db";

    // Constructor to establish the database connection
    private function __construct()
    {
        $this->connection = new PDO("sqlite:$this->sqlite_db");
    }

    public static function getConnection()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public static function getLoggedInUser()
    {
        if (isset($_SESSION["loggedInUserId"])) {
            $db = self::getConnection();
            $user = $db->getUserById($_SESSION["loggedInUserId"]);
            return $user;
        } else {
            return null;
        }
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);
        return $stmt->fetchObject();
    }

    public function getUserById($id)
    {
        $stmt = $this->connection->prepare("SELECT * FROM users WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }
}
