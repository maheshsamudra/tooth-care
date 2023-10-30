<?php

namespace MVC\Models;

use Error;

class Alert
{
    public $type;
    public $title;
    public $message;

    public function __construct()
    {
    }

    public function setDangerMessage($message)
    {
        if (!$message) {
            throw new Error("Alert message cannot be null!", 0);
        }
        $this->type = DANGER;
        $this->message = $message;
    }
}
