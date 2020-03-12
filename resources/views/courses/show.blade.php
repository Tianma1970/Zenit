@extends('layouts/app')

@section ('content')

    <div class="container">
        <div class="jumbotron">
            <h1>{{ $course->title }}</h1>
            <small>Kursen är på {{ $course->points }} YH poäng</small><br><hr>
            <h3>Syfte och mål</h3>
            <p>{{ $course->goal }}</p><br>
            <h3>Kunskaper</h3>
            <p>{{ $course->knowledge }}</p><br>
            <h3>Färdigheter</h3>
            <p>{{ $course->skills }}</p><br>
            <h3>Kompetenser</h3>
            <p>{{ $course->competence }}</p><br>
            <h3>Kursens innehåll</h3>
            <p>{{ $course->content }}</p><br>
            <h3>Betygskriterier</h3>
            <p>{{ $course->forms }}</p><br>
            <h3>Rekommenderad litteratur och dokumentation</h3>
            <p>{{ $course->lierature }}</p><br>
            <a href="/home" class="btn btn-info">Back</a>

            @if(Auth::user()->type === 'member')
                <a href="/projects/" class="btn btn-success">Ladda upp ditt projekt</a>
            @endif
        </div>
    </div>
@endsection
