<?php

namespace MVC\Models;

use Error;

class Alert
{
    public $type;
    public $title;
    public $messages = array();

    public function __construct()
    {
    }

    public function setDangerMessage($message)
    {
        if (!$message) {
            throw new Error("Alert message cannot be null!", 0);
        }
        if ($this->type) {
            throw new Error("Cannot change the alert type once set!", 0);
        }
        $this->type = DANGER;
        $this->add_message($message);
    }

    private function add_message($message)
    {
        array_push($this->messages, $message);
    }
}
