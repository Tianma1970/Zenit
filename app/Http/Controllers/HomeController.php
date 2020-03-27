<?php

namespace App\Http\Controllers;

use App\News;
use App\Course;
use App\Program;
use App\Project;
use App\Comment;
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
        $program = Program::orderBy('name')->get();
        $projects = Project::orderBy('content')->get();

        return view('home', [
            'courses'   => $courses,
            'news'      => $news,
            'programs'  => $programs,
            'program'  => $program,
            'projects'   => $projects
        ]);
    }

    public function member(Request $req)
    {
        $projects = Project::orderBy('title')->get();
        $comments = Comment::orderBy('content')->get();
        $courses = Course::orderBy('title')->get();

        return view('middleware', [
            'projects'  => $projects,
            'comments'  => $comments,
            'courses'   => $courses
        ])->withMessage("Member");
    }

    public function admin(Request $req)
    {
        $projects = Project::orderBy('title')->get();

        return view('middleware', [
            'projects'  => $projects
        ])->withMessage("Admin");
    }
}
