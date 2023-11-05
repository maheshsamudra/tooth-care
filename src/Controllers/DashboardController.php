<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\Appointment;
use APP\Models\Slot;
use APP\Models\Patient;
use Database;

class DashboardController extends Controller
{
    public function index()
    {

        $db = Database::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM appointments WHERE date=?");
        $stmt->execute([date("Y-m-d")]);

        $this->render('dashboard', ['title' => 'Dashboard', 'users' => array()]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }

    public function addAppointment()
    {
        if ($this->isPostRequest()) {
            $patient = Patient::createOrUpdate($this->postValues);
        }
        $date = $this->get("date");
        $phoneNumber = $this->get("phoneNumber");

        $patient = null;
        $appointments = null;

        if (!$date || !$phoneNumber) {
            $this->addErrorMessage("Date and Phone Number are required.");
        } else {
            $patient = Patient::findOne('phoneNumber', $phoneNumber);
            $appointments = Appointment::findWhere("date", $date);
            $slot = Slot::findOne("day", date_format(date_create($date), "l"));
        }

        if (!$patient) {
            $this->addWarningMessage("No customer found for the phone number - $phoneNumber. Please enter patients details.");
        }

        $estimatedStartTime = $slot->from;

        $this->render('add-appointment', ['title' => 'Add Appointment', 'patient' => $patient, "appointments" => $appointments, "slot" => $slot, 'appointmentNumber' => count($appointments) + 1, "estimatedStartTime" => $estimatedStartTime]);
    }

    public function searchAppointment()
    {
        $this->render('search-appointment', ['title' => 'Search Appointment', 'users' => array()]);
    }
}
