@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials/status')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-header">Courses</div>
            <div class="accordion mt-3" id="accordionExample">
            @foreach($courses as $course)
            <div class="card">
                <div class="card-header" id="courseheading{{ $course->id }}">
                    <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#course{{ $course->id }}" aria-expanded="false" aria-controls="course{{ $course->id }}">
                        {{ $course->title }}
                </button>
                </div>

                <div id="course{{ $course->id }}" class="collapse" aria-labelledby="courseheading{{ $course->id }}" data-parent="#accordionExample">
                    <div class="card-body">
                        <a href="/courses/{{$course->id}}">{{ $course->title }}</a><br>
                        {{ $course->skills }}<br>
                        @if(Auth::user()->type === 'admin')
                        <form method="post" action="/courses/{{ $course->id }}">
                            @method("DELETE")
                            @csrf
                                <a href="/courses/{{ $course->id}}/edit" class="btn btn-info mt-3">Edit</a>
                                <input type="submit" value="Delete" class="btn btn-danger mt-3"></input>
                            </form>
                        @endif
                        <hr>
                        <small>{{ $course->points }} YH poäng</small>
                        @if(Auth::user()->type === 'member')
                            <a href="projects/create" class="btn btn-info">Ladda upp dit projekt</a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Welcome: {{ Auth::user()->name }},
                    you are logged in as a <strong>{{ strtoupper(Auth::user()->type )}}</strong>!<br>
                </div>

                <div class="card-body">
                    @if(Auth::user()->type === 'member')
                        @foreach($programs as $program)
                            <h4>Your Program is  {{ $program->name }}</h4><br>
                        @endforeach
                    @endif

                    @if(Auth::user()->user_image)
                        <div class="col-12 text-center">
                            <img src="/images/{{Auth::user()->user_image}}"width='150' height='150'>
                        </div>
                    @endif
                    Member Page: <a href="{{ url('/')}}/memberOnlyPage">Member</a><br>
                    Admin Page: <a href="{{ url('/')}}/adminOnlyPage">Admin</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">News</div>
                <div class="card-body">
                    <ul>
                        @foreach($news as $news)
                        @if(Auth::user()->type === 'admin')
                        <li><h3><a href="/news/{{ $news->id }}">{{ $news->title }}</a></h3>
                        @else
                        <li><h3>{{ $news->title }}</h3>
                        @endif
                            <p>{{ $news->content }}</p></li>

                            @if($news->author)
                                <small><i>written by</i> {{ $news->author }}</small>
                            @endif
                            <hr>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
