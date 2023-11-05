<?php

namespace APP\Models;

use Database;

class Appointment extends Database
{
    public function __construct()
    {
        $this->table = 'appointment';
    }

    public static function getAppointment($id)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM appointments WHERE id=? join");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }
}
