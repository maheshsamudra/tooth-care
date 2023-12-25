<?php

namespace APP\Models;

use Database;
use DateTime;

class Slot extends Database
{

    public $id;
    public $day;
    public $from;
    public $enabled;
    public $to;
    public $maxNumberOfAppointments;

    public function __construct()
    {
    }

    public static function getNextAvailableDates()
    {
        $dates = [];

        $start = new DateTime(date("Y-m-d"));
        $end = new DateTime(date("Y-m-d", strtotime("today + 30 days")));

        $slots = self::findAll();

        while ($start <= $end) {
            $key = array_search($start->format("l"), array_column($slots, 'day'));
            if ($slots[$key]['enabled']) {
                $dates[] = ['label' => $start->format('Y-m-d (l)'), 'value' => $start->format('Y-m-d')];
            }
            $start->modify('+1 day');
        }

        return $dates;
    }
}
