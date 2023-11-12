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
}
