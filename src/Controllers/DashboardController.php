<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\Appointment;
use APP\Models\Slot;

class DashboardController extends Controller
{
    public function index()
    {
        $appointments =  Appointment::getAppointmentsForDate($this->get("date"));

        $availableDates = Slot::getNextAvailableDates();

        $pickedDate = !$this->get("date") ? date("Y-m-d") : $this->get("date");

        $this->render('dashboard', ['title' => 'Dashboard', 'appointments' => $appointments, "availableDates" => $availableDates, 'pickedDate' => $pickedDate]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }
}
