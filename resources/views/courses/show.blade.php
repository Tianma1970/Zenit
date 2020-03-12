@extends('layouts/app')

@section ('content')

    <div class="container">
        <div class="jumbotron">
            <h1>{{ $course->title }}</h1>
            <small>Kursen är på {{ $course->points }} YH poäng</small><br>
            <p>{{ $course->goal }}</p><br>
            <p>{{ $course->knowledge }}</p><br>
            <p>{{ $course->skills }}</p><br>
            <p>{{ $course->competence }}</p><br>
            <p>{{ $course->content }}</p><br>
            <p>{{ $course->forms }}</p><br>
            <p>{{ $course->lierature }}</p><br>
            <a href="/home" class="btn btn-info">Back</a>
        </div>
    </div>
@endsection
