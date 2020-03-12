<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Shows a list of all the application users
     *
     * @return Response
     */

     public function index()
     {
         $users = DB::table('users')->get();

         return view('home', [
             'users'    => $users
         ]);
     }
}
