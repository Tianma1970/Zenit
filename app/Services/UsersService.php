<?php

namespace App\Services;

use App\Program;
use App\User;

class UsersService {

    public function get()
    {
        return Program::all();
    }
}
