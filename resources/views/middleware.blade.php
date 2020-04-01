@extends('layouts/app')

@section('content')

@if(Auth::user()->type === 'member')
<div class="container">
    <div class="row">
       <div class="col-6">
           <div class="card">
               <div class="card-header text-center">
                   {{ Auth::user()->name }}s Projects
                </div>
               <div class="card-body">

                           <ul>
                                @foreach(Auth::user()->projects as $project)
                                   <li>
                                       {{ $project->title }}<br>
                                       {{ $project->content }}<br>
                                       <small>Project created at:&nbsp;<i>{{ $project->updated_at }}</i></small><br>
                                    </li>
                                    @if($project->completed === 0)
                                    <a href="/projects/{{ $project->id }}/edit" class="btn btn-danger">{{ __('Complete your Project') }}</a>
                                    @endif
                                    <hr>
                                    @endforeach
                                </ul>

                            </div>
                        </div>
                    </div>


       <div class="col-6">
           <div class="card">
               <div class="card-header text-center">
                               Comments for {{Auth::user()->name }}s Projects
               </div>
               <div class="card-body">
                   <div class="card-text text-center">
                        <ul>
                        @foreach(Auth::user()->projects as $project)
                        @if($project->comments)
                        @if($project->completed === 0)
                        <div class="card text-white bg-danger mt-3">
                        @else
                        <div class="card text-white bg-success mt-3"
                        @endif
                            <li>
                                {{$project->title}}<br>
                                {{$project->comments}}<hr>
                        </div>
                            </li>
                        @endif
                        @endforeach
                        </ul>
                   </div>
               </div>
           </div>
       </div>
    </div>
</div>
                        @else
                    <div class="card-header text-center">
                        Incomming projects for {{ Auth::user()->program->name }}
                    </div>

                        <div class="card-body">
                            <div class="jumbotron">
                                <div class="card-title">
                                    <div class="title m-b-md">
                                        @foreach(Auth::user()->program->projects as $project)
                                            @if(Auth::user()->type === 'admin')
                                                <h3>{{ $project->title }}</h3>
                                                <p>Author: {{ $project->author }}</p>
                                                {{ $project->content}}<br>
                                                <small>Project created at <i>{{ $project->updated_at }}</i></small><br>
                                                <form method="POST" action="/project/{{$project->id}}/check">
                                                    @csrf
                                                    <input type="checkbox" name="completed" value="1" onClick="this.form.submit();"
                                                    @if($project->completed)
                                                        checked
                                                    @endif
                                                >&nbsp;completed?
                                                </form>

                                                @if(Auth::user()->projects->count() > 1)
                                                <hr>
                                                @endif
                                                @if(Auth::user()->type === 'admin')
                                                <a href="/projects/comment" class="btn btn-info mt-3">create a comment</a>
                                            @endif
                                        @endif
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
