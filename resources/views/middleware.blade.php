@extends('layouts/app')

@section('content')<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    @if(Auth::user()->type === 'member')
                    <div class="card-header text-center"> {{Auth::user()->name }}s Projects</div>
                    @else
                    <div class="card-header text-center">
                        Incomming projects for {{ Auth::user()->program->name }}
                    </div>
                    @endif
                        <div class="card-body">
                            <div class="jumbotron">
                                <div class="card-title">
                                    <div class="title m-b-md">
                                        @foreach(Auth::user()->program->projects as $project)
                                            @if(Auth::user()->type === 'admin')
                                                <h3>{{ $project->title }}</h3>
                                                <p>Author: {{ $project->author }}</p>
                                                {{ $project->content}}<br>
                                                @if(Auth::user()->projects->count() > 1)
                                                <hr>
                                                @endif
                                                @if(Auth::user()->type === 'admin')
                                                <a href="/comments/create" class="btn btn-info">create a comment</a>
                                            @endif
                                        @endif
                                        @endforeach


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
