<?php

namespace APP\Models;

use Error;

class Data
{

    public $data;

    public function __construct($file)
    {
        $data_string = @file_get_contents(__DIR__ . "/../data/$file.json");
        $this->data = json_decode($data_string);
        return $this->data;
    }
}
