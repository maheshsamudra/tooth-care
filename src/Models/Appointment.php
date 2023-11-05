<?php

namespace APP\Models;

use Database;

class Appointment extends Database
{
    public function __construct()
    {
    }

    public static function getAppointment($id)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM appointments WHERE id=? join");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    public static function create($values)
    {
        $start = "3:00 PM";
        $startMinute = 200;
        $end = "3:30 PM";
        $endMinute = 230;

        $db = self::getConnection();
        $stmt = $db->connection->prepare("INSERT INTO appointments (date, start, startMinute, end, endMinute, duration, registrationFee, patientId) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$values['date'], $start, $startMinute, $end, $endMinute, $endMinute - $startMinute, $values["registrationFee"], $values["patientId"]]);
        return self::findById($db->connection->lastInsertId());
    }
}
