<?php

namespace App\Http\Controllers;

use Auth;
use App\Course;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('upload/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guest()){
            abort(403);
        }

        $courses = Course::orderBy('title')->get();
        return view('/projects/create', [
            'courses'    => $courses
        ]);
    }

    /**
     * Edit a newly created project (Komplettera)
     */
    public function edit(Project $project)
    {
        $projects = Project::orderBy('title')->get();
        return view('projects/edit', [
            'project'   => $project,
            'projects'  => $projects

        ]);

    }

    /**
     * Store the updated project in the database
     */
    public function update(Request $request, Project $project)
    {

        $validData = $request->validate([
        'author'    => 'required',
        'title'     => 'required',
        'content'   => 'required'
        ]);

        $project->author =   $validData['author'];
        $project->title =   $validData['title'];
        $project->content =   $validData['content'];

        $project->save();


        return redirect('home')->with('status', 'You completed your Project');
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
            'course_id' => 'required',
            'author'    => 'required',
            'title'     => 'required',
            'content'   => 'required',
            'project_url' => 'required'

            ]);


        $validData['user_id'] = Auth::id();
        $project = project::create($validData);

        return redirect('/home')->with('status', 'Du har lämnat in ditt projekt');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {

        $projects = Project::orderBy('content')->get();

        return view('/middleware', [
            'projects'  => $projects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function createComment(Project $project)
    {

        $projects = Project::orderBy('title')->get();
        return view('projects/comment', [
            'project'  => $project
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function storeComment(Request $request, Project $project)
    {

        $validData = $request->validate([
            'project_id'    => 'required',
            'comments'      => 'required'
        ]);


        $project = Project::find($request->project_id);
        $project->comments = $request->comments;
        $project->save();

        return redirect('home')->with('status', 'Comment created successfully');
    }

    /**
     * Choose if the project is completed
     */
    public function check(Request $request, Project $project)
    {
        $project->complete($request->has('completed'));

        return view('middleware');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        //
    }


}
