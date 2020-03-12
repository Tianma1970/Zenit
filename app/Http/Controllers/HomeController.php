<?php

namespace App\Http\Controllers;

use App\News;
use App\Course;
use App\Program;
use App\Project;
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
        $news    = News::orderBy('title', 'asc')->limit(3)->get();
        $programs = Program::orderBy('name')->get();
        $projects = Project::orderBy('title')->get();

        return view('home', [
            'courses'   => $courses,
            'news'      => $news,
            'programs'  => $programs,
            'projects'   => $projects
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
