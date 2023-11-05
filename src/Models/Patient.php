<?php

namespace APP\Models;

use Database;

class Patient extends Database
{
    public $name;
    public $address;
    public $emailAddress;
    public $phoneNumber;

    public function __construct()
    {
    }

    public static function createOrUpdate()
    {
        $post = $_POST;

        $db = self::getConnection();

        $id = null;

        $existingPatient = self::findOne('phoneNumber', $post['patientPhoneNumber']);


        if ($existingPatient) {
            $stmt = $db->connection->prepare("UPDATE patients SET name = ?, phoneNumber = ?, emailAddress = ?, address = ? WHERE id = ?");
            return $stmt->execute([$_POST['patientName'], $_POST['patientPhoneNumber'], $_POST['patientEmailAddress'], $_POST['patientAddress'], $_POST['patientId']]);
            // $id = $stmt->lastInsertId();
        } else {
            // new patient
            $stmt = $db->connection->prepare("INSERT INTO patients (name, phoneNumber, emailAddress, address) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$_POST['patientName'], $_POST['patientPhoneNumber'], $_POST['patientEmailAddress'], $_POST['patientAddress']]);
        }

        return self::findById($id);
    }
}
