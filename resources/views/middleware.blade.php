@extends('layouts/app')

@section('content')<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center"> {{Auth::user()->name }}s Projects</div>
                        <div class="card-body">
                            <div class="jumbotron">
                                <div class="card-title">
                                    <div class="title m-b-md">
                                        @foreach(Auth::user()->projects as $project)
                                            {{ $project->content}}
                                            @if(Auth::user()->projects->count() > 1)
                                                <hr>
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
