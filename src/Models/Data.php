<?php

namespace APP\Models;

use Error;
use stdClass;

class Data
{

    public $data;

    public function __construct($file = "")
    {
        if ($file) {
            return $this->get_data($file);
        } else {
            return null;
        }
    }
    private function get_data($file)
    {
        $data_string = @file_get_contents(__DIR__ . "/../data/$file.json");
        $this->data = json_decode($data_string);
        return $this->data;
    }
    private function store_data($file, $newData)
    {
        $users = $this->get_data($file);

        array_push($users, $newData);

        file_put_contents(__DIR__ . "/../data/$file.json", json_encode($users));
    }
    public function register_user()
    {
        $form = Form::get_instance();
        $newUser = new stdClass();
        $newUser->first_name = $form->post["first_name"];
        $newUser->last_name = $form->post["last_name"];
        $newUser->email = $form->post["email"];
        $newUser->password = $form->post["password"];
        $this->store_data(USERS, $newUser);
    }
}
