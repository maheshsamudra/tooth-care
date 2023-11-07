<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\Appointment;
use APP\Models\Slot;
use APP\Models\Patient;
use APP\Models\Service;
use Database;

class DashboardController extends Controller
{
    public function index()
    {



        $db = Database::getConnection();
        $stmt = $db->connection->prepare("SELECT * FROM appointments WHERE date=?");
        $stmt->execute([date("Y-m-d")]);

        $this->render('dashboard', ['title' => 'Dashboard']);
    }

    public function logout()
    {
        session_destroy();
        $this->redirect();
    }
}
