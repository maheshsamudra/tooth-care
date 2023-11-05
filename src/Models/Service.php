<?php

namespace APP\Models;

use Database;

class Service extends Database
{

    protected $table = "services";

    public function __construct()
    {
        self::$table = "services";
    }
}
