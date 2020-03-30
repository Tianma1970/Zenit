@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                @if(Auth::user()->type === 'member')

                <div class ="card-body">
                    <div class="container">
                        <div class="card">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="card-header text-center"> {{Auth::user()->name }}s Projects</div>
                                        <ul>
                                        @foreach(Auth::user()->projects as $project)
                                            <li>{{ $project->title }}<br>
                                                {{ $project->content }}<br>
                                                <small>Project created at:&nbsp;<i>{{ $project->updated_at }}</i></small>
                                            </li>
                                        @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-6">
                                        <div class="card-header text-center">
                                            Comments for {{Auth::user()->name }} Projects
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
                                                @if(Auth::user()->projects->count() > 1)
                                                <hr>
                                                @endif
                                                @if(Auth::user()->type === 'admin')
                                                <a href="/comments/{{$project->id}}/create" class="btn btn-info">create a comment</a>
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
