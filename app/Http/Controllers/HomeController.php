<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $courses = Course::orderBy('title')->get();

        return view('home', [
            'courses'   => $courses
        ]);
    }

    public function member(Request $req)
    {

        // $users = DB::table('users')->get();

        return view('middleware')->withMessage("Member");
    }

    public function admin(Request $req)
    {
        return view('middleware')->withMessage("Admin");
    }
}
