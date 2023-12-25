<?php

namespace APP\Models;

use Database;

class ObtainedService extends Database
{

    public $id;
    public $appointmentId;
    public $service;
    public $price;
    public $serviceId;

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
        if (!isset($values['services'])) {
            return false;
        }
        $db = self::getConnection();

        // delete old ones
        $stmt = $db->connection->prepare("DELETE FROM obtainedServices WHERE appointmentId=$appointmentId");
        $stmt->execute();

        $stmt = $db->connection->prepare("INSERT INTO obtainedServices (appointmentId, service, price, serviceId) VALUES (?, ?, ?, ?)");
        for ($i = 0; $i < count($values['services']); $i++) {
            $service = Service::findById($values['services'][$i]);
            $stmt->execute([$appointmentId, $service->name, $service->price, $service->id]);
        }
        return true;
    }
}
