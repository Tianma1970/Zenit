<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use Illuminate\Http\Request;

class ProfilePictureController extends Controller
{
    public function index()
    {
        return view('upload/index');
    }

    public function store()
    {

    }
}
