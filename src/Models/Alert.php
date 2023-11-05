<?php

namespace APP\Models;

use Error;

class Alert
{
    public $type;
    public $title;
    public $messages = array();

    public function __construct()
    {
    }

    public function addDangerMessage($message)
    {
        if (!$message) {
            throw new Error("Alert message cannot be null!", 0);
        }
        if ($this->type && $this->type !== DANGER) {
            throw new Error("Cannot change the alert type once set!", 0);
        }
        $this->type = DANGER;
        $this->addMessage($message);
    }

    private function addMessage($message)
    {
        array_push($this->messages, $message);
    }
}
