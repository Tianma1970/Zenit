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
        'title'     => 'required|min:3',
        'content'   => 'required|min:8'
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
            'points'        => 'required'
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
