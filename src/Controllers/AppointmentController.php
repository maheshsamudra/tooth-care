<?php

namespace APP\Controllers;

use APP\Controller;
use APP\Models\Appointment;
use APP\Models\ObtainedService;
use APP\Models\Slot;
use APP\Models\Patient;
use APP\Models\Service;
use Database;

class AppointmentController extends Controller
{
    public function add()
    {
        if ($this->isPostRequest()) {
            // save or update the patient
            $patient = Patient::createOrUpdate($this->postValues);

            // save the appointment
            $appointment = Appointment::create($this->postValues);

            // redirect to view the created appointment
            $this->redirect("/appointments/view?created=true&id=$appointment->id");
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

        $this->render('appointments/add', ['title' => 'Add Appointment', 'patient' => $patient, "appointments" => $appointments, "slot" => $slot, 'appointmentNumber' => count($appointments) + 1, "estimatedStartTime" => $estimatedStartTime]);
    }

    public function search()
    {
        $appointment = Appointment::searchAppointment($this->getValues["appointmentNumber"], $this->getValues["date"]);
        $patient = Patient::findById($appointment->patientId);
        $obtainedServices = ObtainedService::findByAppointmentId($appointment->id);
        $this->render('appointments/search', ['title' => 'Search Appointment', 'appointment' => $appointment, 'patient' => $patient, 'services' => $obtainedServices]);
    }

    public function view()
    {
        $appointment = $this->get("id") ? Appointment::findById($this->get("id")) : Appointment::searchAppointment($this->get("appointmentNumber"), $this->get("date"));

        if (!$appointment) {
            return $this->render('404', ['title' => 'View Appointment']);
        }
        if ($this->get("created")) {
            $this->addSuccessMessage("Appointment created successfully.");
        } else if ($this->get("updated")) {
            $this->addSuccessMessage("Appointment updated successfully.");
        } else if ($this->get("paymentCompleted")) {
            $this->addSuccessMessage("Appointment marked as paid.");
        } else if ($this->get("updateRestricted")) {
            $this->addWarningMessage("This appointment cannot be modified.");
        }

        $obtainedServices = ObtainedService::findWhere("appointmentId", $appointment->id);
        $patient = Patient::findById($appointment->patientId);
        $this->render('appointments/view', ['title' => 'View Appointment', "appointment" => $appointment, "obtainedServices" => $obtainedServices, "patient" => $patient]);
    }

    public function edit()
    {
        $id = $this->get("id");
        $appointment = Appointment::findById($id);

        if (!!$appointment->paidAt) {
            $this->redirect("/appointments/view?updateRestricted=true&id=$id");
        }
        if ($this->isPostRequest()) {
            // save or update the patient

            $patient = Patient::createOrUpdate($this->postValues);

            // save the appointment
            $appointment = Appointment::update($this->postValues);

            $services = ObtainedService::createMultiple($this->postValues, $this->post('id'));

            // redirect to view the created appointment
            $id = $this->post('id');
            $this->redirect("/appointments/view?updated=true&id=$id");
            die();
        }


        $appointment = Appointment::findById($this->get("id"));
        $obtainedServices = ObtainedService::findWhere("appointmentId", $appointment->id);
        $patient = Patient::findById($appointment->patientId);
        $availableDates = Slot::getNextAvailableDates();
        $services = Service::findAll();

        $this->render('appointments/edit', ['title' => 'Modify Appointment', "appointment" => $appointment, "obtainedServices" => $obtainedServices, "patient" => $patient, 'availableDates' => $availableDates, 'services' => $services]);
    }

    public function markAsPaid()
    {
        $id = $this->get('id');
        Appointment::markAsPaid($id);
        $this->redirect("/appointments/view?paymentCompleted=true&id=$id");
    }
}
