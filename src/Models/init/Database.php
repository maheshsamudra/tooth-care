<?php

class Database
{
    private static $instance = null;
    public $connection;

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
}
