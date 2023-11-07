<?php

namespace APP\Models;

use Database;

class Service extends Database
{

    protected $table = "services";

    public function __construct()
    {
        self::$table = "services";
    }
    public static function createMultiple($values, $appointmentId)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("INSERT INTO obtainedServices (appointmentId, service, price) VALUES (?, ?, ?)");
        for ($i = 0; $i < count($values['services']); $i++) {
            $service = self::findById($values['services'][$i]);
            $stmt->execute([$appointmentId, $service->name, $service->price]);
        }
        return true;
    }
}
