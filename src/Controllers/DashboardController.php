<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\User;

use SQLite3;

class DashboardController extends Controller
{
    public function index()
    {
        $this->render('dashboard', ['title' => 'Dashboard', 'users' => array()]);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }

    public function addAppointment()
    {
        $this->render('add-appointment', ['title' => 'Add Appointment', 'users' => array()]);
    }

    public function searchAppointment()
    {
        $this->render('search-appointment', ['title' => 'Search Appointment', 'users' => array()]);
    }
}
