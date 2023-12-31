<?php

namespace APP\Models;

use Database;

class Appointment extends Database
{

    public $id;
    public $date;
    public $registrationFee;
    public $patientId;
    public $appointmentNumber;
    public $paidAt;

    public function __construct()
    {
    }

    public static function getAppointment($id)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM appointments WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetchObject();
    }

    public static function create($values, $patient)
    {
        $registrationFee = $values["registrationFeePaid"] ? REGISTRATION_FEE : 0;

        $db = self::getConnection();
        $stmt = $db->connection->prepare("INSERT INTO appointments (date, registrationFee, patientId, appointmentNumber) VALUES (?, ?, ?, ?)");
        $stmt->execute([$values['date'], $registrationFee, $patient->id, $values['appointmentNumber']]);
        return self::findById($db->connection->lastInsertId());
    }

    public static function update($values)
    {
        $db = self::getConnection();

        $appointment = self::findById($values['id']);

        $registrationFee = isset($values['registrationFeePaid']) ? 1000 : $appointment->registrationFee;

        $appointmentNumber = $appointment->appointmentNumber;

        if ($values['date'] != $appointment->date) {
            $newAppointments = self::getAppointmentsForDate($values['date']);
            $appointmentNumber = count($newAppointments) + 1;
        }

        $stmt = $db->connection->prepare("UPDATE appointments SET date=?, registrationFee=?, appointmentNumber=? WHERE id=$appointment->id");
        $stmt->execute([$values['date'], $registrationFee, $appointmentNumber]);
        return true;
    }

    public static function markAsPaid($id)
    {
        $db = self::getConnection();

        $stmt = $db->connection->prepare("UPDATE appointments SET paidAt=? WHERE id=$id");
        $stmt->execute([date("Y-m-d H:i:s")]);
        return true;
    }

    public static function getAppointmentsForDate($date)
    {
        $db = self::getConnection();
        $pickedDate = !$date ? date("Y-m-d") : $date;
        $stmt = $db->connection->prepare("SELECT appointment.*, patient.name, patient.phoneNumber FROM appointments as appointment JOIN patients as patient ON patient.id = appointment.patientId WHERE patient.id = appointment.patientId AND appointment.date=?");
        $stmt->execute([$pickedDate]);

        return  $stmt->fetchAll();
    }

    public static function searchAppointment($id, $date)
    {
        $db = self::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM appointments WHERE appointmentNumber=? AND date=?");
        $stmt->execute([$id, $date]);

        return  $stmt->fetchObject();
    }
}
