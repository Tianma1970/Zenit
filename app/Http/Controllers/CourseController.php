<?php

namespace App\Http\Controllers;

use Auth;
use App\Program;
use App\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{

    /**
     * Validation
     */

    protected $validationRules = [
        'title'         => 'required|min:3',
        'goal'          => 'required|min:8',
        'knowledge'     => 'required|min:8',
        'skills'        => 'required|min:8',
        'points'        => 'required|min:2',
        'competence'    => 'required|min:8',
        'forms'         => 'required|min:8',
        'literature'    => 'required|min:8',
        'content'       => 'required|min:8',
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guest())
        {
            abort(403);
        }
        $programs = Program::orderBy('name')->get();
        return view('courses/create', [
            'programs'  => $programs,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validData = $request->validate([
            'program_id'    => 'required',
            'title'         => 'required',
            'content'       => 'required',
            'points'        => 'required',
            'goal'          => 'required',
            //optional: created if statement in show.blade.php
            //'knowledge'     => 'required',
            'skills'        => 'required',
            //optional: created if statement in show.blade.php
            //'competence'    => 'required',
            //optional: created if statement in show.blade.php
            //'forms'         => 'required',
            'literature'    => 'required',
        ]);

        $validData['user_id'] = Auth::id();

        $course = course::create($validData);

        return redirect('/home')->with('status', 'Course created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {

        return view('/courses/show', [
            'course'    => $course
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        return view('courses/edit', [
            'course'   => $course
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {

        $validData = $request->validate($this->validationRules);
        $course->title = $validData['title'];
        $course->content = $validData['content'];
        $course->points = $validData['points'];
        $course->goal = $validData['goal'];
        $course->knowledge = $validData['knowledge'];
        $course->skills = $validData['skills'];
        $course->competence = $validData['competence'];
        $course->forms = $validData['forms'];
        $course->literature = $validData['literature'];
        $course->save();

        return redirect('home')->with('status', 'Course edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {

        $course->delete();

        return redirect('home')->with('status', 'Course deleted successfully');
    }

    public function success()
    {

        return view('/success');
    }
}
