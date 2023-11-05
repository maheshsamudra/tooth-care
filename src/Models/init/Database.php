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

    public static function getTheTableName()
    {
        $instance = get_called_class();
        $arrayOfNames = explode("\\", $instance);
        $table = strtolower(end($arrayOfNames)) . "s";

        try {
            $db = self::getConnection();
            $db->connection->query("SELECT 1 FROM {$table} LIMIT 1");
            return $table;
        } catch (Exception $e) {
            throw new Error("The table doesn't exists!");
            die();
        }
    }

    public static function findById($id)
    {
        return self::findOne("id", $id);
    }

    public static function findAll()
    {
        $table = self::getTheTableName();
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM $table");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public static function findOne($column, $value)
    {
        $table = self::getTheTableName();
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM $table WHERE $column=?");
        $stmt->execute([$value]);
        return $stmt->fetchObject();
    }

    public static function findWhere($column, $value)
    {
        $table = self::getTheTableName();

        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM $table WHERE $column=?");
        $stmt->execute([$value]);
        return $stmt->fetchAll();
    }
}
