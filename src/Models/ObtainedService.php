<?php

namespace APP\Models;

use Database;

class ObtainedService extends Database
{
    public function __construct()
    {
    }

    public static function findByAppointmentId($id)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM obtainedServices WHERE appointmentId=?");
        $stmt->execute([$id]);

        return  $stmt->fetchAll();
    }

    public static function createMultiple($values, $appointmentId)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("INSERT INTO obtainedServices (appointmentId, service, price) VALUES (?, ?, ?)");
        for ($i = 0; $i < count($values['services']); $i++) {
            $service = Service::findById($values['services'][$i]);
            $stmt->execute([$appointmentId, $service->name, $service->price]);
        }
        return true;
    }
}
