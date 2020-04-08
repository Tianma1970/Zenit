@extends('layouts/app')

@section('content')

@if(Auth::user()->type === 'member')
<div class="container">
    <div class="row">
        <div class="col-6">
            <div class="card">
               <div class="card-header text-center">
                   {{ Auth::user()->name }}{{__('s Projects')}}
                </div>
               <div class="card-body">
                    <ul>
                    @foreach(Auth::user()->projects as $project)
                        <li>
                            {{ $project->title }}<br>
                            {{ $project->content }}<br>
                            <small>{{__('Project created at:')}}&nbsp;<i>{{ $project->updated_at }}</i></small><br>
                        </li>
                        @if($project->completed === 0)
                            <a href="/projects/{{ $project->id }}/edit" class="btn btn-danger">{{ __('Complete your Project') }}</a>
                        @endif<hr>
                    @endforeach
                    </ul>

                </div>
            </div>
        </div>
       <div class="col-6">
           <div class="card">
               <div class="card-header text-center">
                               {{__('Comments for ')}}{{Auth::user()->name }}{{__('s Projects')}}
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
                            </li>
                            </div>
                        @endif
                        @endforeach
                        </ul>
                   </div>
               </div>
           </div>
       </div>

@else
<div class="container">
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">
                    {{__('Incomming projects for ')}}{{ Auth::user()->program->name }}
                </div>
                    @foreach(Auth::user()->program->projects as $project)
                        @if(Auth::user()->type === 'admin')
                        <div class="text-center">
                                                <h3>{{ $project->title }}</h3>
                                                <p>{{__('Author: ')}}{{ $project->author }}</p>
                        </div>
                                                {{ $project->content}}<br>
                        <div class="text-center mt-3">
                            <small>{{__('Project created at ')}}<i>{{ $project->updated_at }}</i>
                            </small><br>
                        </div>
                        <form method="POST" action="/project/{{$project->id}}/check">
                            @csrf
                            <input type="checkbox" name="completed" value="1" onClick="this.form.submit();"
                                @if($project->completed)
                                    checked
                                @endif
                                >&nbsp;{{__('completed?')}}
                        </form>
                            @if(Auth::user()->projects->count() > 1)
                                <hr>
                            @endif
                            @if(Auth::user()->type === 'admin')
                                <a href="/projects/comment" class="btn btn-info col-4 mt-3">{{__('create a comment')}}</a><hr>
                            @endif
                        @endif
                    @endforeach
            </div>
        </div>
        <div class="col-6">
            <div class="card">
                <div class="card-header text-center">
                    {{__('Your Comments ')}}
                </div>

                @foreach(Auth::user()->program->projects as $project)
                    <h3>{{ $project->title }}</h3><br>{{ $project->comments }}<hr>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endif
@endsection
