@extends('layouts/app')

@section ('content')

    <div class="container">
        <div class="jumbotron">
            <h1>{{ $course->title }}</h1>
            <small>{{__('Kursen är på')}} {{ $course->points }} {{__('YH poäng')}}</small><br><hr>
            <h3>{{__('Goal')}}</h3>
            <p>{{ $course->goal }}</p><br>
            @if($course->knowledge)
            <h3>{{__('Knowledge')}}</h3>
            <p>{{ $course->knowledge }}</p><br>
            @endif
            <h3>{{__('Skills')}}</h3>
            <p>{{ $course->skills }}</p><br>
            @if($course->competence)
            <h3>{{__('Competence')}}</h3>
            <p>{{ $course->competence }}</p><br>
            @endif
            <h3>{{__('Content of the course')}}</h3>
            <p>{{ $course->content }}</p><br>
            @if($course->forms)
            <h3>{{__('Forms')}}</h3>
            <p>{{ $course->forms }}</p><br>
            @endif
            <h3>{{__('Recommended literature and documetation')}}</h3>
            <p>{{ $course->literature }}</p><br>
            <a href="/home" class="btn btn-info">Back</a>

            @if(Auth::user()->type === 'member')
                <a href="/projects/create" class="btn btn-success">{{__('Upload your project')}}</a>
            @endif
        </div>
    </div>
@endsection
