<?php

namespace MVC\Models;

class User
{
    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function setUser($email)
    {
        $this->email = $email;
    }

    public function getUser()
    {
        return $this->email;
    }
}
